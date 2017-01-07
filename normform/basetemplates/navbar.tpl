<body class="hold-transition fixed">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header navbar-color hidden-print">
        <!-- Logo -->
        <span class="logo" >
            <span class="logo-lg"><b>CSIGG</b></span>
        </span>
        <nav class="navbar">
            <!-- Header Navbar data here-->
            <div class="col-xs-5 col-sm-4 col-md-3" style="padding-top: 15px; padding-bottom: 15px; line-height: 20px;">
                {if isset($smarty.session.ISLOGGEDIN)}<span>
                    <b class="hidden-xs">Your are Logged In as </b>{if isset($smarty.session.user_name)}{$smarty.session.user_name}{/if} - <a
                            href="logout.php">Logout</a></span> {else}
                    <span> <a href="login.php">Login</a></span>
                {/if}
            </div>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="pull-left  visible-xs">
                        <a href="cheatsheet.php">
                            <span>CS</span>
                        </a>
                    </li>
                    <li class="pull-left  visible-xs">
                        <a href="infographic.php">
                            <span>IG</span>
                        </a>
                    </li>
                    <li class="">
                        <a>
                            <span> <button onclick="$('header').hide(); $('aside').hide();">hide</button></span>
                        </a>
                    </li>

                    <li class="">
                        <a href="profile.php">
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="settings.php">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side navbar. contains logo and sidebar -->
    <aside class="main-sidebar hidden-print">
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li>
                    <a href="index.php">
                        <span>News</span>
                    </a>
                </li>
                <li>
                    <a href="cheatsheet.php">
                        <span>CheatSheets</span>
                    </a>
                </li>
                <li>
                    <a href="infographic.php">
                        <span>InfoGraphics</span>
                    </a>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>