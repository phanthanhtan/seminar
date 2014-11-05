<?php
if (!defined('_CAN_LOAD_FILES_'))
	exit;
	
class TptnThemeConfig extends Module
{
	public function __construct()
	{
		$this->name = 'tptnthemeconfig';
		$this->tab = 'Blocks';
		$this->version = '1.0';
		$this->author = 'Templatin';

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('MegaShop Configurator - Templatin');
		$this->description = $this->l('Change the theme colors.');
	}
	
	public function install()
	{
		return (parent::install()
		&& Configuration::updateValue('Tconfig', 1)
		&& Configuration::updateValue('titlebkg', '41AE53')
		&& Configuration::updateValue('catbkg', 'F0FFF2')
		&& Configuration::updateValue('brdclr', '74D578')
        && Configuration::updateValue('topbkg', '515C76')
		&& Configuration::updateValue('cartbkg', 'F13340')
		&& $this->registerHook('displayHeader')
		&& $this->registerHook('displaytptnhead')
		&& $this->registerHook('displaytptnbody'));
	}
	
	public function uninstall()
	{
		//Delete configuration			
		return (Configuration::deleteByName('Tconfig')
				&& Configuration::deleteByName('titlebkg')
				&& Configuration::deleteByName('catbkg')
				&& Configuration::deleteByName('brdclr')
                && Configuration::deleteByName('topbkg')
				&& Configuration::deleteByName('cartbkg')
				&& parent::uninstall() );
	}
	
	public function getContent()
	{
		$html = '';
		// If we try to update the settings
		if (Tools::isSubmit('submitModule'))
		{	
			Configuration::updateValue('Tconfig', Tools::getValue('t_config'));
			Configuration::updateValue('titlebkg', Tools::getValue('title_bkg'));
			Configuration::updateValue('catbkg', Tools::getValue('cat_bkg'));
			Configuration::updateValue('brdclr', Tools::getValue('brd_clr'));
            Configuration::updateValue('topbkg', Tools::getValue('top_bkg'));
			Configuration::updateValue('cartbkg', Tools::getValue('cart_bkg'));
            			
			$html .= $this->displayConfirmation($this->l('Configuration updated'));
		}

		$html .= $this->renderForm();

		return $html;
	}

	public function renderForm() {

		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'switch',
						'label' => $this->l('Show Theme configurator?'),
						'name' => 't_config',
						'values' => array(
									array(
										'id' => 'active_on',
										'value' => 1,
										'label' => $this->l('Enabled')
									),
									array(
										'id' => 'active_off',
										'value' => 0,
										'label' => $this->l('Disabled')
									)
								),
					),
					array(
						'type' => 'text',
						'label' => $this->l('Categories Title Background'),
						'name' => 'title_bkg',
						'maxlength' => "6",
						'class' => 'fixed-width-sm'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Categories Background'),
						'name' => 'cat_bkg',
						'maxlength' => "6",
						'class' => 'fixed-width-sm'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Categories Border Color'),
						'name' => 'brd_clr',
						'maxlength' => "6",
						'class' => 'fixed-width-sm'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Top Horizontal Bar'),
						'name' => 'top_bkg',
						'maxlength' => "6",
						'class' => 'fixed-width-sm'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Cart Background'),
						'name' => 'cart_bkg',
						'maxlength' => "6",
						'class' => 'fixed-width-sm'
					),
				),
				'submit' => array(
					'title' => $this->l('Save')
				)
			),
		);
		
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitModule';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
	}

	public function getConfigFieldsValues()
	{
		return array(
			't_config' => Tools::getValue('t_config', Configuration::get('Tconfig')),
			'title_bkg' => Tools::getValue('title_bkg', Configuration::get('titlebkg')),
			'cat_bkg' => Tools::getValue('cat_bkg', Configuration::get('catbkg')),
			'brd_clr' => Tools::getValue('brd_clr', Configuration::get('brdclr')),
			'top_bkg' => Tools::getValue('top_bkg', Configuration::get('topbkg')),
			'cart_bkg' => Tools::getValue('cart_bkg', Configuration::get('cartbkg'))
		);
	}
	
	public function ConfigHead()
	{				
		$tptntitlebkg = Configuration::get('titlebkg');
		$tptncatbkg = Configuration::get('catbkg');
		$tptnbrdclr = Configuration::get('brdclr');
		$tptntopbkg = Configuration::get('topbkg');
		$tptncartbkg = Configuration::get('cartbkg');
				
		$htmlhead = '';
		$htmlhead .= '<style type="text/css">
		#top-categ span,
		.blockresp-title{
			background-color: #'.$tptntitlebkg.';
		}
		#categories_block_left,
		.mobilemenu {
			background-color: #'.$tptncatbkg.';
			border: 1px solid #'.$tptnbrdclr.';
		}
		.tptn-vertical-mega-menu .menu > li,
		.mobilemenu a {
			border-bottom: 1px solid #'.$tptnbrdclr.';
		}
		#top-categ,
		#footer,
		#back-top {
			background-color: #'.$tptntopbkg.';
		}
		.shopping_cart {
			background-color: #'.$tptncartbkg.';
		}
        </style>
		
		<script type="text/javascript">
			var tptntitlebkg_default = "'.$tptntitlebkg.'",
				tptncatbkg_default = "'.$tptncatbkg.'",
				tptnbrdclr_default = "'.$tptnbrdclr.'",
                tptntopbkg_default = "'.$tptntopbkg.'",
				tptncartbkg_default = "'.$tptncartbkg.'"
		</script>';
		
		$cktitlebkg = isset($_COOKIE['cktitlebkg']) ? $_COOKIE['cktitlebkg'] : '';
		$ckcatbkg = isset($_COOKIE['ckcatbkg']) ? $_COOKIE['ckcatbkg'] : '';
		$ckbrdclr = isset($_COOKIE['ckbrdclr']) ? $_COOKIE['ckbrdclr'] : '';
		$cktopbkg = isset($_COOKIE['cktopbkg']) ? $_COOKIE['cktopbkg'] : '';
		$ckcartbkg = isset($_COOKIE['ckcartbkg']) ? $_COOKIE['ckcartbkg'] : '';
		
		if ( $cktitlebkg != '' || $ckcatbkg != '' || $ckbrdclr != '' || $cktopbkg != '' || $ckcartbkg != '' ) {
			$htmlhead .= '<style type="text/css">
				#top-categ span,
				.blockresp-title{
					background-color: #'.$cktitlebkg.';
				}
				#categories_block_left,
				.mobilemenu {
					background-color: #'.$ckcatbkg.';
					border: 1px solid #'.$ckbrdclr.';
				}
				.tptn-vertical-mega-menu .menu > li,
				.mobilemenu a {
					border-bottom: 1px solid #'.$ckbrdclr.';
				}
				#top-categ,
				#footer,
				#back-top {
					background-color: #'.$cktopbkg.';
				}
				.shopping_cart {
					background-color: #'.$ckcartbkg.';
				}
				</style>
				';
		}
		return $htmlhead;
	}
	
	public function ConfigBody()
	{
		$gettitlebkg = (isset($_COOKIE['cktitlebkg'])) ? $_COOKIE['cktitlebkg'] : (Configuration::get('titlebkg'));
		$getcatbkg = (isset($_COOKIE['ckcatbkg'])) ? $_COOKIE['ckcatbkg'] : (Configuration::get('catbkg'));
		$getbrdclr = (isset($_COOKIE['ckbrdclr'])) ? $_COOKIE['ckbrdclr'] : (Configuration::get('brdclr'));
		$gettopbkg = (isset($_COOKIE['cktopbkg'])) ? $_COOKIE['cktopbkg'] : (Configuration::get('topbkg'));
		$getcartbkg = (isset($_COOKIE['ckcartbkg'])) ? $_COOKIE['ckcartbkg'] : (Configuration::get('cartbkg'));
		
		$htmlbody = '';
		$htmlbody .='
			<div id="tptn-config">
				<a id="tptn-config-switch" class="config-open" href="#"></a>
				<div id="tptn-config-inner">
					<form method="post" action="" id="config_form">
						
						<div class="tptn-config-block">
							<div class="tptn-config-title floatL">Categories Title Background</div>
							<div id="titlebkg-input" class="tptn-config-colorpicker" style="background-color:#'.$gettitlebkg.'"></div>
						</div>
						
						<div class="tptn-config-block alternate">
							<div class="tptn-config-title floatL">Categories Background</div>
							<div id="catbkg-input" class="tptn-config-colorpicker" style="background-color:#'.$getcatbkg.'"></div>
						</div>
						
						<div class="tptn-config-block">
							<div class="tptn-config-title floatL">Categories Border Color</div>
							<div id="brdclr-input" class="tptn-config-colorpicker" style="background-color:#'.$getbrdclr.'"></div>
						</div>
						
                        <div class="tptn-config-block alternate">
							<div class="tptn-config-title floatL">Top Horizontal Bar</div>
							<div id="topbkg-input" class="tptn-config-colorpicker" style="background-color:#'.$gettopbkg.'"></div>
						</div>
						
						<div class="tptn-config-block">
							<div class="tptn-config-title floatL">Cart Background</div>
							<div id="cartbkg-input" class="tptn-config-colorpicker" style="background-color:#'.$getcartbkg.'"></div>
						</div>

                        <div class="tptn-config-block tptn-btn-block">
							<button type="submit" name="apply" class="apply">Apply</button>
							<button type="submit" name="reset" class="reset">Reset</button>
						</div>
					</form>
					
				</div>
			</div>';
		
			if ( isset($_REQUEST['apply']) ) {
				$cktitlebkg = (isset($_COOKIE['cktitlebkg'])) ? $_COOKIE['cktitlebkg'] : '';
				$ckcatbkg = (isset($_COOKIE['ckcatbkg'])) ? $_COOKIE['ckcatbkg'] : '';
				$ckbrdclr = (isset($_COOKIE['ckbrdclr'])) ? $_COOKIE['ckbrdclr'] : '';
				$cktopbkg = (isset($_COOKIE['cktopbkg'])) ? $_COOKIE['cktopbkg'] : '';
				$ckcartbkg = (isset($_COOKIE['ckcartbkg'])) ? $_COOKIE['ckcartbkg'] : '';
            } 
			elseif ( isset($_REQUEST['reset']) || !(isset($_REQUEST['reset'])) ) {
				$cktitlebkg = $ckcatbkg = $ckbrdclr = $cktopbkg = $ckcartbkg = '';
			} 

		return $htmlbody;
	}

	public function hookdisplaytptnhead($params)
	{
		return $this->ConfigHead();
	}
	
	public function hookdisplaytptnbody($params)
	{
		if(Configuration::get('Tconfig') == 0) return;
		return $this->ConfigBody();
	}
	
	public function hookDisplayHeader($params)
	{
		$this->context->controller->addCSS($this->_path.'css/configstyle.css');
		$this->context->controller->addJS($this->_path.'js/colorpicker.js');
		$this->context->controller->addJS($this->_path.'js/configjs.js');
	}
}
?>
