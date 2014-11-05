<?php

if (!defined('_PS_VERSION_'))
	exit;

class TptnHeaderLinks extends Module
{
	public function __construct()
	{
		$this->name = 'tptnheaderlinks';
		$this->tab = 'Blocks';
		$this->version = '1.0';
		$this->author = 'Templatin';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();
		
		$this->displayName = $this->l('Header Links - Templatin');
		$this->description = $this->l('Adds a block that displays cart, account, login and custom text in header.');
	}

	public function install()
	{
		return (parent::install()
				&& Configuration::updateValue('CALLPHONE', array($this->context->language->id => $this->l('Call now: 123 456 7890')))
				&& $this->registerHook('displayTop')
				&& $this->registerHook('displayNav')
				&& $this->registerHook('displayHeader') );
	}
	
	public function uninstall()
	{
		if (!parent::uninstall() || !Configuration::deleteByName('CALLPHONE'))
			return false;
		return true;
	}
	
	public function hookDisplayTop($params)
	{
		if (!$this->active)
			return;
		$this->smarty->assign('logged', $this->context->customer->isLogged() );		
		return $this->display(__FILE__, 'tptnheaderlinks.tpl');
	}

	public function hookDisplayNav($params)
	{
		if (!$this->active)
			return;
		$this->smarty->assign('phone', Configuration::get('CALLPHONE', $this->context->language->id));
		return $this->display(__FILE__, 'nav.tpl');
	}
	
	public function hookDisplayHeader($params)
	{
		$this->context->controller->addJqueryPlugin('cooki-plugin');
		$this->context->controller->addJqueryUI('ui.tooltip');
	}

	public function getContent()
	{
		$id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
		$languages = Language::getLanguages(false);
		$iso = $this->context->language->iso_code;

		$output = '';
		if (Tools::isSubmit('submitModule'))
		{
			$message_trads = array();
			foreach ($_POST as $key => $value)
				if (preg_match('/callphone_/i', $key))
				{
					$id_lang = preg_split('/callphone_/i', $key);
					$message_trads[(int)$id_lang[1]] = $value;
				}
			Configuration::updateValue('CALLPHONE', $message_trads, true);
			$this->_clearCache('tptnheaderlinks.tpl');
			$output .= $this->displayConfirmation($this->l('Configuration updated'));
		}		
		
		return $output.$this->renderForm();
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
						'label' => $this->l('Call now text'),
						'name' => 'callphone',
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
		$return = array();
		foreach (Language::getLanguages(false) as $lang)
			$return['callphone'][(int)$lang['id_lang']] = Tools::getValue('callphone'.(int)$lang['id_lang'], Configuration::get('CALLPHONE', (int)$lang['id_lang']));

		return $return;
	}
}
