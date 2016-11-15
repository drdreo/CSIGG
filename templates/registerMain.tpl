{include file="{$smarty.const.TNTEMPLATEPATH}header.tpl"}

<body>
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Register for a CSIGG account</h2>
            {include file="{$smarty.const.TNTEMPLATEPATH}error.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="{$firstnameKey}" class="InputCombo-label">Firstname:</label>
                    <input type="text" id="{$firstnameKey}" name="{$firstnameKey}" value="{if isset($firstnameValue)}{$firstnameValue}{/if}" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$lastnameKey}" class="InputCombo-label">Lastname:</label>
                    <input type="text" id="{$lastnameKey}" name="{$lastnameKey}" value="{if isset($lastnameValue)}{$lastnameValue}{/if}" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$nicknameKey}" class="InputCombo-label">Nickname:</label>
                    <input type="text" id="{$nicknameKey}" name="{$nicknameKey}" value="{if isset($nicknameValue)}{$nicknameValue}{/if}" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$emailKey}" class="InputCombo-label">Email:</label>
                    <input type="email" id="{$emailKey}" name="{$emailKey}" value="{if isset($emailValue)}{$emailValue}{/if}" class="InputCombo-field">
                </div>

                <p> Use only letters, numbers, and the underscore. Must be between {$smarty.const.PWDMIN} and {$smarty.const.PWDMAX} characters long. </p>
                <div class="InputCombo Grid-full">
                    <label for="{$passwordKey1}" class="InputCombo-label">Password:</label>
                    <input type="password" id="{$passwordKey1}" name="{$passwordKey1}" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$passwordKey2}" class="InputCombo-label">Repeat Password:</label>
                    <input type="password" id="{$passwordKey2}" name="{$passwordKey2}" class="InputCombo-field">
                </div>
                <div class="Grid-full">
                    <button type="submit" class="Button">Create my account</button>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Already registered<i class="fa fa-question"></i></h2>
            <p>Use your existing OnlineShop account to login <a href="login.php">here</a></p>
        </div>
    </section>
</main>
</body>
</html>