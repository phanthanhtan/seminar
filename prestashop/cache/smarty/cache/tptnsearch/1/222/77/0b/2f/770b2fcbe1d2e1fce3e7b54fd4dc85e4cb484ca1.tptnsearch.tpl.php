<?php /*%%SmartyHeaderCode:1089333136545886d87e43c8-48055369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '770b2fcbe1d2e1fce3e7b54fd4dc85e4cb484ca1' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnsearch/tptnsearch.tpl',
      1 => 1413175460,
      2 => 'file',
    ),
    '1efb4f4c914d379e067386f051dfe99049e2b2fb' => 
    array (
      0 => '/var/zpanel/hostdata/zadmin/public_html/smartinvest_sytes_net/prestashop/modules/tptnsearch/tptnsearch-instantsearch.tpl',
      1 => 1413174024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1089333136545886d87e43c8-48055369',
  'variables' => 
  array (
    'link' => 0,
    'ENT_QUOTES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_545886d88e3c41_21310418',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545886d88e3c41_21310418')) {function content_545886d88e3c41_21310418($_smarty_tpl) {?><div id="tptnsearch"><form method="get" action="http://smartinvest.sytes.net/prestashop/search" id="searchbox"> <label for="search_query_top"></label> <input type="hidden" name="controller" value="search" /> <input type="hidden" name="orderby" value="position" /> <input type="hidden" name="orderway" value="desc" /> <input class="search_query" type="text" id="search_query_top" name="search_query" value="Search" onfocus="javascript:if(this.value=='Search')this.value='';" onblur="javascript:if(this.value=='')this.value='Search';" /> <button type="submit" name="submit_search" class="button-search"></button></form></div><script type="text/javascript">/* <![CDATA[ */var moduleDir="/prestashop/modules/tptnsearch/";$('document').ready(function(){$("#search_query_top").autocomplete(moduleDir+"tptnsearch_ajax.php",{minChars:3,max:10,width:300,selectFirst:false,scroll:false,dataType:"json",formatItem:function(data,i,max,value,term){return value;},parse:function(data){var mytab=new Array();for(var i=0;i<data.length;i++){if(data[i].pname.length>35){var pname=jQuery.trim(data[i].pname).substring(0,35).split(" ").slice(0,-1).join(" ")+"...";}else{var pname=data[i].pname;}
mytab[mytab.length]={data:data[i],value:'<img class="ac_product_img" src="'+data[i].product_image+'" alt="'+data[i].pname+'" height="30" />'+'<span class="ac_product_name">'+pname+'</span>'};}
return mytab;},extraParams:{ajaxSearch:1,id_lang:2}}).result(function(event,data,formatted){$('#search_query_top').val(data.pname);document.location.href=data.product_link;})});/* ]]> */</script><?php }} ?>