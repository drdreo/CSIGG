<?php
/* Smarty version 3.1.30, created on 2016-11-12 10:30:09
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/dbdemoMain.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5826e121b64886_90537451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcd20ca28ded2c643082721271a1657df0a8c18f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/templates/dbdemoMain.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5826e121b64886_90537451 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <?php $_smarty_tpl->_subTemplateRender(((string)@constant('SHOPTEMPLATEPATH'))."tablestyles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <table>
                        <tr>
                            <th>PTypeID</th>
                            <th>Product_Type</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageArray']->value, 'con', false, 'cid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->value => $_smarty_tpl->tpl_vars['con']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['idproduct_category'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['con']->value['product_category_name'];?>
</td>
                            </tr>
                            <?php
}
} else {
?>

                            <tr>
                                <td> No products found in search </td>
                                <td>&nbsp;</td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </table>
             </div>
        </div>
    </section>
</main>
<?php $_smarty_tpl->_subTemplateRender(((string)@constant('TNTEMPLATEPATH'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
