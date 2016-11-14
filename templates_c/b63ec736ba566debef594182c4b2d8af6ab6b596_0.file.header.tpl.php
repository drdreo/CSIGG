<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:41:58
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/normform/basetemplates/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e1566579a7_38009375',
  'file_dependency' => 
  array (
    'b63ec736ba566debef594182c4b2d8af6ab6b596' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/normform/basetemplates/header.tpl',
      1 => 1478680820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e1566579a7_38009375 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo @constant('TITLE');?>
</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo @constant('CSSPATH');?>
/main.css">
</head>
<body class="Site">
<header class="Site-header">
    <div class="Header Header--small">
        <div class="Header-titles">
            <h1 class="Header-title"><a href="index.php"><?php echo @constant('ICON');
echo @constant('TITLE');?>
</a></h1>
            <p class="Header-subtitle"><?php echo @constant('SUBTITLE');?>
</p>
        </div>
        <div class="Header-logout">
            <?php if (isset($_SESSION[ISLOGGEDIN])) {?><span> Your are Logged In as <?php if (isset($_SESSION['first_name'])) {
echo $_SESSION['first_name'];
}?> <?php if (isset($_SESSION['last_name'])) {
echo $_SESSION['last_name'];
}?> : <a href="logout.php">Logout</a></span> <?php } else { ?><span> <a href="login.php">Login</a></span> <?php }?><span></span>
        </div>
    </div>
</header><?php }
}
