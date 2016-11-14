<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:53:22
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/registerMain.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e4024cb421_53353285',
  'file_dependency' => 
  array (
    'c1d59e905c4733bb703af414e5ce7fb46e38f47f' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/registerMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e4024cb421_53353285 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Register for an OnlineShop account</h2>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['firstnameKey']->value;?>
" class="InputCombo-label">Firstname:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['firstnameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['firstnameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['firstnameValue']->value)) {
echo $_smarty_tpl->tpl_vars['firstnameValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" class="InputCombo-label">Lastname:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['lastnameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['lastnameValue']->value)) {
echo $_smarty_tpl->tpl_vars['lastnameValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['nicknameKey']->value;?>
" class="InputCombo-label">Nickname:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['nicknameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['nicknameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['nicknameValue']->value)) {
echo $_smarty_tpl->tpl_vars['nicknameValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" class="InputCombo-label">Email:</label>
                    <input type="email" id="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['emailValue']->value)) {
echo $_smarty_tpl->tpl_vars['emailValue']->value;
}?>" class="InputCombo-field">
                </div>
                <p> Format: +43 732 1234-1234 </p>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['phoneKey']->value;?>
" class="InputCombo-label">Phone:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['phoneKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['phoneKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['phoneValue']->value)) {
echo $_smarty_tpl->tpl_vars['phoneValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['mobileKey']->value;?>
" class="InputCombo-label">Mobile:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['mobileKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['mobileKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['mobileValue']->value)) {
echo $_smarty_tpl->tpl_vars['mobileValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['faxKey']->value;?>
" class="InputCombo-label">Fax:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['faxKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['faxKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['faxValue']->value)) {
echo $_smarty_tpl->tpl_vars['faxValue']->value;
}?>" class="InputCombo-field">
                </div>
                <p> Use only letters, numbers, and the underscore. Must be between <?php echo @constant('PWDMIN');?>
 and <?php echo @constant('PWDMAX');?>
 characters long. </p>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['passwordKey1']->value;?>
" class="InputCombo-label">Password:</label>
                    <input type="password" id="<?php echo $_smarty_tpl->tpl_vars['passwordKey1']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['passwordKey1']->value;?>
" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['passwordKey2']->value;?>
" class="InputCombo-label">Repeat Password:</label>
                    <input type="password" id="<?php echo $_smarty_tpl->tpl_vars['passwordKey2']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['passwordKey2']->value;?>
" class="InputCombo-field">
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
