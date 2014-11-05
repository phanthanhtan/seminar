<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:12
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/themes/MegaShop/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:339234450545886d8744391-89993777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ba4355d55f18a68cdb555941762552b99f258a6' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/themes/MegaShop/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1413167506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '339234450545886d8744391-89993777',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d87533c4_48940685',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d87533c4_48940685')) {function content_545886d87533c4_48940685($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!=''){?>
	<div id="tptntopmenu">
		<ul class="topmenu">
			<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

		</ul>
	</div>
<?php }?><?php }} ?>