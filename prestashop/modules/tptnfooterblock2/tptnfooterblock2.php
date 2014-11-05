<?php

if (!defined('_PS_VERSION_'))
	exit;

class TptnFooterBlock2 extends Module
{
	public function __construct()
	{
		$this->name = 'tptnfooterblock2';
		$this->tab = 'Blocks';
		$this->version = '1.0';
		$this->author = 'Templatin';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();	

		$this->displayName = $this->l('Footer block 2 - Templatin');
		$this->description = $this->l('Adds a custom block in footer.');
	}

	public function install()
	{
		return 
			parent::install() && 
			$this->registerHook('displayFooter') &&
			$this->installFixtures();
	}
	
	protected function installFixtures()
	{
		$languages = Language::getLanguages(false);
		foreach ($languages as $lang)
			$this->installFixture((int)$lang['id_lang']);

		return true;
	}
	
	protected function installFixture($id_lang)
	{
		$values['tfb2title'][(int)$id_lang] = 'Custom block';
		$values['tfb2link1'][(int)$id_lang] = 'Dummy text';
		$values['tfb2url1'][(int)$id_lang] = 'http://www.templatin.com';
		Configuration::updateValue('TFB2TITLE', $values['tfb2title']);
		Configuration::updateValue('TFB2LINK1', $values['tfb2link1']);
		Configuration::updateValue('TFB2URL1', $values['tfb2url1']);
	}

	public function uninstall()
	{
		Configuration::deleteByName('TFB2TITLE');
		Configuration::deleteByName('TFB2LINK1');
		Configuration::deleteByName('TFB2URL1');
		Configuration::deleteByName('TFB2LINK2');
		Configuration::deleteByName('TFB2URL2');
		Configuration::deleteByName('TFB2LINK3');
		Configuration::deleteByName('TFB2URL3');
		Configuration::deleteByName('TFB2LINK4');
		Configuration::deleteByName('TFB2URL4');
		Configuration::deleteByName('TFB2LINK5');
		Configuration::deleteByName('TFB2URL5');
		Configuration::deleteByName('TFB2LINK6');
		Configuration::deleteByName('TFB2URL6');
		return parent::uninstall();
	}

	public function hookDisplayFooter($params)
	{
		if (!$this->isCached('tptnfooterblock2.tpl', $this->getCacheId()))
		{
			$this->smarty->assign(array(
				'tfb2title' => Configuration::get('TFB2TITLE', $this->context->language->id),
				'tfb2link1' => Configuration::get('TFB2LINK1', $this->context->language->id),
				'tfb2url1' => Configuration::get('TFB2URL1', $this->context->language->id),
				'tfb2link2' => Configuration::get('TFB2LINK2', $this->context->language->id),
				'tfb2url2' => Configuration::get('TFB2URL2', $this->context->language->id),
				'tfb2link3' => Configuration::get('TFB2LINK3', $this->context->language->id),
				'tfb2url3' => Configuration::get('TFB2URL3', $this->context->language->id),
				'tfb2link4' => Configuration::get('TFB2LINK4', $this->context->language->id),
				'tfb2url4' => Configuration::get('TFB2URL4', $this->context->language->id),
				'tfb2link5' => Configuration::get('TFB2LINK5', $this->context->language->id),
				'tfb2url5' => Configuration::get('TFB2URL5', $this->context->language->id),
				'tfb2link6' => Configuration::get('TFB2LINK6', $this->context->language->id),
				'tfb2url6' => Configuration::get('TFB2URL6', $this->context->language->id)
			));
		}

		return $this->display(__FILE__, 'tptnfooterblock2.tpl', $this->getCacheId());
	}

	public function postProcess()
	{
		if (Tools::isSubmit('submitModule'))
		{
			$languages = Language::getLanguages(false);
			$values = array();
			
			foreach ($languages as $lang)
			{
				$values['tfb2title'][$lang['id_lang']] = Tools::getValue('tfb2title_'.$lang['id_lang']);
				$values['tfb2link1'][$lang['id_lang']] = Tools::getValue('tfb2link1_'.$lang['id_lang']);
				$values['tfb2url1'][$lang['id_lang']] = Tools::getValue('tfb2url1_'.$lang['id_lang']);
				$values['tfb2link2'][$lang['id_lang']] = Tools::getValue('tfb2link2_'.$lang['id_lang']);
				$values['tfb2url2'][$lang['id_lang']] = Tools::getValue('tfb2url2_'.$lang['id_lang']);
				$values['tfb2link3'][$lang['id_lang']] = Tools::getValue('tfb2link3_'.$lang['id_lang']);
				$values['tfb2url3'][$lang['id_lang']] = Tools::getValue('tfb2url3_'.$lang['id_lang']);
				$values['tfb2link4'][$lang['id_lang']] = Tools::getValue('tfb2link4_'.$lang['id_lang']);
				$values['tfb2url4'][$lang['id_lang']] = Tools::getValue('tfb2url4_'.$lang['id_lang']);
				$values['tfb2link5'][$lang['id_lang']] = Tools::getValue('tfb2link5_'.$lang['id_lang']);
				$values['tfb2url5'][$lang['id_lang']] = Tools::getValue('tfb2url5_'.$lang['id_lang']);
				$values['tfb2link6'][$lang['id_lang']] = Tools::getValue('tfb2link6_'.$lang['id_lang']);
				$values['tfb2url6'][$lang['id_lang']] = Tools::getValue('tfb2url6_'.$lang['id_lang']);
			}

			Configuration::updateValue('TFB2TITLE', $values['tfb2title']);
			Configuration::updateValue('TFB2LINK1', $values['tfb2link1']);
			Configuration::updateValue('TFB2URL1', $values['tfb2url1']);
			Configuration::updateValue('TFB2LINK2', $values['tfb2link2']);
			Configuration::updateValue('TFB2URL2', $values['tfb2url2']);
			Configuration::updateValue('TFB2LINK3', $values['tfb2link3']);
			Configuration::updateValue('TFB2URL3', $values['tfb2url3']);
			Configuration::updateValue('TFB2LINK4', $values['tfb2link4']);
			Configuration::updateValue('TFB2URL4', $values['tfb2url4']);
			Configuration::updateValue('TFB2LINK5', $values['tfb2link5']);
			Configuration::updateValue('TFB2URL5', $values['tfb2url5']);
			Configuration::updateValue('TFB2LINK6', $values['tfb2link6']);
			Configuration::updateValue('TFB2URL6', $values['tfb2url6']);

			$this->_clearCache('tptnfooterblock2.tpl');
			return $this->displayConfirmation($this->l('The settings have been updated.'));
		}
		return '';
	}

	public function getContent()
	{
		return $this->postProcess().$this->renderForm();
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
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Block Title'),
						'name' => 'tfb2title'
					),			
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Link 1'),
						'name' => 'tfb2link1',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('URL 1'),
						'name' => 'tfb2url1',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Link 2'),
						'name' => 'tfb2link2',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('URL 2'),
						'name' => 'tfb2url2',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Link 3'),
						'name' => 'tfb2link3',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('URL 3'),
						'name' => 'tfb2url3',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Link 4'),
						'name' => 'tfb2link4',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('URL 4'),
						'name' => 'tfb2url4',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Link 5'),
						'name' => 'tfb2link5',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('URL 5'),
						'name' => 'tfb2url5',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('Link 6'),
						'name' => 'tfb2link6',
					),
					array(
						'type' => 'text',
						'lang' => true,
						'label' => $this->l('URL 6'),
						'name' => 'tfb2url6',
					)
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
		$helper->module = $this;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitModule';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'uri' => $this->getPathUri(),
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
	}
	
	public function getConfigFieldsValues()
	{
		$languages = Language::getLanguages(false);
		$fields = array();

		foreach ($languages as $lang)
		{
			$fields['tfb2title'][$lang['id_lang']] = Tools::getValue('tfb2title_'.$lang['id_lang'], Configuration::get('TFB2TITLE', $lang['id_lang']));
			$fields['tfb2link1'][$lang['id_lang']] = Tools::getValue('tfb2link1_'.$lang['id_lang'], Configuration::get('TFB2LINK1', $lang['id_lang']));
			$fields['tfb2url1'][$lang['id_lang']] = Tools::getValue('tfb2url1_'.$lang['id_lang'], Configuration::get('TFB2URL1', $lang['id_lang']));
			$fields['tfb2link2'][$lang['id_lang']] = Tools::getValue('tfb2link2_'.$lang['id_lang'], Configuration::get('TFB2LINK2', $lang['id_lang']));
			$fields['tfb2url2'][$lang['id_lang']] = Tools::getValue('tfb2url2_'.$lang['id_lang'], Configuration::get('TFB2URL2', $lang['id_lang']));
			$fields['tfb2link3'][$lang['id_lang']] = Tools::getValue('tfb2link3_'.$lang['id_lang'], Configuration::get('TFB2LINK3', $lang['id_lang']));
			$fields['tfb2url3'][$lang['id_lang']] = Tools::getValue('tfb2url3_'.$lang['id_lang'], Configuration::get('TFB2URL3', $lang['id_lang']));
			$fields['tfb2link4'][$lang['id_lang']] = Tools::getValue('tfb2link4_'.$lang['id_lang'], Configuration::get('TFB2LINK4', $lang['id_lang']));
			$fields['tfb2url4'][$lang['id_lang']] = Tools::getValue('tfb2url4_'.$lang['id_lang'], Configuration::get('TFB2URL4', $lang['id_lang']));
			$fields['tfb2link5'][$lang['id_lang']] = Tools::getValue('tfb2link5_'.$lang['id_lang'], Configuration::get('TFB2LINK5', $lang['id_lang']));
			$fields['tfb2url5'][$lang['id_lang']] = Tools::getValue('tfb2url5_'.$lang['id_lang'], Configuration::get('TFB2URL5', $lang['id_lang']));
			$fields['tfb2link6'][$lang['id_lang']] = Tools::getValue('tfb2link6_'.$lang['id_lang'], Configuration::get('TFB2LINK6', $lang['id_lang']));
			$fields['tfb2url6'][$lang['id_lang']] = Tools::getValue('tfb2url6_'.$lang['id_lang'], Configuration::get('TFB2URL6', $lang['id_lang']));
		}

		return $fields;
	}
}
