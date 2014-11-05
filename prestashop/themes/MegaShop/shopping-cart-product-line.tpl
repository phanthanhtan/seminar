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
<tr id="product_{$product.id_product}_{$product.id_product_attribute}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}{if !empty($product.gift)}_gift{/if}" class="cart_item{if isset($productLast) && $productLast && (!isset($ignoreProductLast) || !$ignoreProductLast)} last_item{/if}{if isset($productFirst) && $productFirst} first_item{/if}{if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0} alternate_item{/if} address_{$product.id_address_delivery|intval} {if $odd}odd{else}even{/if}">
	{if !isset($noDeleteButton) || !$noDeleteButton}
	<td class="cart_delete text-center" data-title="Delete">
		{if (!isset($customizedDatas.$productId.$productAttributeId) OR $quantityDisplayed > 0) && empty($product.gift)}
			<div class="narrow-screen">{l s='Delete'}</div>
			<div class="floatL">
				<a rel="nofollow" title="{l s='Delete'}" class="cart_quantity_delete" id="{$product.id_product}_{$product.id_product_attribute}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;token={$token_cart}")|escape:'html':'UTF-8'}"><i class="fa fa-trash-o"></i></a>
			</div>
		{else}

		{/if}
	</td>
	{/if}
	<td class="cart_product">
		<div class="narrow-screen">{l s='Product'}</div>
		<div class="floatL">
			<a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'html':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}" {if isset($smallSize)}width="{$smallSize.width}" height="{$smallSize.height}" {/if} /></a>
		</div>
	</td>
	<td class="cart_description">
		<div class="narrow-screen">{l s='Description'}</div>
		<div class="floatL">
			<p class="product-name"><a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'html':'UTF-8'}">{$product.name|escape:'html':'UTF-8'}</a></p>
	        {if $product.reference}<small class="cart_ref">{l s='SKU'} : {$product.reference|escape:'html':'UTF-8'}</small>{/if}
			{if isset($product.attributes) && $product.attributes}<small><a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'html':'UTF-8'}">{$product.attributes|escape:'html':'UTF-8'}</a></small>{/if}
		<div>
	</td>
	{if $PS_STOCK_MANAGEMENT}
		<td class="cart_avail" >
			<div class="narrow-screen">{l s='Avail.'}</div>
			<div class="floatL">
				{if $product.quantity_available > 0}<span class="label label-success">{l s='In Stock'}</span>{else}<span class="label label-warning">{l s='Out of Stock'}</span>{/if}
			</div>
		</td>
	{/if}
	<td class="cart_unit" data-title="{l s='Unit price'}">
		<div class="narrow-screen">{l s='Unit price'}</div>
		<div class="floatL">
			<span class="price" id="product_price_{$product.id_product}_{$product.id_product_attribute}{if $quantityDisplayed > 0}_nocustom{/if}_{$product.id_address_delivery|intval}{if !empty($product.gift)}_gift{/if}">
				{if !empty($product.gift)}
					<span class="gift-icon">{l s='Gift!'}</span>
				{else}
	            	{if !$priceDisplay}
						<span class="price{if isset($product.is_discounted) && $product.is_discounted} special-price{/if}">{convertPrice price=$product.price_wt}</span>
					{else}
	               	 	<span class="price{if isset($product.is_discounted) && $product.is_discounted} special-price{/if}">{convertPrice price=$product.price}</span>
					{/if}
					{if isset($product.is_discounted) && $product.is_discounted}
						<br/><br/>
						<span class="old-price">{convertPrice price=$product.price_without_specific_price}</span>
						{* <span class="price-percent-reduction small">
	                    	{assign var='priceReductonPercent' value=(($product.price_without_specific_price - $product.price_wt)/$product.price_without_specific_price) * 100 * -1}
							{$priceReductonPercent|round|string_format:"%d"}%
	                    </span> *}
					{/if}
				{/if}
			</span>
		</div>
	</td>

	<td class="cart_quantity">
		<div class="narrow-screen">{l s='Qty'}</div>
		<div class="floatL">
			{if isset($cannotModify) AND $cannotModify == 1}
				<span>
					{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}
						{$product.customizationQuantityTotal}
					{else}
						{$product.cart_quantity-$quantityDisplayed}
					{/if}
				</span>
			{else}
				{if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0}
					<span id="cart_quantity_custom_{$product.id_product}_{$product.id_product_attribute}_{$product.id_address_delivery|intval}" >{$product.customizationQuantityTotal}</span>
				{/if}
				{if !isset($customizedDatas.$productId.$productAttributeId) OR $quantityDisplayed > 0}
					<div class="cart_quantity_button clearfix">
						{if $product.minimal_quantity < ($product.cart_quantity-$quantityDisplayed) OR $product.minimal_quantity <= 1}
							<a rel="nofollow" class="cart_quantity_down btn btn-default button-minus" id="cart_quantity_down_{$product.id_product}_{$product.id_product_attribute}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;op=down&amp;token={$token_cart}")|escape:'html':'UTF-8'}" title="{l s='Subtract'}">
							<i class="fa fa-minus"></i>
						</a>
						{else}
							<a class="cart_quantity_down btn btn-default button-minus disabled" href="#" id="cart_quantity_down_{$product.id_product}_{$product.id_product_attribute}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" title="{l s='You must purchase a minimum of %d of this product.' sprintf=$product.minimal_quantity}">
							<i class="fa fa-minus"></i>
						</a>
						{/if}
						<input type="hidden" value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|@count}{else}{$product.cart_quantity-$quantityDisplayed}{/if}" name="quantity_{$product.id_product}_{$product.id_product_attribute}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}_hidden" />
						<input size="2" type="text" autocomplete="off" class="cart_quantity_input form-control grey" value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|@count}{else}{$product.cart_quantity-$quantityDisplayed}{/if}" name="quantity_{$product.id_product}_{$product.id_product_attribute}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" />
	                	<a rel="nofollow" class="cart_quantity_up btn btn-default button-plus" id="cart_quantity_up_{$product.id_product}_{$product.id_product_attribute}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;token={$token_cart}")|escape:'html':'UTF-8'}" title="{l s='Add'}"><i class="fa fa-plus"></i></a>
					</div>
				{/if}
			{/if}
		</div>
	</td>
	<td class="cart_total" data-title="{l s='Total'}">
		<div class="narrow-screen">{l s='Total'}</div>
		<div class="floatL">
			<span class="price" id="total_product_price_{$product.id_product}_{$product.id_product_attribute}{if $quantityDisplayed > 0}_nocustom{/if}_{$product.id_address_delivery|intval}{if !empty($product.gift)}_gift{/if}">
				{if !empty($product.gift)}
					<span class="gift-icon">{l s='Gift!'}</span>
				{else}
					{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}
						{if !$priceDisplay}{displayPrice price=$product.total_customization_wt}{else}{displayPrice price=$product.total_customization}{/if}
					{else}
						{if !$priceDisplay}{displayPrice price=$product.total_wt}{else}{displayPrice price=$product.total}{/if}
					{/if}
				{/if}
			</span>
		</div>
	</td>	
</tr>
