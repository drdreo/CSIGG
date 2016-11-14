<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:46:35
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/indexMain.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e26b04d384_71679915',
  'file_dependency' => 
  array (
    '7aa283b1bc9c0df726465db5153e07062629ac01' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/templates/indexMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e26b04d384_71679915 ($_smarty_tpl) {
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
                    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."tablestyles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
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
$_smarty_tpl->tpl_vars['con'] = $__foreach_con_0_saved_local_item;
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
if ($__foreach_con_0_saved_item) {
$_smarty_tpl->tpl_vars['con'] = $__foreach_con_0_saved_item;
}
if ($__foreach_con_0_saved_key) {
$_smarty_tpl->tpl_vars['cid'] = $__foreach_con_0_saved_key;
}
?>
                    </table>
                    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('SHOPTEMPLATEPATH'))."pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                </form>
             </div>
        </div>
    </section>
</main>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
