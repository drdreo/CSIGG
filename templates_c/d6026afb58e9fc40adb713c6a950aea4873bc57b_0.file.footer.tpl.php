<?php
/* Smarty version 3.1.28, created on 2016-11-09 09:41:58
  from "/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/normform/basetemplates/footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5822e1566bd3a4_28797975',
  'file_dependency' => 
  array (
    'd6026afb58e9fc40adb713c6a950aea4873bc57b' => 
    array (
      0 => '/Users/Andreas/Dropbox/GitHub/MH_DBA-DAB_OnlineShop/normform/basetemplates/footer.tpl',
      1 => 1478680820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5822e1566bd3a4_28797975 ($_smarty_tpl) {
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
