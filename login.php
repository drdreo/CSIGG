<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class Infographic implementiert die Login Seite des CSIGG.
 *
 * Die Seite index.php setzt auf der ojectorientieren Klasse TNormform.
 * Weiters benötigt es die Klasse DBAccess für Datenbankzugriffe.
 * Durch die Verwendung von PDO Prepared Statements sind keine weiteren Maßnahmen gegen SQL-Injection notwendig.
 *
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
     * Login Constructor.
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
     * Validiert den Benutzerinput nach dem Abschicken einer Bestellung durch einen den Button Login.
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
     * Leitet den Benutzer weiter auf Index.php
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
 * Instantiieren der Klasse Login und Aufruf der Methode TNormform::normForm()
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
    header("Location: https://localhost/csigg/errorpage.html");
   echo $e;
}