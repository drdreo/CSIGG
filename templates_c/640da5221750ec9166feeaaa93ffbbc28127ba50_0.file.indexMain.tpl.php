<?php
/* Smarty version 3.1.30, created on 2016-11-11 17:23:13
  from "/Applications/XAMPP/xamppfiles/htdocs/shop/templates/indexMain.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5825f071e96e80_12938740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '640da5221750ec9166feeaaa93ffbbc28127ba50' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/shop/templates/indexMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5825f071e96e80_12938740 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="get">
                    <div class="InputCombo Grid-full">
                        <label for="<?php echo $_smarty_tpl->tpl_vars['searchKey']->value;?>
" class="InputCombo-label">Search:</label>
                        <input type="search" id="<?php echo $_smarty_tpl->tpl_vars['searchKey']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['searchKey']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['searchValue']->value)) {
echo $_smarty_tpl->tpl_vars['searchValue']->value;
}?>" class="InputCombo-field">
                        <button type="submit" class="Button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            <br>
            <h2 class="Section-heading">List of Products</h2>
            <div class="InputCombo Grid-full">
                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>
" method="post"  enctype="multipart/form-data">
                    <?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."tablestyles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <table>
                        <tr>
                            <!-- statt Links wäre eine Pulldown Box im vierten <th> mit mehreren Auswahlmöglichkeien denkbar -->
                            <th><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo $_smarty_tpl->tpl_vars['sortKey']->value;?>
=pid&amp;">PID</a></th>
                            <th><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo $_smarty_tpl->tpl_vars['sortKey']->value;?>
=pname&amp;">Product_name</a></th>
                            <th><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo $_smarty_tpl->tpl_vars['sortKey']->value;?>
=price&amp;">Price</a></th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageArray']->value, 'con', false, 'cid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['con']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['idproduct'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['product_name'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['price'];?>
</td>
                                <!-- Einige Shopsysteme lösen die Bestellung über einen GET-Aufruf. Wir wollen aber die TNormform verwenden, die auf POST aufbaut
                                <!-- <td><a href="index.php?pid=<?php echo $_smarty_tpl->tpl_vars['con']->value['idproduct'];?>
">Add to Cart</a></td> -->
                                <td><button name="pid[<?php echo $_smarty_tpl->tpl_vars['con']->value['idproduct'];?>
]" type="submit"><i class="fa fa-cart-plus" aria-hidden="true">&nbsp;Add To Cart</button></td>
                            </tr>
                            <?php
}
} else {
?>

                            <tr>
                                <td> No products found in search </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
                    <?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                </form>
             </div>
        </div>
    </section>
</main>
<?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
