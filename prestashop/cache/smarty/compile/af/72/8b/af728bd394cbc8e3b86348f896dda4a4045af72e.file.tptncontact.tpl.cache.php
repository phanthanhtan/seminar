<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:14
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptncontact/tptncontact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1762104114545886da5117a1-06534301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af728bd394cbc8e3b86348f896dda4a4045af72e' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptncontact/tptncontact.tpl',
      1 => 1413167524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1762104114545886da5117a1-06534301',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tptnaddress1' => 0,
    'tptnaddress2' => 0,
    'tptnaddress3' => 0,
    'tptnphone' => 0,
    'tptnemail' => 0,
    'tptnfacebook' => 0,
    'tptntwitter' => 0,
    'tptnpinterest' => 0,
    'tptngoogle' => 0,
    'tptnlinkedin' => 0,
    'tptnyoutube' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886da5cc4e3_87728756',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886da5cc4e3_87728756')) {function content_545886da5cc4e3_87728756($_smarty_tpl) {?><?php if (!is_callable('smarty_function_mailto')) include '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/tools/smarty/plugins/function.mailto.php';
?><div id="tptncontact" class="footer-block">
	<h4><?php echo smartyTranslate(array('s'=>'Contact us','mod'=>'tptncontact'),$_smarty_tpl);?>
</h4>
	<span class="toggler"></span>
	<ul>
		<li>
			<p><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tptnaddress1']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</p>
			<p><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tptnaddress2']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</p>
			<p class="lastline"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tptnaddress3']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</p>
		</li>
		<?php if ($_smarty_tpl->tpl_vars['tptnphone']->value!=''){?><li><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tptnphone']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['tptnemail']->value!=''){?><li><?php echo smarty_function_mailto(array('address'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tptnemail']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),'encode'=>"hex"),$_smarty_tpl);?>
</li><?php }?>
	</ul>
	<ul class="social">
		<?php if ($_smarty_tpl->tpl_vars['tptnfacebook']->value!=''){?><li class="facebook"><a class="fa fa-facebook tooltip" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tptnfacebook']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="Facebook"></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['tptntwitter']->value!=''){?><li class="twitter"><a class="fa fa-twitter tooltip" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tptntwitter']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="Twitter"></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['tptnpinterest']->value!=''){?><li class="pinterest"><a class="fa fa-pinterest tooltip" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tptnpinterest']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="Pinterest"></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['tptngoogle']->value!=''){?><li class="google"><a class="fa fa-google-plus tooltip" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tptngoogle']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="Google+"></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['tptnlinkedin']->value!=''){?><li class="linkedin"><a class="fa fa-linkedin tooltip" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tptnlinkedin']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="Linkedin"></a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['tptnyoutube']->value!=''){?><li class="youtube"><a class="fa fa-youtube-play tooltip" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tptnyoutube']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="Youtube"></a></li><?php }?>
	</ul>
</div>
<?php }} ?>