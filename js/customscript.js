jQuery(document).ready(function() {
	jQuery('#mobilenavexpand').click(function() {
		if( jQuery('#mobilenav').hasClass('close_menu') )
			jQuery('#mobilenav').addClass('open_menu').removeClass('close_menu');
		else
			jQuery('#mobilenav').addClass('close_menu').removeClass('open_menu');
	});		
	
	var container = document.querySelector('#columns');
	var msnry = new Masonry( container, {
	  columnWidth: 50,
	  itemSelector: '.posttwofull'
	});
	jQuery('#headernav li.home a').text("");
	jQuery(function() {
		jQuery('.toggle-title').click(function() {
			jQuery(this).siblings().slideToggle();
		});		
	});
	jQuery('#searchicon').click(function() {
		if(jQuery('#searchexpand').hasClass('nod'))
			jQuery('#searchexpand').removeClass('nod');
		else
			jQuery('#searchexpand').addClass('nod');
	});	
	jQuery('#twitter').sharrre({
	  share: {
		twitter: true
	  },
	  enableHover: false,
	  enableTracking: true,
	  buttons: { twitter: {via: ''}},
	  click: function(api, options){
		api.simulateClick();
		api.openPopup('twitter');
	  }
	});
	jQuery('#facebook').sharrre({
	  share: {
		facebook: true
	  },
	  enableHover: false,
	  enableTracking: true,
	  click: function(api, options){
		api.simulateClick();
		api.openPopup('facebook');
	  }
	});
});