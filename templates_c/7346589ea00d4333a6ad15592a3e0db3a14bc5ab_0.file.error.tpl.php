<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:41:58
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/normform/basetemplates/error.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e1566a4034_45699629',
  'file_dependency' => 
  array (
    '7346589ea00d4333a6ad15592a3e0db3a14bc5ab' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/normform/basetemplates/error.tpl',
      1 => 1478680820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e1566a4034_45699629 ($_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['errorMessages']->value) > 0) {?>
    <div class="Error">
        <ul class="Error-list">
            <?php
$_from = $_smarty_tpl->tpl_vars['errorMessages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_error_0_saved_item = isset($_smarty_tpl->tpl_vars['error']) ? $_smarty_tpl->tpl_vars['error'] : false;
$_smarty_tpl->tpl_vars['error'] = new Smarty_Variable();
$__foreach_error_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_error_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$__foreach_error_0_saved_local_item = $_smarty_tpl->tpl_vars['error'];
?>
                <li class="Error-listItem"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
            <?php
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_local_item;
}
}
if ($__foreach_error_0_saved_item) {
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_0_saved_item;
}
?>
        </ul>
    </div>
<?php }
if (strlen($_smarty_tpl->tpl_vars['statusMessage']->value) != 0) {?>
<div class="Status">
    <p class="Status-message"><i class="fa fa-check"></i><?php echo $_smarty_tpl->tpl_vars['statusMessage']->value;?>
</p>
</div>
<?php }
}
}
