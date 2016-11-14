<?php
/* Smarty version 3.1.30, created on 2016-11-11 17:33:49
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/normform/basetemplates/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5825f2edf1fd17_69555941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '214e9aa9a72a9a6a2be87ca4b84f92aaaedad88e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/normform/basetemplates/header.tpl',
      1 => 1478680820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5825f2edf1fd17_69555941 (Smarty_Internal_Template $_smarty_tpl) {
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
            <?php if (isset($_SESSION['ISLOGGEDIN'])) {?><span> Your are Logged In as <?php if (isset($_SESSION['first_name'])) {
echo $_SESSION['first_name'];
}?> <?php if (isset($_SESSION['last_name'])) {
echo $_SESSION['last_name'];
}?> : <a href="logout.php">Logout</a></span> <?php } else { ?><span> <a href="login.php">Login</a></span> <?php }?><span></span>
        </div>
    </div>
</header><?php }
}
