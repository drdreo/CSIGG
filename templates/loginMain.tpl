{include file="{$smarty.const.TNTEMPLATEPATH}header.tpl"}


<body class="" style="text-align: center;">
<div class="col-md-4 col-md-offset-4">
    <div class="login-logo">
        <p><b>CSIGG</b></p>
    </div>
    {include file="{$smarty.const.TNTEMPLATEPATH}error.tpl"}
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input id="{$emailKey}" name="{$emailKey}"  type="email" class="form-control" placeholder="Email" value="{if isset($emailValue)}{$emailValue}{/if}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="{$passwordKey}" name="{$passwordKey}" class="form-control" placeholder="Password">
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
        <div class="social-auth-links text-center">
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

</body>
</html>
