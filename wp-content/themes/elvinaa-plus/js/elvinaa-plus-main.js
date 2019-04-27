
(function ($) {
	
    $(document).ready(function () { 
        /*-- Window scroll function --*/
        $(window).on('scroll', function () {  
            scroll = $(window).scrollTop();            
            if (scroll > 250) {
                $(window).trigger('resize.px.parallax');  
            }
            else {               
                $(window).trigger('resize.px.parallax');
            }
        });
    });

}) (this.jQuery);