<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class Index implementiert die Startseite (index.php) des OnlineShop
 *
 * Die Seite index.php setzt auf der objectorientieren Klasse TNormform und den Smarty-Templates von DAB auf.
 * Durch die Verwendung von PDO Prepared Statements sind keine weiteren Maßnahmen gegen SQL-Injection notwendig.
 *
 * Diese Seite listet diverse Informationen über CSIGG auf.
 * Die Klasse ist final, da es keinen Sinn macht, davon noch weitere Klassen abzuleiten.
 */

final class Index extends TNormForm {

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;

    private $totalUser =0;
    /**
     * Index Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Datenbankhandler mit der Datenbankverbindung
     * Die übergebenen Konstanten befinden sich in includes/defines.inc.php
     */
    public function __construct() {
        parent::__construct();
        $this->dbAccess = new DBAccess(DSN, DB_USER, DB_PWD, DB_NAMES, DB_COLLATION);

    }

    /**
     * Weist die Inhalte der Smarty-Variablen zu. @see templates/indexMain.tpl
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function prepareFormFields() {

        $this->loadContent();

        $this->smarty->assign('totalUser', $this->totalUser);
    }

    /**
     * Zeigt die Seite mittels Smarty Template an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('index.tpl');
    }

    /**
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @return bool true, wenn $errMsg leer ist. Ansonsten false
     */
    protected function isValid() {

        return (count($this->errMsg) === 0);
    }

    /**
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     *
     * @throws DatabaseException wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    protected function process() {
        return true;

    }

    /**
     * Lädt alle aus der Datenbank und befüllt die lokalen Variablen.
     * @throws DatabaseException Diese wird von allen $this->dbAccess Methoden geworfen und hier nicht behandelt.
     *         Die Exception wird daher nochmals weitergereicht (throw) und erst am Ende des Scripts behandelt.
     */
    private function loadContent() {

        $sql_query = <<< SQL
        SELECT count(iduser) AS totalUser
        FROM
        USER
        WHERE 1
SQL;
        $this->dbAccess->prepareQuery($sql_query);
        $this->dbAccess->executeStmt();
        $row = $this->dbAccess->fetchSingle();

        $this->totalUser = $row["totalUser"];

    }




}
/**
 * Instantiieren der Klasse Index und Aufruf der Methode TNormform::normForm()
 *
 */

try {
    Utilities::redirectTo();
    $index = new Index();
    $index->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
}
catch (Exception $e) {
    echo $e;
}