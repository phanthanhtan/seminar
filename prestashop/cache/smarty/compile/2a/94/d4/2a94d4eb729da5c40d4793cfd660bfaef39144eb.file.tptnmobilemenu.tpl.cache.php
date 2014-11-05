<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:12
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnmobilemenu/tptnmobilemenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1626871281545886d87a63a1-81966402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a94d4eb729da5c40d4793cfd660bfaef39144eb' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnmobilemenu/tptnmobilemenu.tpl',
      1 => 1413167526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1626871281545886d87a63a1-81966402',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d87ba402_55747703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d87ba402_55747703')) {function content_545886d87ba402_55747703($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!=''){?>
	<!-- Menu -->
	<div id="tptnmobilemenu">
		<span class="tglr"><i class="fa fa-bars"></i></span>
		<div class="blockresp-title"><?php echo smartyTranslate(array('s'=>'Categories','mod'=>'tptnmobilemenu'),$_smarty_tpl);?>
</div>
		<ul class="mobilemenu">
			<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

		</ul>
	</div>	
	<!--/ Menu -->
<?php }?><?php }} ?>