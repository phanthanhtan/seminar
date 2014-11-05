<div id="tptncontact" class="footer-block">
	<h4>{l s='Contact us' mod='tptncontact'}</h4>
	<span class="toggler"></span>
	<ul>
		<li>
			<p>{$tptnaddress1|escape:'htmlall':'UTF-8'}</p>
			<p>{$tptnaddress2|escape:'htmlall':'UTF-8'}</p>
			<p class="lastline">{$tptnaddress3|escape:'htmlall':'UTF-8'}</p>
		</li>
		{if $tptnphone != ''}<li>{$tptnphone|escape:'htmlall':'UTF-8'}</li>{/if}
		{if $tptnemail != ''}<li>{mailto address=$tptnemail|escape:'htmlall':'UTF-8' encode="hex"}</li>{/if}
	</ul>
	<ul class="social">
		{if $tptnfacebook != ''}<li class="facebook"><a class="fa fa-facebook tooltip" href="{$tptnfacebook|escape:html:'UTF-8'}" title="Facebook"></a></li>{/if}
		{if $tptntwitter != ''}<li class="twitter"><a class="fa fa-twitter tooltip" href="{$tptntwitter|escape:html:'UTF-8'}" title="Twitter"></a></li>{/if}
		{if $tptnpinterest != ''}<li class="pinterest"><a class="fa fa-pinterest tooltip" href="{$tptnpinterest|escape:html:'UTF-8'}" title="Pinterest"></a></li>{/if}
		{if $tptngoogle != ''}<li class="google"><a class="fa fa-google-plus tooltip" href="{$tptngoogle|escape:html:'UTF-8'}" title="Google+"></a></li>{/if}
		{if $tptnlinkedin != ''}<li class="linkedin"><a class="fa fa-linkedin tooltip" href="{$tptnlinkedin|escape:html:'UTF-8'}" title="Linkedin"></a></li>{/if}
		{if $tptnyoutube != ''}<li class="youtube"><a class="fa fa-youtube-play tooltip" href="{$tptnyoutube|escape:html:'UTF-8'}" title="Youtube"></a></li>{/if}
	</ul>
</div>
