<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:11
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnhomeslider/views/templates/hook/tptnhomeslider_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1879831160545886d7a68d56-29299241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7474dc38d4b8983b588d02d49eb84ad47711075' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnhomeslider/views/templates/hook/tptnhomeslider_header.tpl',
      1 => 1413167524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1879831160545886d7a68d56-29299241',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tptnhomeslider' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d7ac6b28_42832763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d7ac6b28_42832763')) {function content_545886d7ac6b28_42832763($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['tptnhomeslider']->value)){?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('slider_play'=>$_smarty_tpl->tpl_vars['tptnhomeslider']->value['play']),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('slider_speed'=>$_smarty_tpl->tpl_vars['tptnhomeslider']->value['speed']),$_smarty_tpl);?>

<?php }?><?php }} ?>