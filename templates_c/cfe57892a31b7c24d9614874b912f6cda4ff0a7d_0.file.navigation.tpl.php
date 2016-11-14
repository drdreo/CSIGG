<?php
/* Smarty version 3.1.30, created on 2016-11-11 17:33:49
  from "/Applications/XAMPP/xamppfiles/htdocs/onlineshop/includes/basetemplates/navigation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5825f2edf2c6d3_38820910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfe57892a31b7c24d9614874b912f6cda4ff0a7d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/onlineshop/includes/basetemplates/navigation.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5825f2edf2c6d3_38820910 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Styles not needed for IMAR, therefore not in css. So its easier to reuse IMAR -->
<style type="text/css" scoped>
    
        .Navigation {
            text-align: left;
        }
    
</style>
<div class="Header Navigation">
    <nav class="Container">
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/onlineshop/index.php")) {?> <a href="index.php">Home</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/onlineshop/register.php")) {?> <a href="register.php">Register</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/onlineshop/product.php")) {?> <a href="product.php">Add Products</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/onlineshop/mycart.php")) {?> <a href="mycart.php">My Cart</a> <?php }?> </span>
        <span class="u-spaceRS" > <?php if (!($_SERVER['SCRIPT_NAME'] === "/onlineshop/dbdemo.php")) {?> <a href="dbdemo.php">DEMO</a> <?php }?> </span>
    </nav>
</div>
<?php }
}
