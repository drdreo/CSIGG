<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$smarty.const.TITLE}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="/CSIGG/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS import -->
    <link rel="stylesheet" href="{$smarty.const.CSSPATH}/main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
            <div class="Header-logout">
                {if isset($smarty.session.ISLOGGEDIN)}<span> Your are Logged In as {if isset($smarty.session.first_name)}{$smarty.session.first_name}{/if} {if isset($smarty.session.last_name)}{$smarty.session.last_name}{/if} : <a href="logout.php">Logout</a></span> {else}<span> <a href="login.php">Login</a></span> {/if}<span></span>
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
</header>