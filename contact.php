<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class Contact implementiert die Startseite (contact.php) von CSIGG
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

        $this->smarty->assign('subjectKey', self::SUBJECT);
        $this->smarty->assign('messageKey', self::MESSAGE);
        $this->smarty->assign("messageValue", $this->autofillFormField(self::MESSAGE));
        $this->smarty->assign("subjectValue", $this->autofillFormField(self::SUBJECT));
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('contact.tpl');
    }

    /**
     * Validiert den Benutzerinput nach dem Abschicken einer Bestellung durch einen der Buttons AddToCart.
     *

     * Fehlermeldungen werden im Array $errMsg[] gesammelt.
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
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