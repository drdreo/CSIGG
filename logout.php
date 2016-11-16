<?php
session_start();

require_once 'includes/defines.inc.php';

require_once UTILITIES;

$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
setcookie(session_name(), "", time() - 86400, "/");
}
session_destroy();
// Redirect to index.php
Utilities::redirectTo();