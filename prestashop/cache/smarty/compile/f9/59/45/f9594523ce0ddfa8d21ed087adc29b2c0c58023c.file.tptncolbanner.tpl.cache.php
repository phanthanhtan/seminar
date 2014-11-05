<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:13
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptncolbanner/views/templates/hook/tptncolbanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2083892410545886d905b3c4-83956616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9594523ce0ddfa8d21ed087adc29b2c0c58023c' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptncolbanner/views/templates/hook/tptncolbanner.tpl',
      1 => 1413167524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2083892410545886d905b3c4-83956616',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tptncolbanner_slides' => 0,
    'slide' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d90cd761_84388803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d90cd761_84388803')) {function content_545886d90cd761_84388803($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['tptncolbanner_slides']->value)){?>
<div id="tptncolbanner" class="block">
	<ul>
	<?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tptncolbanner_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['slide']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
$_smarty_tpl->tpl_vars['slide']->_loop = true;
 $_smarty_tpl->tpl_vars['slide']->index++;
 $_smarty_tpl->tpl_vars['slide']->first = $_smarty_tpl->tpl_vars['slide']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ColBanner']['first'] = $_smarty_tpl->tpl_vars['slide']->first;
?>
	<?php if ($_smarty_tpl->tpl_vars['slide']->value['active']){?>
		<li <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['ColBanner']['first']){?>class="first"<?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['slide']->value['title'];?>
">
				<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."tptncolbanner/images/".((string)mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')));?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
			</a>
		</li>
	<?php }?>
	<?php } ?>
	</ul>
</div>
<?php }?><?php }} ?>