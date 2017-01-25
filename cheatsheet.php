<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class CheatSheet implementiert den CheatSheet-Generator von CSIGG
 *
 * Die Seite cheatsheet.php baut auf der objektorientierten Klasse TNormform auf.
 * Weiters benötigt es die Klasse DBAccess für Datenbankzugriffe.
 * Durch die Verwendung von PDO Prepared Statements sind keine weiteren Maßnahmen gegen SQL-Injection notwendig.
 *
 * Diese Seite lässt den Nutzer einen Text uploaden. Dieser kann formatiert und ausgedruckt werden.
 * Wird das CheatSheet gespeichert so wird ein Bild von dem Text im process erstellt.
 *
 * Die Klasse ist final, da es keinen Sinn macht, davon noch weitere Klassen abzuleiten.
 *
 * @author Andreas Hahn
 * @package csigg
 * @version 2017
 */

final class CheatSheet extends TNormForm {

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;


    /**
     * CheatSheet Konstruktor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Datenbankhandler mit der Datenbankverbindung
     * Die übergebenen Konstanten finden sich in includes/defines.inc.php
     */
    public function __construct() {
        parent::__construct();
        $this->dbAccess = new DBAccess(DSN, DB_USER, DB_PWD, DB_NAMES, DB_COLLATION);

    }

    /**
     * Nothing to prepare
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields() {

    }

    /**
     * Zeigt die Seite mittels Smarty Templates
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('cheatSheet.tpl');
    }

    /**
     * Überprüft ob Text upgeloadet wurde und ob dieser nicht leer ist.
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid() {

        if(!isset($_POST['cheatsheetData']))
        {
            $this->errMsg['noData'] = "no data selected!";
        }
        if(!isset($_POST['cheatsheetData']) && $_POST['cheatsheetData'] == '')
        {
            $this->errMsg['noData'] = "No cheatsheet!";
        }

        return (count($this->errMsg) === 0);
    }

    /**
     * Speichert das erstellte Cheatsheet auf dem Server unter "cheatsheets" als JPEG.
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {


        // einen einzigartigen Namen für das CheatSheet erstellen
        $path = $this->createUniquePathName();

        //Dimension anpassen, da sonst pixelig
        $width = $_POST['widthDimension']*4;
        $height = $_POST['heightDimension']*4;

        //erstellt das Bild
        $image = imagecreatetruecolor($width, $height);

        //Hintergrundfarbe weiß
        $bg = imagecolorallocate ( $image, 255, 255, 255 );
        imagefilledrectangle($image,0,0,$width,$height,$bg);


        $text = $_POST['cheatsheetData'];
        $fontSize = $_POST['dataFontSize'];
        $fontSize = 7;

        //get color and convert it
        $rgb = $this->hex2rgb($_POST['dataFontColor']);
        $color = imagecolorallocate($image, $rgb['r'], $rgb['g'], $rgb['b']);

        //Text in das Bild schreiben
        imagettftext ( $image ,  $fontSize ,  0 ,  0 , $fontSize ,  $color ,  "fonts/Open Sans 600.ttf" ,  $text );

        //Bild speichern
        imagejpeg($image,$path);
        imagedestroy($image);

        //Bildpfad in Datenbank speichern
        $this->insertUserCheatSheet($path);

        //Statusmessage erstellen
        $this->statusMsg = "Added CheatSheet successfully";

        return true;

    }

    /**
     * Inserts the CheatSheet Data into the database. Sets path,created and user_iduser
     *
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function insertUserCheatSheet($path)
    {
        $sql_query = <<<SQL
        INSERT INTO
          cheatsheet
        SET 
          user_iduser = :uid,
          path = :path,
          created = NOW()
SQL;
        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt(array(':uid' => $_SESSION['iduser'],":path" => $path));

    }

    /**
     * Creates a unique path name for the cheatsheet image
     */
    protected function createUniquePathName()
    {
        $extension = ".jpg";
        $path = "cheatsheets/";

        do{
            $imagePath = $path . sha1(uniqid(mt_rand(),true)) . $extension;
        }while(file_exists($imagePath));

    return $imagePath;
    }
    /**
     * Converstion function
     */

    function hex2rgb($hex, $alpha = false) {
        $hex = str_replace('#', '', $hex);
        if ( strlen($hex) == 6 ) {
            $rgb['r'] = hexdec(substr($hex, 0, 2));
            $rgb['g'] = hexdec(substr($hex, 2, 2));
            $rgb['b'] = hexdec(substr($hex, 4, 2));
        }
        else if ( strlen($hex) == 3 ) {
            $rgb['r'] = hexdec(str_repeat(substr($hex, 0, 1), 2));
            $rgb['g'] = hexdec(str_repeat(substr($hex, 1, 1), 2));
            $rgb['b'] = hexdec(str_repeat(substr($hex, 2, 1), 2));
        }
        else {
            $rgb['r'] = '0';
            $rgb['g'] = '0';
            $rgb['b'] = '0';
        }
        if ( $alpha ) {
            $rgb['a'] = $alpha;
        }
        return $rgb;
    }
}
/**
 * Instantieren der Klasse CheatSheet und Aufruf der Methode TNormform::normForm()
 *
 * Datenbank-Exceptions werden erst hier abgefangen
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    Utilities::redirectTo();
    $cs = new CheatSheet();
    $cs->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
}
catch (Exception $e) {
    echo $e;
}