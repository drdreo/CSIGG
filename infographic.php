<?php

require_once 'includes/defines.inc.php';
require_once NORMPATH . 'session.inc.php';
require_once TNORMFORM;
require_once DBACCESS;


/**
 * Class Infographic
 *
 * Die Seite infographic.php setzt auf der ojectorientieren Klasse TNormform auf.
 * Weiters benötigt es die Klasse DBAccess für Datenbankzugriffe.
 *
 * Die Klasse ist final, da es keinen Sinn macht, davon noch weitere Klassen abzuleiten.
 */

final class Infographic extends TNormForm {

    /**
     * @var string $dbAccess Datenbankhandler für den Datenbankzugriff
     */
    private $dbAccess;

    /**
     * Infographic Constructor.
     *
     * Ruft den Constructor der Klasse TNormform auf.
     * Erzeugt den Datenbankhandler mit der Datenbankverbindung
     * Die übergebenen Konstanten finden sich in includes/defines.inc.php
     */
    public function __construct() {
        parent::__construct();
        $this->dbAccess = new DBAccess(DSN, DB_USER, DB_PWD, DB_NAMES, DB_COLLATION);

    }

    protected function prepareFormFields(){
    }

    /**
     * Zeigt die Seite mittels Smarty Templates an
     *
     * Abstracte Methode in der Klasse TNormform und muss daher hier implementiert werden
     */
    protected function display() {

        $this->smarty->display('infographic.tpl');
    }


    protected function isValid() {

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
        //print_r ($_FILES );
        return true;
    }
}
/**
 * Instantiieren der Klasse Infographic und Aufruf der Methode TNormform::normForm()
 *
 * Datenbank-Exceptions werden erst hier abgefangen und eine formatierte DEBUG-Seite mit den Fehlermeldungen mit echo ausgegeben @see DBAcess::dbugSQL()
 * Bei PHP-Exception wird vorerst nur auf eine allgemeine Errorpage weitergeleitet
 */
try {
    Utilities::redirectTo();
    $infographic = new Infographic();
    $infographic->normForm();
} catch (DatabaseException $e) {
    echo $e->getMessage();
}
catch (Exception $e) {
    echo $e;
}