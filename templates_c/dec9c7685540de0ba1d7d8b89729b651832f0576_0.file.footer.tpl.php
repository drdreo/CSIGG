<?php
/* Smarty version 3.1.30, created on 2016-11-11 17:23:13
  from "/Applications/XAMPP/xamppfiles/htdocs/shop/normform/basetemplates/footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5825f071ed25a7_67761203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dec9c7685540de0ba1d7d8b89729b651832f0576' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/shop/normform/basetemplates/footer.tpl',
      1 => 1478680820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5825f071ed25a7_67761203 (Smarty_Internal_Template $_smarty_tpl) {
?>
<footer class="Site-footer">
    <div class="Footer Footer--small">
        <p class="Footer-credits">Created and maintained by <a href="mailto:martin.harrer@fh-hagenberg.at">Martin Harrer</a> and <a href="mailto:wolfgang.hochleitner@fh-hagenberg.at">Wolfgang Hochleitner</a>.</p>
        <p class="Footer-version"><?php echo @constant('ICON');
echo @constant('TITLE');?>
 Version 2016</p>
        <p class="Footer-version">Uses: <a href="http://www.smarty.net/">Smarty Templates</a></p>
    </div>
</footer>
<?php echo '<script'; ?>
 src="../js/lightbox.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var lightbox = new Lightbox();
    lightbox.load();
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
