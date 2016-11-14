<?php
/* Smarty version 3.1.30, created on 2016-11-11 17:33:49
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/normform/basetemplates/error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5825f2edf33302_21084870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dca02d551dfa49a1b32c9af7945cdd9175a03086' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/normform/basetemplates/error.tpl',
      1 => 1478680820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5825f2edf33302_21084870 (Smarty_Internal_Template $_smarty_tpl) {
if (count($_smarty_tpl->tpl_vars['errorMessages']->value) > 0) {?>
    <div class="Error">
        <ul class="Error-list">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errorMessages']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
                <li class="Error-listItem"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
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
