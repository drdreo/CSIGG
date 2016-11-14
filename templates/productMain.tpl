{include file="{$smarty.const.TNTEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.SHOPTEMPLATEPATH}navigation.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            <h2 class="Section-heading">Add Product</h2>
            {include file="{$smarty.const.TNTEMPLATEPATH}error.tpl"}
            <form action="{$smarty.server.SCRIPT_NAME}" method="post" enctype="multipart/form-data">
                <div class="InputCombo Grid-full">
                    <label for="{$pnameKey}" class="InputCombo-label">Product Name:</label>
                    <input type="text" id="{$pnameKey}" name="{$pnameKey}" value="{if isset($pnameValue)}{$pnameValue}{/if}" placeholder="Choose a unique Product Name" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$priceKey}" class="InputCombo-label">Price:</label>
                    <input type="text" id="{$priceKey}" name="{$priceKey}" value="{if isset($priceValue)}{$priceValue}{/if}" size="10" maxlength="10"  placeholder="0,00" class="InputCombo-field">
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$ptypeKey}" class="InputCombo-label">Product Type:</label>
                    <select name="{$ptypeKey}" id="{$ptypeKey}" size="1" class="InputCombo-field">
                        {foreach key=cid item=con from=$ptypeArray}
                            <option {if isset($selected)}{if $selected === $con.product_category_name} selected="selected" {/if} {/if}>{$con.product_category_name}</option>
                            {foreachelse}
                            <option>Nothing to select so far</option>
                        {/foreach}
                    </select>
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$activeKey}" class="InputCombo-label">Active</label><span>&nbsp;</span>
                    <input type="radio" name="{$activeKey}"  value="1" {if isset($activeValue)} {if $activeValue == 1} checked="checked" {/if} {/if}/><span>&nbsp;</span>
                    <label for="{$activeKey}" class="InputCombo-label">Inactive</label><span>&nbsp;</span>
                    <input type="radio" name="{$activeKey}"  value="0" {if isset($activeValue)} {if $activeValue == 0}  checked="checked" {/if} {/if}/><span>&nbsp;</span>
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$shortdescKey}" class="InputCombo-label">Short Description:</label>
                    <textarea name="{$shortdescKey}" id="{$shortdescKey}" cols="40" rows="5"  class="InputCombo-field">{if isset($shortdescValue)} {$shortdescValue} {/if}</textarea>
                </div>
                <div class="InputCombo Grid-full">
                    <label for="{$longdescKey}" class="InputCombo-label">Long Description:</label>
                    <textarea name="{$longdescKey}" id="{$longdescKey}" cols="40" rows="15"  class="InputCombo-field">{if isset($longdescValue)} {$longdescValue} {/if}</textarea>
                </div>
                <div class="Grid-full">
                    <button type="submit" class="Button">Add Product</button>
                </div>
            </form>
        </div>
    </section>
</main>
{include file="{$smarty.const.TNTEMPLATEPATH}footer.tpl"}
