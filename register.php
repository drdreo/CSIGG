<?php

require_once 'includes/defines.inc.php';
//require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


final class Register extends TNormForm
{

    const FIRSTNAME = "firstname";
    const LASTNAME = "lastname";
    const USERNAME = "username";
    const EMAIL = "email";
    const PASSWORD1 = "password1";
    const PASSWORD2 = "password2";

    const LOGIN = "login.php";

    private $dbAccess;


    public function __construct()
    {
        parent::__construct();
        $this->dbAccess = new DBAccess(DSN, DB_USER, DB_PWD, DB_NAMES, DB_COLLATION);
    }


    protected function prepareFormFields()
    {
        $this->smarty->assign("firstnameKey", self::FIRSTNAME);
        $this->smarty->assign("firstnameValue", $this->autofillFormField(self::FIRSTNAME));
        $this->smarty->assign("lastnameKey", self::LASTNAME);
        $this->smarty->assign("lastnameValue", $this->autofillFormField(self::LASTNAME));
        $this->smarty->assign("usernameKey", self::USERNAME);
        $this->smarty->assign("usernameValue", $this->autofillFormField(self::USERNAME));
        $this->smarty->assign("emailKey", self::EMAIL);
        $this->smarty->assign("emailValue", $this->autofillFormField(self::EMAIL));
        $this->smarty->assign("passwordKey1", self::PASSWORD1);
        $this->smarty->assign("passwordKey2", self::PASSWORD2);
    }

    protected function display()
    {
        $this->smarty->display('register.tpl');
    }

    protected function isValid()
    {

        if ($this->isEmptyPostField(self::USERNAME)) {
            $this->errMsg[self::USERNAME] = "Please enter your Username.";
        }

        if (!$this->isEmptyPostField(self::EMAIL) && !Utilities::isEmail($_POST[self::EMAIL])) {
            $this->errMsg[self::EMAIL] = "Please enter a valid Email.";
        }

        if ($this->isEmptyPostField(self::PASSWORD1)) {
            $this->errMsg[self::PASSWORD1] = "Please enter a Password.";
        }
        if (!$this->isEmptyPostField(self::PASSWORD1) && !Utilities::isPassword(self::PASSWORD1,5,20)) {
            $this->errMsg[self::PASSWORD1] = "Please enter a valid Password with 5-20 characters.";
        }

        if ($this->isEmptyPostField(self::PASSWORD2)) {
            $this->errMsg[self::PASSWORD2] = "Please repeat your Password.";
        }

        if (!$this->isUniqueEmail($_POST[self::EMAIL])) {
            $this->errMsg[self::EMAIL] = "This email address is already registered.";
        }

        if ($_POST[self::PASSWORD1] != $_POST[self::PASSWORD2]) {
            $this->errMsg[self::PASSWORD1] = "Your Passwords do not match.";
        }

        return (count($this->errMsg) === 0);

    }

    protected function process()
    {
        $this->addUser();
        Utilities::redirectTo(LOGIN);
    }


    private function isUniqueEmail($email)
    {
        $sql_query = <<<SQL
        SELECT count(email_adr) AS email
        FROM user 
        WHERE email_adr = :email
SQL;
        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt(array(':email'=> $email));
        $row = $this->dbAccess->fetchSingle();

        if($row['email'] == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function addUser()
    {
        $password = Utilities::encryptPWD($_POST[self::PASSWORD1]);

        $email = $_POST[self::EMAIL];
        $username = $_POST[self::USERNAME];

        $varArray = array(':email'=> $email,':username'=> $username,':password'=> $password);
        $setVariables = "user_name = :username, email_adr = :email, password = :password";


        if(!$this->isEmptyPostField(self::FIRSTNAME)) {
            $varArray[":firstname"] = $_POST[self::FIRSTNAME];
            $setVariables  .= ", first_name = :firstname";
        }
        if(!$this->isEmptyPostField(self::LASTNAME)) {
            $varArray[":lastname"] = $_POST[self::LASTNAME];
            $setVariables  .= ", last_name = :lastname";
        }

        $sql_query = <<< SQL
        INSERT INTO user 
        SET $setVariables
SQL;
        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt($varArray);

    }
}

try {
    $register = new Register();
    $register->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e;
}