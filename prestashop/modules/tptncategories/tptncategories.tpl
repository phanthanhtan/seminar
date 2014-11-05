{if $blockCategTree && $blockCategTree.children|@count}
<div id="categories_block_left" class="demo-container block">
	<div class="tptn-vertical-mega-menu">
		<ul id="mega-1" class="menu right">
		{foreach from=$blockCategTree.children item=child name=blockCategTree}
			{if $smarty.foreach.blockCategTree.last}
				{include file="$tree_tpl_path" node=$child last='true'}
			{else}
				{include file="$tree_tpl_path" node=$child}
			{/if}
		{/foreach}
		</ul>
	</div>
</div>
{/if}
