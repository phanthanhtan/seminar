<?php /* Smarty version Smarty-3.1.14, created on 2014-11-04 14:57:13
         compiled from "/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnprodcarousel/tptnprodcarousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2112862867545886d9986284-82532343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '422bc028cafa0194993b5867cfc184e5d80c12dc' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnprodcarousel/tptnprodcarousel.tpl',
      1 => 1413167526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2112862867545886d9986284-82532343',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_featured_prod' => 0,
    'featured_products' => 0,
    'myprod1' => 0,
    'categname1' => 0,
    'myprod2' => 0,
    'categname2' => 0,
    'myprod3' => 0,
    'categname3' => 0,
    'myprod4' => 0,
    'categname4' => 0,
    'myprod5' => 0,
    'categname5' => 0,
    'myprod6' => 0,
    'categname6' => 0,
    'myprod7' => 0,
    'categname7' => 0,
    'myprod8' => 0,
    'categname8' => 0,
    'myprod9' => 0,
    'categname9' => 0,
    'myprod10' => 0,
    'categname10' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d9b43357_22930766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d9b43357_22930766')) {function content_545886d9b43357_22930766($_smarty_tpl) {?><!-- Featured products -->
<?php if (isset($_smarty_tpl->tpl_vars['show_featured_prod']->value)&&$_smarty_tpl->tpl_vars['show_featured_prod']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'tptnprodcarousel'),$_smarty_tpl);?>
</h4>
	<?php if (isset($_smarty_tpl->tpl_vars['featured_products']->value)&&$_smarty_tpl->tpl_vars['featured_products']->value){?>
		<div class="tptnslides">
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['featured_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

		<?php } ?>
		</div>
	<?php }else{ ?>
		<p><?php echo smartyTranslate(array('s'=>'No featured products','mod'=>'tptnprodcarousel'),$_smarty_tpl);?>
</p>
	<?php }?>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod1']->value)&&$_smarty_tpl->tpl_vars['myprod1']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname1']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod2']->value)&&$_smarty_tpl->tpl_vars['myprod2']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname2']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod3']->value)&&$_smarty_tpl->tpl_vars['myprod3']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname3']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod4']->value)&&$_smarty_tpl->tpl_vars['myprod4']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname4']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod5']->value)&&$_smarty_tpl->tpl_vars['myprod5']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname5']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod5']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod6']->value)&&$_smarty_tpl->tpl_vars['myprod6']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname6']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod6']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod7']->value)&&$_smarty_tpl->tpl_vars['myprod7']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname7']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod7']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod8']->value)&&$_smarty_tpl->tpl_vars['myprod8']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname8']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod8']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod9']->value)&&$_smarty_tpl->tpl_vars['myprod9']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname9']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod9']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['myprod10']->value)&&$_smarty_tpl->tpl_vars['myprod10']->value){?>
<div class="tptncarousel clearfix">
	<h4><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categname10']->value, ENT_QUOTES, 'UTF-8', true);?>
</h4>
	<div class="tptnslides">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myprod10']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['self']->value)."/tptnprodcarousel-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	<?php } ?>
	</div>
</div>
<?php }?>
<?php }} ?>