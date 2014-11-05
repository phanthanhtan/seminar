<?php

class blocktranslatethis extends Module {
	
	public function __construct() {
		$this->name = 'blocktranslatethis';
		$this->tab = version_compare(_PS_VERSION_, '1.4.0.0', '>=')?'i18n_localization':'Mediacom87';
		$this->version = '1.0';
		$this->need_instance = 0;
		$this->author = 'Mediacom87';
		parent::__construct();
		$this->displayName = $this->l('Block Translate This');
		$this->description = $this->l('Integrate Translate This script on your site.');
	}
	
	function install()
	{
		if (!parent::install()
			OR !$this->registerHook('footer')
			OR !$this->registerHook('top')
		)
			return false;
		return true;
	}
	
	function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}

	public function getContent()
	{
		$output = '<h2><img src="'.$this->_path.'logo.gif" alt="" /> '.$this->displayName.'</h2>';
		return $output.$this->displayForm();
	}

	public function displayForm()
	{
		global $cookie;
		
		$iso = Language::getIsoById((int)$cookie->id_lang);
		return '		
		<fieldset class="space">
				<legend><a href="https://www.paypal.com/fr/mrb/pal=LG5H4P9K8K6FC" target="_blank"><img src="'.$this->_path.'img/paypal-icon-16x16.png" alt="" /></a>'.$this->l('Donation').'</legend>
				<p><a href="http://www.prestatoolbox.'.(($iso != 'fr')?'com':'fr').'/?utm_source=module&utm_medium=cpc&utm_campaign='.$this->name.'" target="_blank" title="'.$this->l('Mediacom87 WebAgency').'">'.$this->l('This module was developed and generously offered to the PrestaShop\'s community by Mediacom87 WebAgency specializing in supporting eCommerce.').'</a></p>
				<p><a href="http://www.prestatoolbox.'.(($iso != 'fr')?'com':'fr').'/?utm_source=module&utm_medium=cpc&utm_campaign='.$this->name.'" target="_blank" title="'.$this->l('Mediacom87 WebAgency').'">'.$this->l('If you want to support the Mediacom87\'s process, you can do so by making a donation.').'</a></p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="text-align:center">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="SXXGGPUMDSDCW">
				<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
				<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
				</form>
				<p>'.$this->l('This module can be hook to : Top, Left column or Right column').'.</p>
		</fieldset>
		
		<fieldset class="space">
				<legend><img src="'.$this->_path.'img/google-icon-16x16.png" alt="" height="16" width="16" /> '.$this->l('Ads').'</legend>
				<p><a href="http://www.prestatoolbox.'.(($iso != 'fr')?'com':'fr').'/?utm_source=module&utm_medium=cpc&utm_campaign='.$this->name.'" target="_blank" title="'.$this->l('Mediacom87 WebAgency').'">'.$this->l('You can also support our agency by clicking the advertising below').'.</a></p>
				<p style="text-align:center"><script type="text/javascript"><!--
				google_ad_client = "ca-pub-1663608442612102";
				/* Zopim 728x90 */
				google_ad_slot = "5753334670";
				google_ad_width = 728;
				google_ad_height = 90;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script></p>
		</fieldset>
		';
	}
	function hookTop($params)
	{
		return '<div id="translate-this"><a style="width:180px;height:18px;display:block;" class="translate-this-button" href="http://www.translatecompany.com/">Translate Company</a></div>';
	}

	function hookFooter($params)
	{
		return '
<!-- Begin TranslateThis Button -->
<script type="text/javascript" src="http://x.translateth.is/translate-this.js"></script>
<script type="text/javascript">TranslateThis();</script>
<!-- End TranslateThis Button -->
';
	}
	
	function hookRightColumn($params)
	{
		return $this->hookTop($params);
	}
	
	function hookLeftColumn($params)
	{
		return $this->hookTop($params);
	}
}

?>
