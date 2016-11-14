<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:41:58
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/includes/basetemplates/navigation.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e1566884a6_92878885',
  'file_dependency' => 
  array (
    '65d0b391f60ea7838f6ef58a26028b5e4cf12695' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/includes/basetemplates/navigation.tpl',
      1 => 1478679001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e1566884a6_92878885 ($_smarty_tpl) {
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
