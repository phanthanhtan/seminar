{if isset($tptnhomeslider_slides)}
<div id="tptnhomeslider">
    {foreach from=$tptnhomeslider_slides item=slide}
    {if $slide.active}
        <a href="{$slide.url}">
            <img src="{$link->getMediaLink("`$smarty.const._MODULE_DIR_`tptnhomeslider/images/`$slide.image|escape:'htmlall':'UTF-8'`")}" alt="{$slide.title|escape:'htmlall':'UTF-8'}" />
        </a>
    {/if}
    {/foreach}
</div>
{/if}