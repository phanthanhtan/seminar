<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:13
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnhomeslider/views/templates/hook/tptnhomeslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:885650791545886d9411e28-35925074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd18acda3363b1f8658cdf48e0a2a3007cbdd14be' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnhomeslider/views/templates/hook/tptnhomeslider.tpl',
      1 => 1413167524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '885650791545886d9411e28-35925074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tptnhomeslider_slides' => 0,
    'slide' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d9457040_54082650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d9457040_54082650')) {function content_545886d9457040_54082650($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['tptnhomeslider_slides']->value)){?>
<div id="tptnhomeslider">
    <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tptnhomeslider_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value){
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['slide']->value['active']){?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value['url'];?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."tptnhomeslider/images/".((string)mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')));?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
        </a>
    <?php }?>
    <?php } ?>
</div>
<?php }?><?php }} ?>