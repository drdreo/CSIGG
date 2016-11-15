{include file="{$smarty.const.TNTEMPLATEPATH}header.tpl"}


<body class="" style="text-align: center;">
<div class="col-md-4 col-md-offset-4">
        <p><b>CSIGG</b></p>

    <h1 class="Section-heading">Register for a CSIGG account</h1>
    {include file="{$smarty.const.TNTEMPLATEPATH}error.tpl"}

    <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">

        <div>
            <input type="text" id="{$firstnameKey}" name="{$firstnameKey}" class="form-control" placeholder="Firstname" value="{if isset($firstnameValue)}{$firstnameValue}{/if}">
        </div>

        <div>
            <input type="text" id="{$lastnameKey}" name="{$lastnameKey}" class="form-control" placeholder="Lastname" value="{if isset($lastnameValue)}{$lastnameValue}{/if}">
        </div>

        <div>
            <input type="text" id="{$usernameKey}" name="{$usernameKey}" class="form-control" placeholder="Username" value="{if isset($usernameValue)}{$usernameValue}{/if}">
        </div>

        <div>
            <input type="email" id="{$emailKey}" name="{$emailKey}" class="form-control" placeholder="Email" value="{if isset($emailValue)}{$emailValue}{/if}">
        </div>

        <div>
            <input type="password" id="{$passwordKey1}" class="form-control" placeholder="Password" name="{$passwordKey1}">
        </div>

        <div>
            <input type="password" id="{$passwordKey2}" class="form-control" placeholder="Password repeat" name="{$passwordKey2}">
        </div>


        <div class="col-xs-7">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Get your own Newsletter.
                </label>
            </div>
        </div>


        <div class="col-xs-7">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Create my account.</button>
        </div>
    </form>


</div>



</body>
</html>