
$(document).ready(function() {
	
	$('#tptn-config-switch').click(function(){
		if ( $(this).hasClass('config-open') ) {
			$('#tptn-config-inner').fadeIn();
			$(this).removeClass('config-open');
			$.cookie('ckconfigopen', 0);
		} else {
			$('#tptn-config-inner').fadeOut();
			$(this).addClass('config-open');
			$.cookie('ckconfigopen', 1);
		}
		return false;
	});

	if ( $.cookie('ckconfigopen') == 1 ) { 
		$('#tptn-config-inner').css("display","none");
		$('#tptn-config-switch').addClass('config-open');
	}
	if ( $.cookie('ckconfigopen') == 0 ) { 
		$('#tptn-config-inner').css("display","block");
		$('#tptn-config-switch').removeClass('config-open');
	} else {
		$('#tptn-config-inner').css("display","none");
	}

	
	//=== Title Bkg ===//
	
	var cktitlebkg;

	if($.cookie('cktitlebkg')) {
		cktitlebkg = $.cookie('cktitlebkg');
	} else {
		cktitlebkg = tptntitlebkg_default;
	}

	$('#titlebkg-input').ColorPicker({

		color: cktitlebkg,

		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},

		onChange: function (hsb, hex, rgb) {
			$('#top-categ span, .tptnresp-title').css('backgroundColor', '#'+hex);
			$('#titlebkg-input').css('backgroundColor', '#' + hex);
			$('.apply').click(function() {
				$.cookie('cktitlebkg', hex);
		    });
		}
	});

	//=== Cat Bkg ===//
	
	var ckcatbkg;

	if($.cookie('ckcatbkg')) {
		ckcatbkg = $.cookie('ckcatbkg');
	} else {
		ckcatbkg = tptncatbkg_default;
	}

	$('#catbkg-input').ColorPicker({

		color: ckcatbkg,

		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},

		onChange: function (hsb, hex, rgb) {
			$('#categories_block_left, .tptnmegamenu').css('backgroundColor', '#'+hex);
			$('#catbkg-input').css('backgroundColor', '#' + hex);
			$('.apply').click(function() {
				$.cookie('ckcatbkg', hex);
		    });
		}
	});

	//=== Border Color ===//
	
	var ckbrdclr;

	if($.cookie('ckbrdclr')) {
		ckbrdclr = $.cookie('ckbrdclr');
	} else {
		ckbrdclr = tptnbrdclr_default;
	}

	$('#brdclr-input').ColorPicker({

		color: ckbrdclr,

		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},

		onChange: function (hsb, hex, rgb) {
			$('#categories_block_left, .tptnmegamenu').css('border', '1px solid #'+hex);
			$('.tptn-vertical-mega-menu .menu > li, .tptnmegamenu a ').css('border-bottom', '1px solid #'+hex);
			$('#brdclr-input').css('backgroundColor', '#' + hex);
			$('.apply').click(function() {
				$.cookie('ckbrdclr', hex);
		    });
		}
	});
    
    //=== Top Bkg ===//
	
	var cktopbkg;

	if($.cookie('cktopbkg')) {
		cktopbkg = $.cookie('cktopbkg');
	} else {
		cktopbkg = tptntopbkg_default;
	}

	$('#topbkg-input').ColorPicker({

		color: cktopbkg,

		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},

		onChange: function (hsb, hex, rgb) {
			$('#top-categ, #footer,	#back-top').css('backgroundColor', '#'+hex);
			$('#topbkg-input').css('backgroundColor', '#' + hex);
			$('.apply').click(function() {
				$.cookie('cktopbkg', hex);
		    });
		}
	});
	
	//=== Cart Bkg ===//
	
	var ckcartbkg;

	if($.cookie('ckcartbkg')) {
		ckcartbkg = $.cookie('ckcartbkg');
	} else {
		ckcartbkg = tptncartbkg_default;
	}

	$('#cartbkg-input').ColorPicker({

		color: ckcartbkg,

		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},

		onChange: function (hsb, hex, rgb) {
			$('.shopping_cart').css('backgroundColor', '#'+hex);
			$('#cartbkg-input').css('backgroundColor', '#' + hex);
			$('.apply').click(function() {
				$.cookie('ckcartbkg', hex);
		    });
		}
	});

	//=== RESET ALL COOKIES ===//
	$('.reset').click(function() {
		$.cookie('cktitlebkg', null);
		$.cookie('ckcatbkg', null);
		$.cookie('ckbrdclr', null);
        $.cookie('cktopbkg', null);
		$.cookie('ckcartbkg', null);
	});

});
