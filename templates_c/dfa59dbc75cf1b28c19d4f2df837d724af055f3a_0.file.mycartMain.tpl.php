<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:46:45
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/mycartMain.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e27589b1d8_15258042',
  'file_dependency' => 
  array (
    'dfa59dbc75cf1b28c19d4f2df837d724af055f3a' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/mycartMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e27589b1d8_15258042 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">My Cart</h2>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."tablestyles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <table>
                        <tr>
                            <th>PID</th>
                            <th>Product_name</th>
                            <th>Price</th>
                            <th>Quantity</th>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['product_idproduct'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['product_name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['price'];?>
</td>
                                <td><input type="text" name="quantity[<?php echo $_smarty_tpl->tpl_vars['con']->value['product_idproduct'];?>
]" size="10" maxlength="10" value="<?php echo $_smarty_tpl->tpl_vars['con']->value['quantity'];?>
"/></td>
                            </tr>
                            <?php
$_smarty_tpl->tpl_vars['con'] = $__foreach_con_0_saved_local_item;
}
} else {
?>
                            <tr>
                                <td> No Products in Cart </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
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
                <?php if (count($_smarty_tpl->tpl_vars['pageArray']->value) !== 0) {?>
                    <div class="Grid-full">
                        <input type="submit" name="update" value="Update Cart" />
                        <input type="submit" name="checkout" value="Go To Checkout" />
                    </div>
                <?php }?>
                <!-- <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
 -->
            </form>
        </div>
    </section>
</main>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
