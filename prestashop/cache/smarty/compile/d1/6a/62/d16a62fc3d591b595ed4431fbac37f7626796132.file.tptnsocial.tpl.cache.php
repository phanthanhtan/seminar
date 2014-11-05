<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:14
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnsocial/tptnsocial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1060875244545886daa25678-83993498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd16a62fc3d591b595ed4431fbac37f7626796132' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnsocial/tptnsocial.tpl',
      1 => 1413167526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1060875244545886daa25678-83993498',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fb_url' => 0,
    'tw_user' => 0,
    'tw_id' => 0,
    'iso_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886daa50a96_44198432',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886daa50a96_44198432')) {function content_545886daa50a96_44198432($_smarty_tpl) {?><div id="tptnsocial">
	<?php if ($_smarty_tpl->tpl_vars['fb_url']->value!=''){?>
	<div id="tptnfacebook">
		<div class="tptnsocial_icon fa fa-facebook"></div>
		<div class="tptnsocial_box">
			<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $_smarty_tpl->tpl_vars['fb_url']->value;?>
&amp;
				width=237&amp;
				height=258&amp;
				show_faces=true&amp;
				colorscheme=light&amp;
				stream=false&amp;
				show_border=false&amp;
				header=false" 
				scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:237px; height:258px;"></iframe>
		</div>
	</div>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['tw_user']->value!=''){?>
	<div id="tptntwitter">
		<div class="tptnsocial_icon fa fa-twitter"></div>
		<div class="tptnsocial_box">
			<a class="twitter-timeline" href="https://twitter.com/<?php echo $_smarty_tpl->tpl_vars['tw_user']->value;?>
" data-widget-id="<?php echo $_smarty_tpl->tpl_vars['tw_id']->value;?>
" height="300px" width="237px" lang="<?php echo $_smarty_tpl->tpl_vars['iso_code']->value;?>
"></a>
			<script type="text/javascript">
			// <![CDATA[
				
				!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
				
			//]]>
			</script>
		</div>
	</div>
	<?php }?>
</div><?php }} ?>