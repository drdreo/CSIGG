<?php
/* Smarty version 3.1.30, created on 2016-11-14 16:23:14
  from "/Applications/XAMPP/xamppfiles/htdocs/CSIGG/normform/basetemplates/footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829d6e28d8063_13736018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f7f4fa9927f5bd3bdef18c3f3f59a05c2873fd1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/CSIGG/normform/basetemplates/footer.tpl',
      1 => 1479136993,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5829d6e28d8063_13736018 (Smarty_Internal_Template $_smarty_tpl) {
?>
<footer class="Site-footer" style="margin-top:400px;">
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
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/CSIGG/js/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
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
