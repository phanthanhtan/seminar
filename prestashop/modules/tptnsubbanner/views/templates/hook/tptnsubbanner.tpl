
{if isset($tptnsubbanner_slides)}
<div id="subbanner">
	<ul>
	{assign var='BannerPerLine' value=3}
	{foreach from=$tptnsubbanner_slides item=slide name=SubBanner}
	{if $slide.active}
		<li {if $smarty.foreach.SubBanner.iteration%$BannerPerLine == 1}class="first"{/if}>
			<a href="{$slide.url}" title="{$slide.title}">
				<img src="{$link->getMediaLink("`$smarty.const._MODULE_DIR_`tptnsubbanner/images/`$slide.image|escape:'htmlall':'UTF-8'`")}" alt="{$slide.title|escape:'htmlall':'UTF-8'}" />
			</a>
		</li>
	{/if}
	{/foreach}
	</ul>
</div>
{/if}