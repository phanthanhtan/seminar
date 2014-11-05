<?php

if (!defined('_PS_VERSION_'))
	exit;

class TptnProdCarousel extends Module
{
	public function __construct()
	{
		$this->name = 'tptnprodcarousel';
		$this->tab = 'Blocks';
		$this->version = '1.0';
		$this->author = 'Templatin';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Products Carousel - Templatin');
		$this->description = $this->l('Displays carousel for Featured and specific category products on homepage.');
	}

	public function install()
	{
		if ( (parent::install() == false)
			|| (Configuration::updateValue('TPTNCRSL_PLAY', '1') == false)
			|| (Configuration::updateValue('TPTNCRSL_SPEED', '500') == false)
			|| (Configuration::updateValue('TPTNCRSL_TOTAL', '100') == false)
			|| (Configuration::updateValue('TPTNCRSL_FEATURED', '1') == false)
			|| (Configuration::updateValue('CATEG1', '3') == false)
			|| (Configuration::updateValue('CATEG2', '4') == false)
			|| (Configuration::updateValue('CATEG3', '5') == false)
			|| (Configuration::updateValue('CATEG4', '0') == false)
			|| (Configuration::updateValue('CATEG5', '0') == false)
			|| (Configuration::updateValue('CATEG6', '0') == false)
			|| (Configuration::updateValue('CATEG7', '0') == false)
			|| (Configuration::updateValue('CATEG8', '0') == false)
			|| (Configuration::updateValue('CATEG9', '0') == false)
			|| (Configuration::updateValue('CATEG10', '0') == false)
			|| ($this->registerHook('displayHeader') == false)
			|| ($this->registerHook('displayHome') == false) )
				return false;
		return true;
	}
	
	public function uninstall()
	{
		Configuration::deleteByName('TPTNCRSL_PLAY');
		Configuration::deleteByName('TPTNCRSL_SPEED');
		Configuration::deleteByName('TPTNCRSL_TOTAL');
		Configuration::deleteByName('TPTNCRSL_FEATURED');
		return parent::uninstall();
	}

	public function hookdisplayHeader($params)
	{
		$this->context->controller->addJS($this->_path.'js/tptncarousel.js');
	
		$carousel = array(
			'play' => Configuration::get('TPTNCRSL_PLAY') == '1' ? true : false,
			'speed' => Configuration::get('TPTNCRSL_SPEED')
		);

		$this->smarty->assign('tptnprodcarousel', $carousel);
		return $this->display(__FILE__, 'tptnprodcarousel_header.tpl', $this->getCacheId());
	}

	public function hookDisplayHome($params)
	{
		$total = (int)(Configuration::get('TPTNCRSL_TOTAL'));

		$category = new Category(Context::getContext()->shop->getCategory(), (int)Context::getContext()->language->id);
		$featuredProducts = $category->getProducts((int)Context::getContext()->language->id, 1, $total, "position");
		
		$categ1 = new Category((int)(Configuration::get('CATEG1')));
		$myprods1 = $categ1->getProducts($this->context->language->id, 1, $total);
		$catname1 = $categ1->getName($this->context->language->id);

		$categ2 = new Category((int)(Configuration::get('CATEG2')));
		$myprods2 = $categ2->getProducts($this->context->language->id, 1, $total);
		$catname2 = $categ2->getName($this->context->language->id);
		
		$categ3 = new Category((int)(Configuration::get('CATEG3')));
		$myprods3 = $categ3->getProducts($this->context->language->id, 1, $total);
		$catname3 = $categ3->getName($this->context->language->id);
		
		$categ4 = new Category((int)(Configuration::get('CATEG4')));
		$myprods4 = $categ4->getProducts($this->context->language->id, 1, $total);
		$catname4 = $categ4->getName($this->context->language->id);
		
		$categ5 = new Category((int)(Configuration::get('CATEG5')));
		$myprods5 = $categ5->getProducts($this->context->language->id, 1, $total);
		$catname5 = $categ5->getName($this->context->language->id);
		
		$categ6 = new Category((int)(Configuration::get('CATEG6')));
		$myprods6 = $categ6->getProducts($this->context->language->id, 1, $total);
		$catname6 = $categ6->getName($this->context->language->id);
		
		$categ7 = new Category((int)(Configuration::get('CATEG7')));
		$myprods7 = $categ7->getProducts($this->context->language->id, 1, $total);
		$catname7 = $categ7->getName($this->context->language->id);
		
		$categ8 = new Category((int)(Configuration::get('CATEG8')));
		$myprods8 = $categ8->getProducts($this->context->language->id, 1, $total);
		$catname8 = $categ8->getName($this->context->language->id);
		
		$categ9 = new Category((int)(Configuration::get('CATEG9')));
		$myprods9 = $categ9->getProducts($this->context->language->id, 1, $total);
		$catname9 = $categ9->getName($this->context->language->id);
		
		$categ10 = new Category((int)(Configuration::get('CATEG10')));
		$myprods10 = $categ10->getProducts($this->context->language->id, 1, $total);
		$catname10 = $categ10->getName($this->context->language->id);
		
		$this->smarty->assign(array(
			'categname1' => $catname1,
			'myprod1' => $myprods1,
			'categname2' => $catname2,
			'myprod2' => $myprods2,
			'categname3' => $catname3,
			'myprod3' => $myprods3,
			'categname4' => $catname4,
			'myprod4' => $myprods4,
			'categname5' => $catname5,
			'myprod5' => $myprods5,
			'categname6' => $catname6,
			'myprod6' => $myprods6,
			'categname7' => $catname7,
			'myprod7' => $myprods7,
			'categname8' => $catname8,
			'myprod8' => $myprods8,
			'categname9' => $catname9,
			'myprod9' => $myprods9,
			'categname10' => $catname10,
			'myprod10' => $myprods10,
			'featured_products' => $featuredProducts,
			'show_featured_prod' => (int)(Configuration::get('TPTNCRSL_FEATURED')),
			'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
			'self' => dirname(__FILE__)
		));
		
		return $this->display(__FILE__, 'tptnprodcarousel.tpl', $this->getCacheId());
	}

	public function getContent()
	{
		$html = '';

		if (Tools::isSubmit('submitModule'))
		{
			Configuration::updateValue('TPTNCRSL_PLAY', (int)(Tools::getValue('crsl_play')));
			Configuration::updateValue('TPTNCRSL_SPEED', (int)(Tools::getValue('crsl_speed')));
			Configuration::updateValue('TPTNCRSL_TOTAL', (int)(Tools::getValue('crsl_total')));
			Configuration::updateValue('TPTNCRSL_FEATURED', (int)(Tools::getValue('crsl_featured')));
			Configuration::updateValue('CATEG1', (int)(Tools::getValue('categ1')));
			Configuration::updateValue('CATEG2', (int)(Tools::getValue('categ2')));
			Configuration::updateValue('CATEG3', (int)(Tools::getValue('categ3')));
			Configuration::updateValue('CATEG4', (int)(Tools::getValue('categ4')));
			Configuration::updateValue('CATEG5', (int)(Tools::getValue('categ5')));
			Configuration::updateValue('CATEG6', (int)(Tools::getValue('categ6')));
			Configuration::updateValue('CATEG7', (int)(Tools::getValue('categ7')));
			Configuration::updateValue('CATEG8', (int)(Tools::getValue('categ8')));
			Configuration::updateValue('CATEG9', (int)(Tools::getValue('categ9')));
			Configuration::updateValue('CATEG10', (int)(Tools::getValue('categ10')));

			$html .= $this->displayConfirmation($this->l('Configuration updated'));
			$this->clearCache();
		}
		
		$html .= $this->renderForm();

		return $html;
	}

	public function clearCache()
	{
		$this->_clearCache('tptnprodcarousel_header.tpl', $this->getCacheId());
		$this->_clearCache('tptnprodcarousel.tpl', $this->getCacheId());
	}

	public function renderForm()
	{
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'switch',
						'label' => $this->l('Auto-play carousel'),
						'name' => 'crsl_play',
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
						'label' => $this->l('Carousel speed'),
						'name' => 'crsl_speed',
						'suffix' => 'ms'						
					),
					array(
						'type' => 'text',
						'label' => $this->l('Total products to show'),
						'name' => 'crsl_total',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'switch',
						'label' => $this->l('Show Featured Products'),
						'name' => 'crsl_featured',
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
						'label' => $this->l('Block-1 Category ID'),
						'name' => 'categ1',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-2 Category ID'),
						'name' => 'categ2',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-3 Category ID'),
						'name' => 'categ3',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-4 Category ID'),
						'name' => 'categ4',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-5 Category ID'),
						'name' => 'categ5',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-6 Category ID'),
						'name' => 'categ6',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-7 Category ID'),
						'name' => 'categ7',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-8 Category ID'),
						'name' => 'categ8',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-9 Category ID'),
						'name' => 'categ9',
						'class' => 'fixed-width-xs'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Block-10 Category ID'),
						'name' => 'categ10',
						'desc' => 'For disabling any of the blocks, give 0 as its Category ID.',
						'class' => 'fixed-width-xs'
					),
				),
				'submit' => array(
					'title' => $this->l('Save')				
				),
			)
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
			'crsl_play'		=> Tools::getValue('crsl_play', Configuration::get('TPTNCRSL_PLAY')),
			'crsl_speed'	=> Tools::getValue('crsl_speed', Configuration::get('TPTNCRSL_SPEED')),
			'crsl_total'	=> Tools::getValue('crsl_total', Configuration::get('TPTNCRSL_TOTAL')),
			'crsl_featured'	=> Tools::getValue('crsl_featured', Configuration::get('TPTNCRSL_FEATURED')),
			'categ1'		=> Tools::getValue('categ1', Configuration::get('CATEG1')),
			'categ2'		=> Tools::getValue('categ2', Configuration::get('CATEG2')),
			'categ3'		=> Tools::getValue('categ3', Configuration::get('CATEG3')),
			'categ4'		=> Tools::getValue('categ4', Configuration::get('CATEG4')),
			'categ5'		=> Tools::getValue('categ5', Configuration::get('CATEG5')),
			'categ6'		=> Tools::getValue('categ6', Configuration::get('CATEG6')),
			'categ7'		=> Tools::getValue('categ7', Configuration::get('CATEG7')),
			'categ8'		=> Tools::getValue('categ8', Configuration::get('CATEG8')),
			'categ9'		=> Tools::getValue('categ9', Configuration::get('CATEG9')),
			'categ10'		=> Tools::getValue('categ10', Configuration::get('CATEG10'))
		);
	}

}
