<?php

if (!defined('_PS_VERSION_'))
	exit;

class TptnCategories extends Module
{
	public function __construct()
	{
		$this->name = 'tptncategories';
		$this->tab = 'Blocks';
		$this->version = '1.0';
		$this->author = 'Templatin';

		$this->bootstrap = true;
		parent::__construct();	

		$this->displayName = $this->l('Categories block - Templatin');
		$this->description = $this->l('Adds vertical megamenu for categories in left-column.');
	}

	public function install()
	{
		if (!parent::install() ||
			!$this->registerHook('header') ||
			// Temporary hooks. Do NOT hook any module on it. Some CRUD hook will replace them as soon as possible.
			!$this->registerHook('categoryAddition') ||
			!$this->registerHook('categoryUpdate') ||
			!$this->registerHook('categoryDeletion') ||
			!$this->registerHook('actionAdminMetaControllerUpdate_optionsBefore') ||
			!$this->registerHook('actionAdminLanguagesControllerStatusBefore') )
			return false;

		// Hook the module on the left column
		$theme = new Theme(Context::getContext()->shop->id_theme);
		if ((!$theme->default_left_column || !$this->registerHook('leftColumn')))
		{
			// If there are no colums implemented by the template, throw an error and uninstall the module
			$this->_errors[] = $this->l('This module need to be hooked in a column and your theme does not implement one');
			parent::uninstall();
			return false;
		}
		return true;
	}

	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	public function getContent()
	{
		$output = '';
		if (Tools::isSubmit('submitTptnCategories'))
		{
			$maxDepth = 0;

			Configuration::updateValue('TPTNCATEG_SORT_WAY', Tools::getValue('TPTNCATEG_SORT_WAY'));
			Configuration::updateValue('TPTNCATEG_SORT', Tools::getValue('TPTNCATEG_SORT'));

			$this->_clearTptnCategoriesCache();
			$output .= $this->displayConfirmation($this->l('Settings updated'));

		}
		return $output.$this->renderForm();
	}

	public function getTree($resultParents, $resultIds, $maxDepth, $id_category = null, $currentDepth = 0)
	{
		if (is_null($id_category))
			$id_category = $this->context->shop->getCategory();

		$children = array();
		if (isset($resultParents[$id_category]) && count($resultParents[$id_category]) && ($maxDepth == 0 || $currentDepth < $maxDepth))
			foreach ($resultParents[$id_category] as $subcat)
				$children[] = $this->getTree($resultParents, $resultIds, $maxDepth, $subcat['id_category'], $currentDepth + 1);

		if (!isset($resultIds[$id_category]))
			return false;
		
		$return = array(
			'id' => $id_category,
			'link' => $this->context->link->getCategoryLink($id_category, $resultIds[$id_category]['link_rewrite']),
			'name' =>  $resultIds[$id_category]['name'],
			'desc'=>  $resultIds[$id_category]['description'],
			'children' => $children
		);

		return $return;
	}

	public function hookHeader()
	{
		$this->context->controller->addJS(($this->_path).'js/tptncategories.js');
	}

	public function hookLeftColumn($params)
	{
		$cacheId = $this->getCacheId($category ? $category->id : null);

		if (!$this->isCached('tptncategories.tpl', $cacheId))
		{
			$range = '';
			$maxdepth = 0;
			if ($category)
			{
				if ($maxdepth > 0)
					$maxdepth += $category->level_depth;
				$range = 'AND nleft >= '.$category->nleft.' AND nright <= '.$category->nright;
			}

			$resultIds = array();
			$resultParents = array();
			$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.id_parent, c.id_category, cl.name, cl.description, cl.link_rewrite
			FROM `'._DB_PREFIX_.'category` c
			INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category` AND cl.`id_lang` = '.(int)$this->context->language->id.Shop::addSqlRestrictionOnLang('cl').')
			INNER JOIN `'._DB_PREFIX_.'category_shop` cs ON (cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.(int)$this->context->shop->id.')
			WHERE (c.`active` = 1 OR c.`id_category` = '.(int)Configuration::get('PS_HOME_CATEGORY').')
			AND c.`id_category` != '.(int)Configuration::get('PS_ROOT_CATEGORY').'
			'.((int)$maxdepth != 0 ? ' AND `level_depth` <= '.(int)$maxdepth : '').'
			'.$range.'
			AND c.id_category IN (
				SELECT id_category
				FROM `'._DB_PREFIX_.'category_group`
				WHERE `id_group` IN ('.pSQL(implode(', ', Customer::getGroupsStatic((int)$this->context->customer->id))).')
			)
			ORDER BY `level_depth` ASC, '.(Configuration::get('TPTNCATEG_SORT') ? 'cl.`name`' : 'cs.`position`').' '.(Configuration::get('TPTNCATEG_SORT_WAY') ? 'DESC' : 'ASC'));
			foreach ($result as &$row)
			{
				$resultParents[$row['id_parent']][] = &$row;
				$resultIds[$row['id_category']] = &$row;
			}

			$blockCategTree = $this->getTree($resultParents, $resultIds, $maxdepth, ($category ? $category->id : null));
			$this->smarty->assign('blockCategTree', $blockCategTree);

			if ($category)
				$this->smarty->assign(array('currentCategory' => $category, 'currentCategoryId' => $category->id));

			$this->smarty->assign('tree_tpl_path', _PS_MODULE_DIR_.'tptncategories/tptncategories-tree.tpl');
		}
		return $this->display(__FILE__, 'tptncategories.tpl', $cacheId);
	}

	protected function getCacheId($name = null)
	{
		$cache_id = parent::getCacheId();

		if ($name !== null)
			$cache_id .= '|'.$name;

		return $cache_id.'|'.implode('-', Customer::getGroupsStatic($this->context->customer->id));
	}

	private function _clearTptnCategoriesCache()
	{
		$this->_clearCache('tptncategories.tpl');
	}

	public function hookCategoryAddition($params)
	{
		$this->_clearTptnCategoriesCache();
	}

	public function hookCategoryUpdate($params)
	{
		$this->_clearTptnCategoriesCache();
	}

	public function hookCategoryDeletion($params)
	{
		$this->_clearTptnCategoriesCache();
	}

	public function hookActionAdminMetaControllerUpdate_optionsBefore($params)
	{
		$this->_clearTptnCategoriesCache();
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
						'type' => 'radio',
						'label' => $this->l('Sort'),
						'name' => 'TPTNCATEG_SORT',
						'values' => array(
							array(
								'id' => 'name',
								'value' => 1,
								'label' => $this->l('By name')
							),
							array(
								'id' => 'position',
								'value' => 0,
								'label' => $this->l('By position')
							),
						)
					),
					array(
						'type' => 'radio',
						'label' => $this->l('Sort order'),
						'name' => 'TPTNCATEG_SORT_WAY',
						'values' => array(
							array(
								'id' => 'name',
								'value' => 1,
								'label' => $this->l('Descending')
							),
							array(
								'id' => 'position',
								'value' => 0,
								'label' => $this->l('Ascending')
							),
						)
					),
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
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitTptnCategories';
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
			'TPTNCATEG_SORT_WAY' => Tools::getValue('TPTNCATEG_SORT_WAY', Configuration::get('TPTNCATEG_SORT_WAY')),
			'TPTNCATEG_SORT' => Tools::getValue('TPTNCATEG_SORT', Configuration::get('TPTNCATEG_SORT')),
		);
	}
}
