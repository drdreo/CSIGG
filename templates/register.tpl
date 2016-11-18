{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}  

<body class="hold-transition register-page"> 
<div class="register-box">

    <div class="register-logo">
        <p><b>CSIGG</b></p>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register as new member on CSIGG!</p>

        {include file="{$smarty.const.BASETEMPLATEPATH}error.tpl"}

        <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
                <input id="{$firstnameKey}" name="{$firstnameKey}"
                       value="{if isset($firstnameValue)}{$firstnameValue}{/if}" type="text" class="form-control"
                       placeholder="First name"/>
                <i class="fa fa-user form-control-feedback has-feedback" aria-hidden="true"></i>
            </div>
            <div class="form-group has-feedback">
                <input id="{$lastnameKey}" name="{$lastnameKey}" value="{if isset($lastnameValue)}{$lastnameValue}{/if}"
                       type="text" class="form-control"
                       placeholder="Last name"/>
                <i class="fa fa-user form-control-feedback has-feedback" aria-hidden="true"></i>
            </div>
            <div class="form-group has-feedback">
                <input id="{$usernameKey}" name="{$usernameKey}" value="{if isset($usernameValue)}{$usernameValue}{/if}"
                       type="text" class="form-control"
                       placeholder="User name"/>
                <i class="fa fa-user form-control-feedback has-feedback" aria-hidden="true"></i>
            </div>
            <div class="form-group has-feedback">
                <input id="{$emailKey}" name="{$emailKey}" value="{if isset($emailValue)}{$emailValue}{/if}"
                       type="email" class="form-control" placeholder="Email"/>
                <i class="fa fa-envelope form-control-feedback has-feedback" aria-hidden="true"></i>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="{$passwordKey1}" name="{$passwordKey1}" class="form-control"  
                       placeholder="Password">
                <i class="fa fa-lock form-control-feedback has-feedback" aria-hidden="true"></i>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="{$passwordKey2}" name="{$passwordKey2}" class="form-control"
                       placeholder="Retype password">
                <i class="fa fa-lock form-control-feedback has-feedback" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox">
                        <label>
                            <div style="position: relative;">
                                <input type="checkbox">
                                I agree to the <a href="#">terms</a>
                            </div>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="login.php" class="text-center">I already have a membership</a>
        </div>


    </div>
    <!-- /.form-box -->
</div>
  
</body> 
</html> 
