{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}

<body class="hold-transition login-page">
<div class="login-box">

    <div class="login-logo">
        <p><b>CSIGG</b></p>
    </div>
    <!-- /.login-logo -->

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {include file="{$smarty.const.BASETEMPLATEPATH}error.tpl"}

        <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input id="{$emailKey}" name="{$emailKey}" type="email" class="form-control" placeholder="Email"
                       value="{if isset($emailValue)}{$emailValue}{/if}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="{$passwordKey}" name="{$passwordKey}" class="form-control"
                       placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7 col-xs-push-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="text-center">
            <p>- OR - </p>
            <a href="register.php" class="text-center">I do not have an Account yet</a>
        </div>
        <!-- /.login-box-body -->
    </div>
</div>

</body>
</html>
