{include file="{$smarty.const.BASETEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.BASETEMPLATEPATH}navbar.tpl"}
<div class="content-wrapper" style="min-height: 820px;">
    <div class="content-header">
        <h1>News</h1>
    </div>
    {*Registration Box*}
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{if isset($totalUser)}{$totalUser}{/if}</h3>

                <p>User Registered</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-plus"></i>
            </div>
        </div>
    </div>
    {*New Cheatsheets*}
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{if isset($totalCheatSheets)}{$totalCheatSheets}{/if}</h3>
                <p>Total CheatSheets</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
</div>

{include file="{$smarty.const.BASETEMPLATEPATH}footer.tpl"}