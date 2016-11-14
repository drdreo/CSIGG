<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:46:48
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/productMain.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e278cf2345_98462698',
  'file_dependency' => 
  array (
    '977ac6cbb1d653682f5b8f805cb42f7a2cf66147' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/productMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e278cf2345_98462698 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Add Product</h2>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
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
$_from = $_smarty_tpl->tpl_vars['ptypeArray']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_con_0_saved_item = isset($_smarty_tpl->tpl_vars['con']) ? $_smarty_tpl->tpl_vars['con'] : false;
$__foreach_con_0_saved_key = isset($_smarty_tpl->tpl_vars['cid']) ? $_smarty_tpl->tpl_vars['cid'] : false;
$_smarty_tpl->tpl_vars['con'] = new Smarty_Variable();
$__foreach_con_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_con_0_total) {
$_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable();
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['con']->value) {
$__foreach_con_0_saved_local_item = $_smarty_tpl->tpl_vars['con'];
?>
                            <option <?php if (isset($_smarty_tpl->tpl_vars['selected']->value)) {
if ($_smarty_tpl->tpl_vars['selected']->value === $_smarty_tpl->tpl_vars['con']->value['product_category_name']) {?> selected="selected" <?php }?> <?php }?>><?php echo $_smarty_tpl->tpl_vars['con']->value['product_category_name'];?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['con'] = $__foreach_con_0_saved_local_item;
}
} else {
?>
                            <option>Nothing to select so far</option>
                        <?php
}
if ($__foreach_con_0_saved_item) {
$_smarty_tpl->tpl_vars['con'] = $__foreach_con_0_saved_item;
}
if ($__foreach_con_0_saved_key) {
$_smarty_tpl->tpl_vars['cid'] = $__foreach_con_0_saved_key;
}
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
