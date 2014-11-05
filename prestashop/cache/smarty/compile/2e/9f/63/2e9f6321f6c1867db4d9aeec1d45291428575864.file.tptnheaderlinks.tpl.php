<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:12
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnheaderlinks/tptnheaderlinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1788871290545886d865e5d8-46746725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e9f6321f6c1867db4d9aeec1d45291428575864' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnheaderlinks/tptnheaderlinks.tpl',
      1 => 1413167524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1788871290545886d865e5d8-46746725',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d86ea706_47747972',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d86ea706_47747972')) {function content_545886d86ea706_47747972($_smarty_tpl) {?><div id="tptn_header_links">
<ul>
	<?php if ($_smarty_tpl->tpl_vars['logged']->value){?>
		<li>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My account','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My account','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
</a>
		</li>
		<li>
			<a href="<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true));?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
</a>
		</li>
		<li>
			<a class="logout" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
</a>
		</li>
	<?php }else{ ?>
		<li>
			<a class="login" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Sign in','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign in','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
</a>
		</li>
		<li>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Register','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Register','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
</a>
		</li>
	<?php }?>
</ul>
</div>

<div id="top-categ">
	<span><?php echo smartyTranslate(array('s'=>'Categories','mod'=>'tptnheaderlinks'),$_smarty_tpl);?>
</span>
</div><?php }} ?>