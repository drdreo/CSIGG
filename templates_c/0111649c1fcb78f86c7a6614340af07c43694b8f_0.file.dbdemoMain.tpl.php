<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:41:58
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/dbdemoMain.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e15660fdc2_03673815',
  'file_dependency' => 
  array (
    '0111649c1fcb78f86c7a6614340af07c43694b8f' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/dbdemoMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e15660fdc2_03673815 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post">
                    <div class="InputCombo Grid-full">
                        <label for="<?php echo $_smarty_tpl->tpl_vars['ptypeKey']->value;?>
" class="InputCombo-label">Product Category:</label>
                        <input type="search" id="<?php echo $_smarty_tpl->tpl_vars['ptypeKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['ptypeKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['ptypeValue']->value)) {
echo $_smarty_tpl->tpl_vars['ptypeValue']->value;
}?>" class="InputCombo-field">
                    </div>
                    <div class="Grid-full">
                        <button type="submit" class="Button">Add Product Category</button>
                    </div>
                </form>
            <br>
            <h2 class="Section-heading">List of Product Categories</h2>
            <div class="InputCombo Grid-full">
                    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."tablestyles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <table>
                        <tr>
                            <th>PTypeID</th>
                            <th>Product_Type</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['pageArray']->value;
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
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['idproduct_category'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['product_category_name'];?>
</td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['con'] = $__foreach_con_0_saved_local_item;
}
} else {
?>
                            <tr>
                                <td> No products found in search </td>
                                <td>&nbsp;</td>
                            </tr>
                        <?php
}
if ($__foreach_con_0_saved_item) {
$_smarty_tpl->tpl_vars['con'] = $__foreach_con_0_saved_item;
}
if ($__foreach_con_0_saved_key) {
$_smarty_tpl->tpl_vars['cid'] = $__foreach_con_0_saved_key;
}
?>
                    </table>
             </div>
        </div>
    </section>
</main>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
