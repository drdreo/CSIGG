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

final class Profile extends TNormForm {

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;

    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $password;
    private $uid;
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

        $this->fillPage();
        $this->smarty->assign('firstname', $this->firstname);
        $this->smarty->assign('lastname', $this->lastname);
        $this->smarty->assign('username', $this->username);
        $this->smarty->assign('email', $this->email);
        $this->smarty->assign('password', $this->password);
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('index.tpl');
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
        /*--
        require_once 'solution/index/isValid.inc.php';
        //*/
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
        return true;
        $this->changeUser();
        $this->statusMsg = "User $this->uid changed successfully";
    }

    /**
     * Befüllt das Array um alle Produkte aufzulisten, die auf der aktuellen Seite angezeigt werden.
     *
     * Es werden nur aktive Produkte berücksichtigt, bei denen die Spalte onlineshop.product.active='1' ist.
     *
     * Es werden nur die Produkte gelesen, die dem Suchkriterium entsprechen. Das Suchkriterium aus dem Suchfeld (GET-Formular) kann leer sein.
     * Dann gibt es keine Einschränkung.
     * Suchfelder über die LIKE-Klausel sind die Spalten onlineshop.product_name, .short_description, long_description.
     * Der Suchbegriff wird in @see Shop::setSearch() ermittelt.
     *
     * Der Startwert der LIMIT-Klausel wird in @see Shop::setPaginationParameters() ermittelt.
     *
     * Weiters werden die Datensätze in der mittels $_GET[self::SORT] geschickten Sortierreihenfolge ausgegeben (ORDER BY).
     * Die Sortierreihenfolge wird durch @see Shop::setOrderBy() ermittelt.
     *
     * Es werden so viele Sätze gelesen, wie in der Konstante DISPLAY festgelegt. @see includes/defines.inc.php
     *
     * @throws DatabaseException Diese wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    private function fillPage() {

        $sql_query = <<< SQL
        SELECT *
        FROM
        USER
        WHERE iduser = :uid
SQL;
//        TODO
//        Connect to database and fill user data
        $this->firstname ="";
        $this->lastname="";
        $this->username="";
        $this->email="";
        $this->password="";
    }






    /**
     * Schreibt die Bestellung in den Warenkorb Tabelle onlineshop.cart
     *
     * Nur der erste Eintrag im Array wird in den Warenkorb gelegt. Der Aufruf von break schadet nicht an dieser Stelle.
     * An sich ist durch den Aufruf des submit-Buttons sicher gestellt, dass es nur einen Eintrag gibt.
     * Allerdings werden dadurch Manipulationen des Requests mit mehreren Einträgen im Array $_POST[self::PID] verhindert.
     *
     * @throws DatabaseException Diese wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    private function changeUser() {

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
    $shop = new Profile();
    $shop->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
}
catch (Exception $e) {
<<<<<<< HEAD

=======
    echo $e;
>>>>>>> Index-changes
}