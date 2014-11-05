<?php

if (!defined('_PS_VERSION_'))
	exit;
	
class TptnSocial extends Module
{
	public function __construct()
	{
		$this->name = 'tptnsocial';
		$this->tab = 'Blocks';
		$this->version = '1.0';
		$this->author = 'Templatin';

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Social block - Templatin');
		$this->description = $this->l('Adds Facebook and Twitter blocks to right of your window.');
	}
	
	public function install()
	{
		return (parent::install()
				&& Configuration::updateValue('FACEBOOK', 'http://www.facebook.com/templatin')
				&& Configuration::updateValue('TWITTER_USER', 'templatin')
				&& Configuration::updateValue('TWITTER_ID', '373424014783299585')
				&& $this->registerHook('displaytptnbody') );
	}
	
	public function uninstall()
	{
		return (Configuration::deleteByName('FACEBOOK')
				&& Configuration::deleteByName('TWITTER_USER')
				&& Configuration::deleteByName('TWITTER_ID')
				&& parent::uninstall() );
	}
	
	public function hookdisplaytptnbody($params)
	{
		if (!$this->isCached('tptnsocial.tpl', $this->getCacheId()))
			$this->smarty->assign(array(
				'fb_url' => Configuration::get('FACEBOOK'),
				'tw_user' => Configuration::get('TWITTER_USER'),
				'tw_id' => Configuration::get('TWITTER_ID'),
				'iso_code' =>  $this->context->language->iso_code
			));
		return $this->display(__FILE__, 'tptnsocial.tpl', $this->getCacheId());
	}

	public function getContent()
	{
		$html = '';

		if (Tools::isSubmit('submitModule'))
		{
			Configuration::updateValue('FACEBOOK', Tools::getValue('facebook'));
			Configuration::updateValue('TWITTER_USER', Tools::getValue('twitter_user'));
			Configuration::updateValue('TWITTER_ID', Tools::getValue('twitter_id'));
			
			$html .= $this->displayConfirmation($this->l('Configuration updated'));
			$this->_clearCache('tptnsocial.tpl');						
		}
		
		$html .= $this->renderForm();

		return $html;
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
						'label' => $this->l('Facebook URL'),
						'name' => 'facebook',
						'desc' => $this->l('Keep this field empty to disable Facebook block.'),
					),
					array(
						'type' => 'text',
						'label' => $this->l('Twitter username'),
						'name' => 'twitter_user',
						'desc' => $this->l('Keep this field empty to disable Twitter block.'),
					),
					array(
						'type' => 'text',
						'label' => $this->l('Twitter Widget ID'),
						'name' => 'twitter_id'
					)					
				),
				'submit' => array(
					'title' => $this->l('Save'),
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
			'facebook'	=> Tools::getValue('facebook', Configuration::get('FACEBOOK')),
			'twitter_user'	=> Tools::getValue('twitter_user', Configuration::get('TWITTER_USER')),
			'twitter_id'	=> Tools::getValue('twitter_id', Configuration::get('TWITTER_ID'))
		);
	}	
}
?>
