<?php

if (!defined('_PS_VERSION_'))
	exit;
	
class TptnContact extends Module
{
	public function __construct()
	{
		$this->name = 'tptncontact';
		$this->tab = 'Blocks';
		$this->version = '1.0';
		$this->author = 'Templatin';

		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('Contact block - Templatin');
		$this->description = $this->l('Adds a block to add information about contacting the shop.');
	}
	
	public function install()
	{
		return (parent::install()
				&& Configuration::updateValue('ADDRESS1', '123, Riverdale Tower,')
				&& Configuration::updateValue('ADDRESS2', 'North Block, ABC Road,')
				&& Configuration::updateValue('ADDRESS3', 'YourCity YC7890.')
				&& Configuration::updateValue('PHONE', '1800-123-4567')
				&& Configuration::updateValue('EMAIL', 'name@domain.com')
				&& Configuration::updateValue('FACEBOOK', 'http://www.facebook.com/templatin')
				&& Configuration::updateValue('TWITTER', 'http://www.twitter.com/templatin')
				&& Configuration::updateValue('PINTEREST', '#')
				&& Configuration::updateValue('GOOGLE', '#')
				&& Configuration::updateValue('LINKEDIN', '#')
				&& Configuration::updateValue('YOUTUBE', '#')
				&& $this->registerHook('displayFooter') );
	}
	
	public function uninstall()
	{
		return (Configuration::deleteByName('ADDRESS1') && Configuration::deleteByName('ADDRESS2') && Configuration::deleteByName('ADDRESS3')
				&& Configuration::deleteByName('PHONE') && Configuration::deleteByName('EMAIL') && Configuration::deleteByName('FACEBOOK')
				&& Configuration::deleteByName('TWITTER') && Configuration::deleteByName('PINTEREST') && Configuration::deleteByName('GOOGLE')
				&& Configuration::deleteByName('LINKEDIN') && Configuration::deleteByName('YOUTUBE')
				&& parent::uninstall() );
	}
	
	public function hookDisplayFooter($params)
	{
		if (!$this->isCached('tptncontact.tpl', $this->getCacheId()))
			$this->smarty->assign(array(
				'tptnaddress1' => Configuration::get('ADDRESS1'),
				'tptnaddress2' => Configuration::get('ADDRESS2'),
				'tptnaddress3' => Configuration::get('ADDRESS3'),
				'tptnphone' => Configuration::get('PHONE'),
				'tptnemail' => Configuration::get('EMAIL'),
				'tptnfacebook' => Configuration::get('FACEBOOK'),
				'tptntwitter' => Configuration::get('TWITTER'),
				'tptnpinterest' => Configuration::get('PINTEREST'),
				'tptngoogle' => Configuration::get('GOOGLE'),
				'tptnlinkedin' => Configuration::get('LINKEDIN'),
				'tptnyoutube' => Configuration::get('YOUTUBE')
			));
		return $this->display(__FILE__, 'tptncontact.tpl', $this->getCacheId());
	}

	public function getContent()
	{
		$html = '';

		if (isset($_POST['submitModule']))
		{
			Configuration::updateValue('ADDRESS1', Tools::getValue('address1'));
			Configuration::updateValue('ADDRESS2', Tools::getValue('address2'));
			Configuration::updateValue('ADDRESS3', Tools::getValue('address3'));
			Configuration::updateValue('PHONE', Tools::getValue('phone'));
			Configuration::updateValue('EMAIL', Tools::getValue('email'));
			Configuration::updateValue('FACEBOOK', Tools::getValue('facebook'));
			Configuration::updateValue('TWITTER', Tools::getValue('twitter'));
			Configuration::updateValue('PINTEREST', Tools::getValue('pinterest'));
			Configuration::updateValue('GOOGLE', Tools::getValue('google'));
			Configuration::updateValue('LINKEDIN', Tools::getValue('linkedin'));
			Configuration::updateValue('YOUTUBE', Tools::getValue('youtube'));
			
			$html .= $this->displayConfirmation($this->l('Configuration updated'));
			$this->_clearCache('tptncontact.tpl');						
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
						'label' => $this->l('Address line-1'),
						'name' => 'address1'						
					),
					array(
						'type' => 'text',
						'label' => $this->l('Address line-2'),
						'name' => 'address2'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Address line-3'),
						'name' => 'address3'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Phone number'),
						'name' => 'phone'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Email'),
						'name' => 'email'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Facebook URL'),
						'name' => 'facebook'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Twitter URL'),
						'name' => 'twitter'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Pinterest URL'),
						'name' => 'pinterest'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Google+ URL'),
						'name' => 'google'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Linkedin URL'),
						'name' => 'linkedin'
					),
					array(
						'type' => 'text',
						'label' => $this->l('Youtube URL'),
						'name' => 'youtube'
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
			'address1'	=> Tools::getValue('address1', Configuration::get('ADDRESS1')),
			'address2'	=> Tools::getValue('address2', Configuration::get('ADDRESS2')),
			'address3'	=> Tools::getValue('address3', Configuration::get('ADDRESS3')),
			'phone' 	=> Tools::getValue('phone', Configuration::get('PHONE')),
			'email'		=> Tools::getValue('email', Configuration::get('EMAIL')),
			'facebook'	=> Tools::getValue('facebook', Configuration::get('FACEBOOK')),
			'twitter'	=> Tools::getValue('twitter', Configuration::get('TWITTER')),
			'pinterest'	=> Tools::getValue('pinterest', Configuration::get('PINTEREST')),
			'google'	=> Tools::getValue('google', Configuration::get('GOOGLE')),
			'linkedin'	=> Tools::getValue('linkedin', Configuration::get('LINKEDIN')),
			'youtube'	=> Tools::getValue('youtube', Configuration::get('YOUTUBE'))
		);
	}
	
}
?>
