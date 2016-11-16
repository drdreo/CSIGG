{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.BASETEMPLATEPATH}navbar.tpl"}
<div class="content-wrapper" style="min-height: 700px;">
    <div class="content-header col-l-12">
        <h1>Profile</h1>
    </div>

    {include file="{$smarty.const.TEMPLATEPATH}user_data_box.tpl"}
    {include file="{$smarty.const.TEMPLATEPATH}user_sheets_box.tpl"}


</div>
<!-- /.content-wrapper -->
{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}