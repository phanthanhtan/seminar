<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:14
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/themes/MegaShop/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267503638545886dabe05f2-02457234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '006fac284d548034c39113d55816334f2e3c1c07' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/themes/MegaShop/footer.tpl',
      1 => 1413167504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267503638545886dabe05f2-02457234',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'HOOK_FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886dabf9391_16942047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886dabf9391_16942047')) {function content_545886dabf9391_16942047($_smarty_tpl) {?>
	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
						
				</div>
			</div>

			<!-- Footer -->			
			<footer id="footer">
				<section class="footer_top">
					<div class="row clearfix">
						<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

					</div>
				</section>
				<section class="footer_bottom row">
					<div class="copyright_txt">Copyright &copy; text here</div>
					<div class="payment-icon"></div>
				</section>
			</footer>

		</div>
	<?php }?>

	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./global.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>