<?php
/*Constants for the whole CSIGG Project*/
//PRO 3

/*
 * Title of the website
 */
define("TITLE","CSIGG");
define("SUBTITLE","CheatSheet and Infographic Generator");

/**
 * Paths to included Files
 */
define("NORMPATH","normform/");
define("UTILITIES",NORMPATH . "Utilities.class.php");
define("TNORMFORM",NORMPATH . "TNormform.class.php");
define("CSSPATH","/CSIGG/css");
define("BASETEMPLATEPATH",NORMPATH . "basetemplates/");
define("TEMPLATEPATH","templates/");
define("DBACCESS","includes/DBAccess.class.php");
define("SHOPTEMPLATEPATH", "includes/basetemplates/");
define("ICON","<i class=\"fa fa-shopping-bag\" aria-hidden=\"true\"></i>");

/*
 * header forwards
 * Für die Seitenweiterleitung werden die Aufrufe hier festgelegt, falls sich die Filestruktur der Webseite später ändert.
 *
 * @var string INDEX redirecting to the index page
 * @var string LOGIN redirecting to the login page
 * @var string REGISTER redirecting to the register page
 */
define("INDEX", "index.php");
define("LOGIN", "login.php");
define("REGISTER", "register.php");

/*
 * session fields
 *
 * @var string ISLOGGEDIN Key for the Value, stored in the Session; checks if a user is logged in
*/
define("ISLOGGEDIN", "isloggedin");


/*
 * Connection and other parameters for database access
 * connection paramters for the database
 *
 * @var string DB_DRIVER Type of the database, we connect to. Wird von PDO benötigt, das verschiedene Datenbanktreiber zu verfügung stellt.
 * @var string DB_NAME Name of the database, we connect to.
 * @var string DB_HOST Name of the host, where the database runs on.
 * @var int DB_PORT Port to reach the database. Default-Wert 3306.
 * @var string DSN Data Source Name, setzt sich aus Treibername, Host, Port und Datenbankname zusammen
 * @var string DB_USER Name of the user who connects to the database
 * @var string DB_PWD Password for the DB_USER.
 * @var string NAMES Characterset of the database.
 * @var string COLLATION Collation of the database
*/
define("DB_DRIVER","mysql");
define("DB_NAME", "csigg");
define("DB_HOST", "localhost");
define("DB_PORT", 3306);
define("DSN", DB_DRIVER . ":host=". DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME);
define("DB_USER","csigg");
define("DB_PWD", "secret");
define("DB_NAMES","utf8");
define("DB_COLLATION","utf8_general_ci");
