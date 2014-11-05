<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:59:27
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/mailalerts/views/templates/hook/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6138247095458875f3a6295-86913388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '614e320435f88efeeeb8bc859aa3275758fb71c2' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/mailalerts/views/templates/hook/product.tpl',
      1 => 1413730178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6138247095458875f3a6295-86913388',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'id_product' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5458875f40a255_05267875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5458875f40a255_05267875')) {function content_5458875f40a255_05267875($_smarty_tpl) {?>
<script type="text/javascript">
// <![CDATA[
oosHookJsCodeFunctions.push('oosHookJsCodeMailAlert');

function clearText() {
	if ($('#oos_customer_email').val() == '<?php echo smartyTranslate(array('s'=>'your@email.com','mod'=>'mailalerts'),$_smarty_tpl);?>
')
		$('#oos_customer_email').val('');
}

function oosHookJsCodeMailAlert() {
	$.ajax({
		type: 'POST',
		url: "<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('mailalerts','actions',array('process'=>'check'));?>
",
		data: 'id_product=<?php echo $_smarty_tpl->tpl_vars['id_product']->value;?>
&id_product_attribute='+$('#idCombination').val(),
		success: function (msg) {
			if ($.trim(msg) == '0') {
				$('#mailalert_link').show();
				$('#oos_customer_email').show();
			}
			else {
				$('#mailalert_link').hide();
				$('#oos_customer_email').hide();
			}
		}
	});
}

function  addNotification() {
	$.ajax({
		type: 'POST',
		url: "<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('mailalerts','actions',array('process'=>'add'));?>
",
		data: 'id_product=<?php echo $_smarty_tpl->tpl_vars['id_product']->value;?>
&id_product_attribute='+$('#idCombination').val()+'&customer_email='+$('#oos_customer_email').val()+'',
		success: function (msg) {
			if ($.trim(msg) == '1') {
				$('#mailalert_link').hide();
				$('#oos_customer_email').hide();
				$('#oos_customer_email_result').html("<?php echo smartyTranslate(array('s'=>'Request notification registered','mod'=>'mailalerts'),$_smarty_tpl);?>
");
				$('#oos_customer_email_result').css('color', 'green').show();
			}
			else if ($.trim(msg) == '2' ) {
				$('#oos_customer_email_result').html("<?php echo smartyTranslate(array('s'=>'You already have an alert for this product','mod'=>'mailalerts'),$_smarty_tpl);?>
");
				$('#oos_customer_email_result').css('color', 'red').show();
			} else {
				$('#oos_customer_email_result').html("<?php echo smartyTranslate(array('s'=>'Your e-mail address is invalid','mod'=>'mailalerts'),$_smarty_tpl);?>
");
				$('#oos_customer_email_result').css('color', 'red').show();
			}
		}
	});
	return false;
}

$(document).ready(function() {
	oosHookJsCodeMailAlert();
	$('#oos_customer_email').bind('keypress', function(e) {
		if(e.keyCode == 13)
		{
			addNotification();
			return false;
		}
	});
});

//]]>
</script>

<!-- MODULE MailAlerts -->
	<?php if (isset($_smarty_tpl->tpl_vars['email']->value)&&$_smarty_tpl->tpl_vars['email']->value){?>
		<input type="text" id="oos_customer_email" name="customer_email" size="20" value="<?php echo smartyTranslate(array('s'=>'your@email.com','mod'=>'mailalerts'),$_smarty_tpl);?>
" class="mailalerts_oos_email" onclick="clearText();" /><br />
	<?php }?>
	<a href="#" title="<?php echo smartyTranslate(array('s'=>'Notify me when available','mod'=>'mailalerts'),$_smarty_tpl);?>
" onclick="return addNotification();" id="mailalert_link" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Notify me when available','mod'=>'mailalerts'),$_smarty_tpl);?>
</a>
	<span id="oos_customer_email_result" style="display:none;"></span>
<!-- END : MODULE MailAlerts -->
<?php }} ?>