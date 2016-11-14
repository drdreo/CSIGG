<?php
/* Smarty version 3.1.30, created on 2016-11-11 17:33:50
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/includes/basetemplates/pagination.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5825f2ee002d13_15856910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b927378587464f43e538264470804604088a7649' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/includes/basetemplates/pagination.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5825f2ee002d13_15856910 (Smarty_Internal_Template $_smarty_tpl) {
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagenumber']->value, 'i', false, 'pageno');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pageno']->value => $_smarty_tpl->tpl_vars['i']->value) {
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
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
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
