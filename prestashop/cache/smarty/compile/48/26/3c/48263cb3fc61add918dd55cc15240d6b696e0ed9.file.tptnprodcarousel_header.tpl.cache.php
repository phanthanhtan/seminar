<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:11
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnprodcarousel/tptnprodcarousel_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:617956611545886d7af7cf7-98180670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48263cb3fc61add918dd55cc15240d6b696e0ed9' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnprodcarousel/tptnprodcarousel_header.tpl',
      1 => 1413167526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '617956611545886d7af7cf7-98180670',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tptnprodcarousel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d7b16828_46661081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d7b16828_46661081')) {function content_545886d7b16828_46661081($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['tptnprodcarousel']->value)){?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('carousel_play'=>$_smarty_tpl->tpl_vars['tptnprodcarousel']->value['play']),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('carousel_speed'=>$_smarty_tpl->tpl_vars['tptnprodcarousel']->value['speed']),$_smarty_tpl);?>

<?php }?><?php }} ?>