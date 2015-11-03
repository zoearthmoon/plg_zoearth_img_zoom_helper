jQuery(document).ready(function(){
	if (typeof imgZoomSelect != 'undefined')
	{
		var nowWidth = jQuery(imgZoomSelect).width();
		jQuery('img',jQuery(imgZoomSelect)).each(function(){
            if (jQuery(this).width() >= (nowWidth-50))
            {
                jQuery(this).addClass('img-polaroid lightboximg');
                bindLightbox();
            }
		});
	}
});
