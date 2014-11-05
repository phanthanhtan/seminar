<div id="tptn_header_links">
<ul>
	{if $logged}
		<li>
			<a href="{$link->getPageLink('my-account', true)|escape:'html'}" title="{l s='My account' mod='tptnheaderlinks'}" rel="nofollow">{l s='My account' mod='tptnheaderlinks'}</a>
		</li>
		<li>
			<a href="{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|addslashes}" title="{l s='My wishlists' mod='tptnheaderlinks'}">{l s='My wishlists' mod='tptnheaderlinks'}</a>
		</li>
		<li>
			<a class="logout" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html'}" rel="nofollow" title="{l s='Sign out' mod='tptnheaderlinks'}">{l s='Sign out' mod='tptnheaderlinks'}</a>
		</li>
	{else}
		<li>
			<a class="login" href="{$link->getPageLink('my-account', true)|escape:'html'}" rel="nofollow" title="{l s='Sign in' mod='tptnheaderlinks'}">{l s='Sign in' mod='tptnheaderlinks'}</a>
		</li>
		<li>
			<a href="{$link->getPageLink('my-account', true)|escape:'html'}" rel="nofollow" title="{l s='Register' mod='tptnheaderlinks'}">{l s='Register' mod='tptnheaderlinks'}</a>
		</li>
	{/if}
</ul>
</div>

<div id="top-categ">
	<span>{l s='Categories' mod='tptnheaderlinks'}</span>
</div>