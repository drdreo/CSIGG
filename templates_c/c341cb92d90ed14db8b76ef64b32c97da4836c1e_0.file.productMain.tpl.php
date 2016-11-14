<?php
/* Smarty version 3.1.30, created on 2016-11-11 20:30:10
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/productMain.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58261c420f6806_47531842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c341cb92d90ed14db8b76ef64b32c97da4836c1e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/productMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58261c420f6806_47531842 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Add Product</h2>
            <?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['pnameKey']->value;?>
" class="InputCombo-label">Product Name:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['pnameKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['pnameKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['pnameValue']->value)) {
echo $_smarty_tpl->tpl_vars['pnameValue']->value;
}?>" placeholder="Choose a unique Product Name" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['priceKey']->value;?>
" class="InputCombo-label">Price:</label>
                    <input type="text" id="<?php echo $_smarty_tpl->tpl_vars['priceKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['priceKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['priceValue']->value)) {
echo $_smarty_tpl->tpl_vars['priceValue']->value;
}?>" size="10" maxlength="10"  placeholder="0,00" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['ptypeKey']->value;?>
" class="InputCombo-label">Product Type:</label>
                    <select name="<?php echo $_smarty_tpl->tpl_vars['ptypeKey']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['ptypeKey']->value;?>
" size="1" class="InputCombo-field">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ptypeArray']->value, 'con', false, 'cid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['con']->value) {
?>
                            <option <?php if (isset($_smarty_tpl->tpl_vars['selected']->value)) {
if ($_smarty_tpl->tpl_vars['selected']->value === $_smarty_tpl->tpl_vars['con']->value['product_category_name']) {?> selected="selected" <?php }?> <?php }?>><?php echo $_smarty_tpl->tpl_vars['con']->value['product_category_name'];?>
</option>
                            <?php
}
} else {
?>

                            <option>Nothing to select so far</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['activeKey']->value;?>
" class="InputCombo-label">Active</label><span>&nbsp;</span>
                    <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['activeKey']->value;?>
"  value="1" <?php if (isset($_smarty_tpl->tpl_vars['activeValue']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['activeValue']->value == 1) {?> checked="checked" <?php }?> <?php }?>/><span>&nbsp;</span>
                    <label for="<?php echo $_smarty_tpl->tpl_vars['activeKey']->value;?>
" class="InputCombo-label">Inactive</label><span>&nbsp;</span>
                    <input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['activeKey']->value;?>
"  value="0" <?php if (isset($_smarty_tpl->tpl_vars['activeValue']->value)) {?> <?php if ($_smarty_tpl->tpl_vars['activeValue']->value == 0) {?>  checked="checked" <?php }?> <?php }?>/><span>&nbsp;</span>
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['shortdescKey']->value;?>
" class="InputCombo-label">Short Description:</label>
                    <textarea name="<?php echo $_smarty_tpl->tpl_vars['shortdescKey']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['shortdescKey']->value;?>
" cols="40" rows="5"  class="InputCombo-field"><?php if (isset($_smarty_tpl->tpl_vars['shortdescValue']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['shortdescValue']->value;?>
 <?php }?></textarea>
                </div>
                <div class="InputCombo Grid-full">
                    <label for="<?php echo $_smarty_tpl->tpl_vars['longdescKey']->value;?>
" class="InputCombo-label">Long Description:</label>
                    <textarea name="<?php echo $_smarty_tpl->tpl_vars['longdescKey']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['longdescKey']->value;?>
" cols="40" rows="15"  class="InputCombo-field"><?php if (isset($_smarty_tpl->tpl_vars['longdescValue']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['longdescValue']->value;?>
 <?php }?></textarea>
                </div>
                <div class="Grid-full">
                    <button type="submit" class="Button">Add Product</button>
                </div>
            </form>
        </div>
    </section>
</main>
<?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
