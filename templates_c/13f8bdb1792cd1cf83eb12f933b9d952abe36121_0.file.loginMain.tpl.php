<?php
/* Smarty version 3.1.30, created on 2016-11-12 10:03:59
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/loginMain.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5826daff987f83_25738162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13f8bdb1792cd1cf83eb12f933b9d952abe36121' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/loginMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5826daff987f83_25738162 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Login</h2>
            <?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" class="InputCombo-label">Email:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['emailKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['emailValue']->value)) {
echo $_smarty_tpl->tpl_vars['emailValue']->value;
}?>" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['passwordKey']->value;?>
" class="InputCombo-label">Password:</label>
                    <input type="password" id="<?php echo $_smarty_tpl->tpl_vars['passwordKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['passwordKey']->value;?>
" class="InputCombo-field">
                </div>
                <div class="Grid-full">
                    <button type="submit" class="Button">Log me in</button>
                </div>
            </form>
        </div>
    </section>
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">No account<i class="fa fa-question"></i></h2>
            <p>Register your OnlineShop account <a href="register.php">here</a></p>
        </div>
    </section>
</main>
<?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
