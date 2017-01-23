<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class CheatSheet implementiert den CheatSheet-Generator von CSIGG
 *
 * THe site cheatsheet.php builds on the objectorientated Class TNormform.
 * Weiters benötigt es die Klasse DBAccess für Datenbankzugriffe, die die Klasse FileAccess von IMAR ersetzt.
 * Durch die Verwendung von PDO Prepared Statements sind keine weiteren Maßnahmen gegen SQL-Injection notwendig.
 *
 * Diese Seite listet die Produkte des OnlineShops in einer Liste auf, die durchblättert werden kann.
 * Über die Konstante DISPLAY (@see includes/defines.inc.php) wird gesteuert, wieviele Produkte pro Seite angezeigt werden.
 * Über ein Suchfeld kann ein GET-Request abgesetzt werden, der die Anzahl der Treffer einschränkt.
 * Über Shop::addToCart() können Produkte über einen POST-Request in den Warenkorb Tabelle onlineshop.cart gelegt werden.
 * 
 * Die Klasse ist final, da es keinen Sinn macht, davon noch weitere Klassen abzuleiten.
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package onlineshop
 * @version 2016
 */

final class CheatSheet extends TNormForm {

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;


    /**
     * CheatSheet Constructor.
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
     * Shows the site with Smarty Templates
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('cheatSheet.tpl');
    }

    /**
     * Nothing to be invalid
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
     * Saves the created cheatsheet on the server folder "cheatsheets" as an image.
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {


        $path = $this->createUniquePathName();

        $width = $_POST['widthDimension']*4;
        $height = $_POST['heightDimension']*4;

        $image = imagecreatetruecolor($width, $height);

        $bg = imagecolorallocate ( $image, 255, 255, 255 );
        imagefilledrectangle($image,0,0,$width,$height,$bg);


        $text = $_POST['cheatsheetData'];
        $fontSize = $_POST['dataFontSize'];
        $fontSize = 7;

        //get color and convert it
        $rgb = $this->hex2rgb($_POST['dataFontColor']);
        $color = imagecolorallocate($image, $rgb['r'], $rgb['g'], $rgb['b']);


        imagettftext ( $image ,  $fontSize ,  0 ,  0 , $fontSize ,  $color ,  "fonts/Open Sans 600.ttf" ,  $text );


        imagejpeg($image,$path);
        imagedestroy($image);


        $this->insertUserCheatSheet($path);

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
 * Instantiieren der Klasse Shop und Aufruf der Methode TNormform::normForm()
 *
 * Datenbank-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see DBAcess::dbugSQL()
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