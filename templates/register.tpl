{include file="{$smarty.const.TNTEMPLATEPATH}header.tpl"}  

<body class="hold-transition register-page"> 
<div class="register-box">  

    <div class="register-logo"> 
        <p><b>CSIGG</b></p> 
    </div>
     <!-- /.login-logo -->  

    <div class="register-box-body"> 
        <p class="register-box-msg">Register</p>

           {include file="{$smarty.const.TNTEMPLATEPATH}error.tpl"}  

        <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data"> 

            <div class="form-group has-feedback"> 
                <input id="{$firstnameKey}" name="{$firstnameKey}" type="text" class="form-control" placeholder="Firstname"  value="{if isset($emailValue)}{$emailValue}{/if}"> 

            </div>

            <div class="form-group has-feedback"> 
                <input id="{$lastnameKey}" name="{$lastnameKey}" type="text" class="form-control" placeholder="Lastname"  value="{if isset($emailValue)}{$emailValue}{/if}"> 

            </div>

            <div class="form-group has-feedback"> 
                <input id="{$usernameKey}" name="{$usernameKey}" type="text" class="form-control" placeholder="Username"  value="{if isset($emailValue)}{$emailValue}{/if}"> 

            </div>

            <div class="form-group has-feedback"> 
                <input id="{$emailKey}" name="{$emailKey}" type="email" class="form-control" placeholder="Email"  value="{if isset($emailValue)}{$emailValue}{/if}"> 

            </div>
             
            <div class="form-group has-feedback"> 
                <input type="password" id="{$passwordKey1}" name="{$passwordKey1}" class="form-control"   placeholder="Password"> 

            </div>
             
            <div class="form-group has-feedback"> 
                <input type="password" id="{$passwordKey2}" name="{$passwordKey2}" class="form-control"   placeholder="Password repeat"> 

            </div>

            <div class="row"> 
                <div class="col-xs-7 col-xs-push-1"> 
                    <div class="checkbox">  <label>  <input type="checkbox"> Say yes to our super cool Newsletter.  </label> </div>
                     
                </div>
                                 <!-- /.col --> 
                <div class="col-xs-4"> 
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                     
                </div>
                                 <!-- /.col --> 
            </div>
             
        </form>
         
    </div>
     
</div>
  
</body> 
</html> 
