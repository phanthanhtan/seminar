{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($products) && $products}
	<!-- Products list -->
	<ul{if isset($id) && $id} id="{$id}"{/if} class="product_list grid {if isset($class) && $class} {$class}{/if}{if isset($active) && $active == 1} active{/if}">
	{foreach from=$products item=product name=products}
		<li class="ajax_block_product{if $smarty.foreach.products.first} first_item{elseif $smarty.foreach.products.last} last_item{/if} item" itemscope itemtype="http://schema.org/Product">
			<div class="left-block">
				<div class="product-image-container">
					<a class="product_img_link"	href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
						<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} itemprop="image" />
					</a>
					{if isset($product.new) && $product.new == 1}<span class="new-box">{l s='New'}</span>{/if}
					{if isset($product.reduction) && $product.reduction}<span class="sale-box">{l s='Sale!'}</span>{/if}
				</div>
				<div class="functional-buttons clearfix">
					<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="button-container">
					{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
						{if ($product.allow_oosp || $product.quantity > 0)}
							{if isset($static_token)}
								<a class="ajax_add_to_cart_button tooltip" href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}"></a>
							{else}
								<a class="ajax_add_to_cart_button tooltip" href="{$link->getPageLink('cart',false, NULL, 'add=1&amp;id_product={$product.id_product|intval}', false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}"></a>
							{/if}						
						{else}
							<span class="ajax_add_to_cart_button disabled"></span>
						{/if}
					{/if}
					</div>
					<div class="quickview">
						<a class="quick-view tooltip" href="{$product.link|escape:'html':'UTF-8'}" title="{l s='Quick view'}" rel="{$product.link|escape:'html':'UTF-8'}"></a>
					</div>	
					{if $page_name != 'index'}
						{hook h='displayProductListFunctionalButtons' product=$product}
						{if isset($comparator_max_item) && $comparator_max_item}
							<div class="compare">
								<a class="add_to_compare tooltip" href="{$product.link|escape:'html':'UTF-8'}" title="{l s='Add to Compare'}" data-id-product="{$product.id_product}"></a>
							</div>
						{/if}
					{/if}
				</div>				
			</div>
			<div class="right-block">
				<h5 itemprop="name">
					{if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}
					<a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
						{$product.name|truncate:45:'...'|escape:'html':'UTF-8'}
					</a>
				</h5>
				{hook h='displayProductListReviews' product=$product}
				<p class="product-desc" itemprop="description">
					{$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}
				</p>
				{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
				<div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
					{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
						<span itemprop="price" class="price product-price">
							{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
						</span>
						<meta itemprop="priceCurrency" content="{$priceDisplay}" />
						{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction}
							<span class="old-price product-price">
								{displayWtPrice p=$product.price_without_reduction}
							</span>
							{if $product.specific_prices.reduction_type == 'percentage'}
								<span class="price-percent-reduction reduction">-{$product.specific_prices.reduction * 100}%</span>
							{/if}
							{if $product.specific_prices.reduction_type == 'amount'}
								<span class="price-amount-reduction reduction">-{convertPrice price=$product.specific_prices.reduction|floatval}</span>
							{/if}
						{/if}
					{/if}
				</div>
				{/if}
				{if isset($product.color_list)}
					<div class="color-list-container">{$product.color_list} </div>
				{/if}
				<div class="product-flags">
					{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
						{if isset($product.online_only) && $product.online_only}
							<span class="online_only">{l s='Online only'}</span>
						{/if}
					{/if}
					{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
						{elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
							<span class="discount">{l s='Reduced price!'}</span>
						{/if}
				</div>
				{if (!$PS_CATALOG_MODE && $PS_STOCK_MANAGEMENT && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
					{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
						<span itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="availability">
							{if ($product.allow_oosp || $product.quantity > 0)}
								<span class="available-now">
									<link itemprop="availability" href="http://schema.org/InStock" />{l s='In Stock'}
								</span>
							{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
								<span class="available-dif">
									<link itemprop="availability" href="http://schema.org/LimitedAvailability" />{l s='Product available with different options'}
								</span>
							{else}
								<span class="out-of-stock">
									<link itemprop="availability" href="http://schema.org/OutOfStock" />{l s='Out of stock'}
								</span>
							{/if}
						</span>
					{/if}
				{/if}
			</div>
		</li>
	{/foreach}
	</ul>
{addJsDefL name=min_item}{l s='Please select at least one product' js=1}{/addJsDefL}
{addJsDefL name=max_item}{l s='You cannot add more than %d product(s) to the product comparison' sprintf=$comparator_max_item js=1}{/addJsDefL}
{addJsDef comparator_max_item=$comparator_max_item}
{addJsDef comparedProductsIds=$compared_products}
{/if}