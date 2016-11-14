{include file="{$smarty.const.TNTEMPLATEPATH}header.tpl"}
{include file="{$smarty.const.SHOPTEMPLATEPATH}navigation.tpl"}
<main class="Site-content">
    <section class="Section">
        <div class="Container">
            {include file="{$smarty.const.TNTEMPLATEPATH}error.tpl"}
                <form action="{$smarty.server.SCRIPT_NAME}" method="post">
                    <div class="InputCombo Grid-full">
                        <label for="{$ptypeKey}" class="InputCombo-label">Product Category:</label>
                        <input type="search" id="{$ptypeKey}" name="{$ptypeKey}" value="{if isset($ptypeValue)}{$ptypeValue}{/if}" class="InputCombo-field">
                    </div>
                    <div class="Grid-full">
                        <button type="submit" class="Button">Add Product Category</button>
                    </div>
                </form>
            <br>
            <h2 class="Section-heading">List of Product Categories</h2>
            <div class="InputCombo Grid-full">
                    {include file="{$smarty.const.SHOPTEMPLATEPATH}tablestyles.tpl"}
                    <table>
                        <tr>
                            <th>PTypeID</th>
                            <th>Product_Type</th>
                        </tr>
                        {foreach key=cid item=con from=$pageArray}
                            <tr>
                                <td>{$con.idproduct_category}</td>
                                <td>{$con.product_category_name}</td>
                            </tr>
                            {foreachelse}
                            <tr>
                                <td> No products found in search </td>
                                <td>&nbsp;</td>
                            </tr>
                        {/foreach}
                    </table>
             </div>
        </div>
    </section>
</main>
{include file="{$smarty.const.TNTEMPLATEPATH}footer.tpl"}