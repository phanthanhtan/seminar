<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:13
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnsubbanner/views/templates/hook/tptnsubbanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1773077152545886d94815e1-88634092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a1cb57f959cbd8f492f6cba1fc8a0c815177346' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnsubbanner/views/templates/hook/tptnsubbanner.tpl',
      1 => 1413167528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1773077152545886d94815e1-88634092',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tptnsubbanner_slides' => 0,
    'slide' => 0,
    'BannerPerLine' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d94efc66_61594288',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d94efc66_61594288')) {function content_545886d94efc66_61594288($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['tptnsubbanner_slides']->value)){?>
<div id="subbanner">
	<ul>
	<?php $_smarty_tpl->tpl_vars['BannerPerLine'] = new Smarty_variable(3, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tptnsubbanner_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['SubBanner']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
$_smarty_tpl->tpl_vars['slide']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['SubBanner']['iteration']++;
?>
	<?php if ($_smarty_tpl->tpl_vars['slide']->value['active']){?>
		<li <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['SubBanner']['iteration']%$_smarty_tpl->tpl_vars['BannerPerLine']->value==1){?>class="first"<?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['slide']->value['title'];?>
">
				<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."tptnsubbanner/images/".((string)mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')));?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
			</a>
		</li>
	<?php }?>
	<?php } ?>
	</ul>
</div>
<?php }?><?php }} ?>