<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:46:35
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/includes/basetemplates/pagination.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e26b08cc58_43051064',
  'file_dependency' => 
  array (
    '5d95216d069e5ab93bc4da317bcc2c01d81561be' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/includes/basetemplates/pagination.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e26b08cc58_43051064 ($_smarty_tpl) {
?>
<div id="Pagination">
    <hr>
    <?php if ($_smarty_tpl->tpl_vars['pagecount']->value > 1) {?>
        <?php if ($_smarty_tpl->tpl_vars['current_page']->value != 1) {?><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo $_smarty_tpl->tpl_vars['startKey']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['startprevious']->value;?>
">Previous</a>
        <?php }?>
        <?php
$_from = $_smarty_tpl->tpl_vars['pagenumber']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_i_0_saved_item = isset($_smarty_tpl->tpl_vars['i']) ? $_smarty_tpl->tpl_vars['i'] : false;
$__foreach_i_0_saved_key = isset($_smarty_tpl->tpl_vars['pageno']) ? $_smarty_tpl->tpl_vars['pageno'] : false;
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable();
$__foreach_i_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_i_0_total) {
$_smarty_tpl->tpl_vars['pageno'] = new Smarty_Variable();
foreach ($_from as $_smarty_tpl->tpl_vars['pageno']->value => $_smarty_tpl->tpl_vars['i']->value) {
$__foreach_i_0_saved_local_item = $_smarty_tpl->tpl_vars['i'];
?>
            <?php if ($_smarty_tpl->tpl_vars['pageno']->value != $_smarty_tpl->tpl_vars['current_page']->value) {?><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo $_smarty_tpl->tpl_vars['startKey']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pageno']->value;?>
</a>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['pageno']->value;?>

            <?php }?>
        <?php
$_smarty_tpl->tpl_vars['i'] = $__foreach_i_0_saved_local_item;
}
}
if ($__foreach_i_0_saved_item) {
$_smarty_tpl->tpl_vars['i'] = $__foreach_i_0_saved_item;
}
if ($__foreach_i_0_saved_key) {
$_smarty_tpl->tpl_vars['pageno'] = $__foreach_i_0_saved_key;
}
?>
        <?php if ($_smarty_tpl->tpl_vars['current_page']->value != $_smarty_tpl->tpl_vars['pagecount']->value) {?><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
?<?php echo $_smarty_tpl->tpl_vars['startKey']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['startnext']->value;?>
">Next</a>
        <?php }?>
    <?php }?>
</div>
<?php }
}
