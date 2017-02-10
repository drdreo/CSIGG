<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class Contact implementiert die Startseite (contact.php) von CSIGG
 * Durch die Verwendung von PDO Prepared Statements sind keine weiteren Maßnahmen gegen SQL-Injection notwendig.
 *
 *
 * Die Klasse ist final, da es keinen Sinn macht, davon noch weitere Klassen abzuleiten.
 *
 */

final class Contact extends TNormForm {

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;

    const SUBJECT = "subject";
    const MESSAGE = "message";

    /**
     * Contact Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     */
    public function __construct() {
        parent::__construct();

    }


    protected function prepareFormFields() {

        $this->smarty->assign('subjectKey', self::SUBJECT);
        $this->smarty->assign('messageKey', self::MESSAGE);
        $this->smarty->assign("messageValue", $this->autofillFormField(self::MESSAGE));
        $this->smarty->assign("subjectValue", $this->autofillFormField(self::SUBJECT));
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('contact.tpl');
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken einer Nachricht.
     *
     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid() {

        //Subject set
        if ($this->isEmptyPostField(self::SUBJECT)) {
            $this->errMsg[self::SUBJECT] = "Please enter a subject.";
        }
        //Message set
        if ($this->isEmptyPostField(self::MESSAGE)) {
            $this->errMsg[self::MESSAGE] = "No message entered.";
        }

        return (count($this->errMsg) === 0);
    }

    /**
     * Verarbeitet die Benutzereingaben, die mit POST geschickt wurden
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {


        $to = "support@csigg.com";
        $subject = $_POST[self::SUBJECT];
        $message = $_POST[self::MESSAGE];
        $headers = "From: support@csigg.com" . "\r\n";

        mail($to,$subject,$message,$headers);

        $this->statusMsg = "Message '" . $_POST[self::SUBJECT] ."' sent!";
        return true;
    }


}
/**
 * Instantiieren der Klasse Contact und Aufruf der Methode TNormform::normForm()
 *
 * Datenbank-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see DBAcess::dbugSQL()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    Utilities::redirectTo();
    $contact = new Contact();
    $contact->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
}
catch (Exception $e) {
    echo $e;
}