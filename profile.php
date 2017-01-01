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
final class Profile extends TNormForm
{

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;

    private $uid;
    private $changePwd = false;

    const FIRSTNAME = "firstname";
    const LASTNAME = "lastname";
    const USERNAME = "username";
    const EMAIL = "email";
    const PASSWORD1 = "password1";
    const PASSWORD2 = "password2";
    const CHANGEPWD = "changePWD";
    const NEWSLETTER = "newsletter";


    /**
     * Profile Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Datenbankhandler mit der Datenbankverbindung
     * Die übergebenen Konstanten finden sich in includes/defines.inc.php
     */
    public function __construct()
    {
        parent::__construct();
        $this->uid = $_SESSION['iduser'];
        $this->dbAccess = new DBAccess(DSN, DB_USER, DB_PWD, DB_NAMES, DB_COLLATION);

    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/indexMain.tpl
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields()
    {

        $this->fillPostArray($this->uid);

        $this->smarty->assign('firstnameKey', self::FIRSTNAME);
        $this->smarty->assign('firstnameValue', $this->autofillFormField(self::FIRSTNAME));
        $this->smarty->assign('lastnameKey', self::LASTNAME);
        $this->smarty->assign('lastnameValue', $this->autofillFormField(self::LASTNAME));
        $this->smarty->assign('usernameKey', self::USERNAME);
        $this->smarty->assign('usernameValue', $this->autofillFormField(self::USERNAME));
        $this->smarty->assign('emailKey', self::EMAIL);
        $this->smarty->assign('emailValue', $this->autofillFormField(self::EMAIL));

        $this->smarty->assign('newsletterKey', self::NEWSLETTER);
        $this->smarty->assign('newsletterValue', $this->autofillFormField(self::NEWSLETTER));

        $this->smarty->assign("passwordKey1", self::PASSWORD1);
        $this->smarty->assign("passwordKey2", self::PASSWORD2);
        $this->smarty->assign("changePwdKey", self::CHANGEPWD);

    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display()
    {

        $this->smarty->display('profile.tpl');
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
    protected function isValid()
    {

//Check Email & Password1-2
        if ($this->isEmptyPostField(self::EMAIL)) {
            $this->errMsg[self::EMAIL] = "Please enter a Email address.";
        }
        if (!$this->isEmptyPostField(self::EMAIL) && !Utilities::isEmail($_POST[self::EMAIL])) {
            $this->errMsg[self::EMAIL] = "Please enter a valid Email address.";
        }
        if (!$this->isEmptyPostField(self::EMAIL) && !$this->isUniqueEmail($_POST[self::EMAIL])) {
            $this->errMsg[self::EMAIL] = "Email address already in use.";
        }

        if (!$this->isEmptyPostField(self::PASSWORD1) && !Utilities::isPassword($_POST[self::PASSWORD1], 5, 20)) {
            $this->errMsg[self::PASSWORD1] = "Invalid password.";
        }
        if ($this->isEmptyPostField(self::PASSWORD2) && !$this->isEmptyPostField(self::PASSWORD1)) {
            $this->errMsg[self::PASSWORD2] = "Please repeat the password.";
        }
        if (!$this->isEmptyPostField(self::PASSWORD1) && !$this->isEmptyPostField(self::PASSWORD2) && ($_POST[self::PASSWORD1] != $_POST[self::PASSWORD2])) {
            $this->errMsg[self::PASSWORD2] = "Passwords do not match.";
        }
        //will der user das pwd ändern
        if (!$this->isEmptyPostField(self::PASSWORD1)) {
            $this->changePwd = true;
        }
//Check Name
        if ($this->isEmptyPostField(self::FIRSTNAME)) {
            $this->errMsg[self::FIRSTNAME] = "Please enter your first name.";
        }
        if ($this->isEmptyPostField(self::LASTNAME)) {
            $this->errMsg[self::LASTNAME] = "Please enter your last name.";
        }
        if ($this->isEmptyPostField(self::USERNAME)) {
            $this->errMsg[self::USERNAME] = "Please enter your user name.";
        }


        return (count($this->errMsg) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process()
    {

        $this->changeUser($this->uid);
        $this->statusMsg = $_POST[self::USERNAME] . " changed successfully";
        return true;
    }

    /**
     *
     * Es werden so viele Sätze gelesen, wie in der Konstante DISPLAY festgelegt. @see includes/defines.inc.php
     *
     * @throws DatabaseException Diese wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    private function fillPostArray($uid)
    {

        $sql_query = <<< SQL
        SELECT *
        FROM
        USER
        WHERE iduser = :uid
SQL;

        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt(array(':uid' => $uid));
        $user = $this->dbAccess->fetchSingle();

        if (!isset($_POST[self::FIRSTNAME])) $_POST[self::FIRSTNAME] = $user['first_name'];
        if (!isset($_POST[self::LASTNAME])) $_POST[self::LASTNAME] = $user['last_name'];
        if (!isset($_POST[self::USERNAME])) $_POST[self::USERNAME] = $user['user_name'];
        if (!isset($_POST[self::EMAIL])) $_POST[self::EMAIL] = $user['email_adr'];

        if (!isset($_POST[self::NEWSLETTER])) {

            $_POST[self::NEWSLETTER] = $user['newsletter'];
        }
        else{
            $_POST[self::NEWSLETTER] = 1;
        }

        //if(isset($_POST[self::CHANGEPWD]) && $_POST[self::CHANGEPWD] == 1) $this->changePwd = true;
    }

    private function isUniqueEmail($email)
    {
        $sql_query = <<<SQL
        SELECT count(iduser) AS cnt FROM user
        WHERE email_adr = :email AND iduser NOT LIKE :uid
SQL;
        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt(array(':email' => $email, ':uid' => $this->uid));
        $row = $this->dbAccess->fetchSingle();

        if ($row['cnt'] == 0) {
            return true;
        } else {
            return false;
        }
    }


    private function changeUser($uid)
    {
        $newsletter = 1;
        $lastname = $this->autofillFormField(self::LASTNAME);
        $firstname = $this->autofillFormField(self::FIRSTNAME);
        $username = $this->autofillFormField(self::USERNAME);
        $email = $this->autofillFormField(self::EMAIL);
        if (!isset($_POST[self::NEWSLETTER])) {
            $newsletter = 0;
        }


        $vars = array(':uid' => $uid, ':fn' => $firstname, ':ln' => $lastname, ':un' => $username, ':ea' => $email, ':nl' => $newsletter);

        if ($this->changePwd) {
            $sql_query = <<<SQL
        UPDATE user 
        SET 
        first_name = :fn,
        last_name = :ln,
        user_name = :un,
        email_adr = :ea,
        newsletter = :nl,
        password = :pwd
        WHERE iduser = :uid
        
SQL;
            $vars[':pwd'] = Utilities::encryptPWD($_POST[self::PASSWORD1]);
        } else {

            $sql_query = <<<SQL
        UPDATE user 
        SET 
        first_name = :fn,
        last_name = :ln,
        user_name = :un,
        email_adr = :ea,
        newsletter = :nl
        WHERE iduser = :uid
        
SQL;

        }
        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt($vars);

        return true;
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
    $shop = new Profile();
    $shop->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e;
}