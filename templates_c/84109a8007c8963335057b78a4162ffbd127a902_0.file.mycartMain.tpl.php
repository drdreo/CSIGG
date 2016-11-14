<?php
/* Smarty version 3.1.30, created on 2016-11-12 10:04:30
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/mycartMain.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5826db1ea74101_98453163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84109a8007c8963335057b78a4162ffbd127a902' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/mycartMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5826db1ea74101_98453163 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">My Cart</h2>
            <?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."tablestyles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <table>
                        <tr>
                            <th>PID</th>
                            <th>Product_name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageArray']->value, 'con', false, 'cid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['con']->value) {
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
                </div>
                <?php if (count($_smarty_tpl->tpl_vars['pageArray']->value) !== 0) {?>
                    <div class="Grid-full">
                        <input type="submit" name="update" value="Update Cart" />
                        <input type="submit" name="checkout" value="Go To Checkout" />
                    </div>
                <?php }?>
                <!-- <?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
 -->
            </form>
        </div>
    </section>
</main>
<?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
