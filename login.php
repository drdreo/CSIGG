<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class Shop implementiert die Startseite (index.php) des OnlineShop
 *
 * Die Seite index.php setzt auf der ojectorientieren Klasse TNormform und den Smarty-Templates von IMAR aus HM2 auf.
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

final class Login extends TNormForm {

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;
    /**
     *  Konstanten für ein HTML Attribute <input name='email' id='email' ... >, <label for='email' ... > --> $_POST[EMAIL].
     */
    const EMAIL = "email";
    const PASSWORD = "password";

    /**
     * Shop Constructor.
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
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/indexMain.tpl
     * 
     * Gibt die Namen der AddToCart input-Buttons <input type='submit' name='' ... > und damit die Keynamen des Array $_POST vor.
     * Die Namen der GET-Parameter für das Suchfeld und für die Blätterfunktion und damit die Keynamen im Array $_GET werden ebenfalls vorgegeben.
     *
     * Das Array pageArray wird mit allen Einträge der Tabelle onlineshop.product_category befüllt.
     * Der Aufruf von Shop::fillpageArray() berechnet auch die Variablen für die Blätterfunktion $this->pagecount, pagenumber, current_page, startprevious und startnext.
     * Diese werden an dieser Stelle nur noch an die Klasse Smarty weitergegeben.
     * Die Variable $this->search für die Vorbelegung des Suchbegriffs wird ebenfalls von Shop::fillpageArray() befüllt und hier an die Klasse Smarty übergeben.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields() {
        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("emailValue", $this->autofillFormField(self::EMAIL));
        $this->smarty->assign("passwordKey", self::PASSWORD);

    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('login.tpl');
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken einer Bestellung durch einen der Buttons AddToCart.
     *
     * Auch wenn die pids im Template durch das PHP-Script index.php eingetragen werden, muss der Input als Benutzerinput gewertet werden,
     * weil man nicht weiß, ob der Nutzer zum Senden der Bestellung den Request mit entsprechenden Tools noch manipuliert.
     * Für jede pid ist ein eigener Button implementiert, daher wird jede pid im Array $_POST['pid'] in einem eigenen Eintrag gespeichert.
     * Mittels Shop::isValidPid() wird jede pid im Array $_POST['pid'] auf positives Integer oder 0 geprüft und damit XSS verhindert.
     * Zusätzlich wird jede pid geprüft, od diese in der Tabelle onlineshop.product vorkommt, um Forced Browsing mit sinnlosen pids zu verhindern.
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid() {
        if ($this->isEmptyPostField(self::EMAIL)) {
            $this->errMsg[self::EMAIL] = "Please enter a Email address.";
        }
        if (!$this->isEmptyPostField(self::EMAIL) && !Utilities::isEmail($_POST[self::EMAIL])) {
            $this->errMsg[self::EMAIL] = "Please enter a valid Email address.";
        }
        if ($this->isEmptyPostField(self::PASSWORD)) {
            $this->errMsg[self::PASSWORD] = "Please enter a password.";
        }
        if (!$this->isEmptyPostField(self::EMAIL) && !$this->isEmptyPostField(self::PASSWORD) && !$this->authenticateUser($_POST[self::EMAIL],$_POST[self::PASSWORD]))
        {
            $this->errMsg[self::PASSWORD] = "Invalid Username or Password.";
        }

        return (count($this->errMsg) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     *
     * Das Suchfeld wird mit GET übergeben und daher nicht hier behandelt.
     * Die AddToCart - Buttons sind in ein POST-Formular verpackt nicht als Hyperlinks mit GET-Parametern.
     * Das ist abhängig vom Shopsystem, wie das in der Praxis gehandhabt wird. Es gibt POST und GET-Implementierungen.
     * Wir nehmen POST, weil wir die TNormformabläufe schon kennen, die auf POST ausgelegt sind.
     *
     * Über Shop::addToCart() wird das ausgewählte Produkt in den Warenkorb Tabelle onlineshop.cart gespeichert.
     * Im Gutfall wird in $this->statusMsg eine Rückmeldung gegeben, welches Produkt in den Warenkorb gelegt wurde.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {
        Utilities::redirectTo();
    }


    private function authenticateUser($email,$password) {

        $sql_query = <<<EOL
        SELECT iduser, user_name, password
        FROM user
        WHERE email_adr = :email
EOL;

        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt(array(':email'=> $_POST[self::EMAIL]));
        $row = $this->dbAccess->fetchSingle();

        if(Utilities::proofPWD($_POST[self::PASSWORD],$row['password']))
        {
            $_SESSION['iduser'] = $row['iduser'];
            $_SESSION[ISLOGGEDIN] = sha1($_SERVER["REMOTE_ADDR"] . $_SERVER["HTTP_USER_AGENT"] . $_SESSION['iduser']);
            $_SESSION['user_name'] = $row['user_name'];

            return true;
        }
        else
            {
            return false;
        }
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
    $login = new Login();
    $login->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
} catch (Exception $e) {

   echo $e;
}