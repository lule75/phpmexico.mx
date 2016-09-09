// JavaScript Document


jQuery(function(){
 	
	//jQuery('a.new').append('<span class="label label-danger">New</span>');
	jQuery('.set_bg').each(function(){
		jQuery(this).css('background-image','url('+ jQuery(this).attr('data-background') +')')
	});
	jQuery('h1.title').each(function(){
		jQuery(this).html(jQuery(this).text());
	});

	/*jQuery('body.front-page .transparent_menu ul li:not(:last-child) a.external').removeClass('external');*/

	var i = 2;
	jQuery('.animated').each(function(){
		jQuery(this).attr('data-animation-target',i);
		i++;
	});
	
	jQuery('span.ui-icon').remove();

	
});
