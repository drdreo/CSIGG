<?php
/* Smarty version 3.1.30, created on 2016-11-14 16:22:22
  from "/Applications/XAMPP/xamppfiles/htdocs/CSIGG/normform/basetemplates/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829d6ae8f3308_80503302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e732c048a15eaff9e6226011622b272a0618f642' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CSIGG/normform/basetemplates/header.tpl',
      1 => 1479136941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5829d6ae8f3308_80503302 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo @constant('TITLE');?>
</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="/CSIGG/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS import -->
    <link rel="stylesheet" href="<?php echo @constant('CSSPATH');?>
/main.css">
    <!-- Custom styles for this template -->
    <link href="/CSIGG/css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CSIGG</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar ">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">CheatSheet</a></li>
                    <li><a href="#">InfoGraphic</a></li>
                </ul>
            </div>
        </div>
    </div>
</header><?php }
}
