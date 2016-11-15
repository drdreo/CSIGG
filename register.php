<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;

/*
 * Das  Registrier-Formular setzt die Registrierung im OnlineShop um.
 *
 * Das Registrier-Formular setzt auf der ojectorientieren Klasse TNormform und den Smarty-Templates von IMAR aus HM2 auf.
 * Weiters benötigt es die Klasse DBAccess für Datenbankzugriffe, die die Klasse FileAccess von IMAR ersetzt.
 * Durch die Verwendung von PDO Prepared Statements sind keine weiteren Maßnahmen gegen SQL-Injection notwendig.
 * Im Erfolgsfall werden die Benutzerdaten in der Tabelle onlineshop.users gespeichert.
 *
 * Die Klasse ist final, da es keinen Sinn macht, davon noch weitere Klassen abzuleiten.
 *
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @package dab3
 * @version 2016
 */
final class Register extends TNormForm {
    /**
     *  Konstanten für ein HTML Attribute <input name='firstname' id='firstname' ... >, <label for='firstname' ... > --> $_POST[FIRSTNAME].
     */
    const FIRSTNAME = "firstname";
    const LASTNAME = "lastname";
    const USERNAME = "username";
    const EMAIL = "email";
    const PASSWORD1 = "password1";
    const PASSWORD2 = "password2";
    /*
     * Konstante für die Umlenkung auf die Login-Seite. Nach erfolgreicher Registrierung wird man zur Loginseite weitergeleitet
     */
    const LOGIN = "login.php";

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;

    /**
     * Register Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Datenbankhandler mit der Datenbankverbindung
     * Die übergebenen Konstanten finden sich in includes/defines.inc.php

     */
    public function __construct() {
        parent::__construct();
        $this->dbAccess = new DBAccess(DSN, DB_USER, DB_PWD, DB_NAMES, DB_COLLATION);
        /*--
        require_once 'solution/register/construct.inc.php';
        //*/
    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/registerMain.tpl
     *
     * Gibt die Namen der input-Felder <input name='' ... > und damit die Keys des Array $_POST vor.
     * Befüllt im Fehlerfall die Eingabefelder mit den vom Benutzer bereits eigegebenen, aber gefilterten Werten.
     * Zur Filterung zum Schutz vor XSS-Attacken wird TNormform::autofillFormField() verwendet.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields() {

        $this->smarty->assign("firstnameKey", self::FIRSTNAME);
        $this->smarty->assign("firstnameKey", $this->autofillFormField(self::FIRSTNAME));

        $this->smarty->assign("lastnameKey", self::LASTNAME);
        $this->smarty->assign("lastnameKey", $this->autofillFormField(self::LASTNAME));

        $this->smarty->assign("usernameKey", self::USERNAME);
        $this->smarty->assign("usernameKey", $this->autofillFormField(self::USERNAME));

        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("emailKey", $this->autofillFormField(self::EMAIL));

        $this->smarty->assign("passwordKey1", self::PASSWORD1);
        $this->smarty->assign("passwordKey2", self::PASSWORD2);
        /*--
        require_once 'solution/register/prepareFormFields.inc.php';
        //*/
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {
        $this->smarty->display('register.tpl');
    }

    /**
     * Validiert den Benutzerinput
     *
     * email wird gegen einen regulären Ausdruck geprüft, der in Utilities::isValidEmail() festgelegt wird
     * Browser lässt bei type="email" einiges durch, das durch isEmail gefiltert wird
     * @example m@m Email, die von cliqz-Browser zugelassen wird, von Utilities::isEmail() nicht
     * zusätzlich wird email gegen die Tabelle onlineshop.user geprüft, ob sie dort bereits vorkommt.
     * password wird mit einem regulären Ausdruck verglichen der in Utilitie::isPassword festgelegt ist
     * Von den Feldern phone, mobile und fax muss mindestens eines gefüllt sein. Wenn befüllt werden sie gegen Utilities::isPhone() geprüft.
     * Die restlichen Felder sind Pflichtfelder. Das wird mit TNormform::isEmptyPostField sichergestellt
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid() {
        /*--
        require_once 'solution/register/isValid.inc.php';
        //*/
//
//        if ($this->isEmptyPostField(self::EMAIL)) {
//            $this->errMsg[self::EMAIL] = "Please enter your Email adress.";
//        }
//
//        if (!$this->isEmptyPostField(self::EMAIL) && !Utilities::isEmail($_POST[self::EMAIL])) {
//            $this->errMsg[self::EMAIL] = "Please enter a valid Email.";
//        }
//
//        if ($this->isEmptyPostField(self::PASSWORD1)) {
//            $this->errMsg[self::PASSWORD1] = "Please enter a Password.";
//        }
//
//        if ($this->isEmptyPostField(self::PASSWORD2)) {
//            $this->errMsg[self::PASSWORD2] = "Please enter your Password again.";
//        }
//
//        if (!$this->isEmptyPostField(self::EMAIL) && !$this->isEmptyPostField(self::PASSWORD1) && !$this->isEmptyPostField(self::PASSWORD2)){
//            $this->errMsg[self::PASSWORD] = "Invalid user name or password.";
//        }

        return (count($this->errMsg) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     *
     * Schreibt mit addUser() die eingegebenen Daten in die Tabelle onlineshop.user
     * Wenn keine Exception auftritt wird mit Utilities::redirectTo(LOGIN) auf die Seite login.php weitergeleitet
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws DatabaseException Diese wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {
        $this->addUser();
        Utilities::redirectTo(LOGIN);
    }


    /**
     * @param $email Emailadresse, die gegen die Tabelle onlineshop.user geprüft wird, ob sie dort bereits vorhanden ist.
     * @return bool true, wenn email nocht nicht vorhanden ist. false, wenn bereits ein Eintrag mit dieser email existiert
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    private function isUniqueEmail($email) {
        //##
        return true;
        //*/
        /*--
        require_once 'solution/register/isUniqueEmail.inc.php';
        if (count($rows) === 0) {
            return true;
        } else {
            return false;
        }
        //*/
    }

    /**
     * Schreibt die eingegebenen Daten in die Tabelle onlineshop.user
     *
     * Ins Feld active wird ein MD5-Hash geschrieben, um festzulegen, dass die Zweiphasenauthentifizierung noch nicht abgeschlossen ist.
     * Wird active später auf NULL gesetzt, ist die Authentifizierung abgeschlossen und der Benutzer kann sich einloggen @see login.php
     * role ist mit einem Default-Wert (user) vorbelegt und kann daher auch weggelassen werden
     * date_registered kann weggelassen werden oder mit NOW() vorbelegt werden, um den aktuellen Zeitstempel einzutragen
     * phone, mobile und fax sind keine Pflichtfelder und werden einfach mit TNormform::autofillFormField() in die Datenbank geschrieben.
     * Alle restlichen Felder werden mit TNormform::autofillFormField() abgesichert in die Datenbank geschrieben.
     *
     * @return bool true, wenn das Schreiben in die Tabelle onlineshop.user erfolgreich ist.
     * @throws DatabaseException Diese wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    private function addUser() {

        return true;
        //*/
        /*--
        require_once 'solution/register/addUser.inc.php';
        //*/
    }
}
/**
 * Instantiieren der Klasse Register und Aufruf der Methode TNormform::normForm()
 *
 * Datenbank-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see DBAcess::dbugSQL()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    $register = new Register();
    $register->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e;
}