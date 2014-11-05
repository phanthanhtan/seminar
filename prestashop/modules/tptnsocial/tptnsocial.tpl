<div id="tptnsocial">
	{if $fb_url != ''}
	<div id="tptnfacebook">
		<div class="tptnsocial_icon fa fa-facebook"></div>
		<div class="tptnsocial_box">
			<iframe src="//www.facebook.com/plugins/likebox.php?href={$fb_url}&amp;
				width=237&amp;
				height=258&amp;
				show_faces=true&amp;
				colorscheme=light&amp;
				stream=false&amp;
				show_border=false&amp;
				header=false" 
				scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:237px; height:258px;"></iframe>
		</div>
	</div>
	{/if}

	{if $tw_user != ''}
	<div id="tptntwitter">
		<div class="tptnsocial_icon fa fa-twitter"></div>
		<div class="tptnsocial_box">
			<a class="twitter-timeline" href="https://twitter.com/{$tw_user}" data-widget-id="{$tw_id}" height="300px" width="237px" lang="{$iso_code}"></a>
			<script type="text/javascript">
			// <![CDATA[
				{literal}
				!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
				{/literal}
			//]]>
			</script>
		</div>
	</div>
	{/if}
</div>