jQuery(document).ready(function() {
  
  jQuery('.carousel').carousel({
	  interval: slider_speed.vars
	});
  
  // The slider being synced must be initialized first
  jQuery('.flexslider').flexslider({
	slideshowSpeed: carousel_speed.vars, 
    animation: "slide",
    animationLoop: true,
    itemWidth: 210,
    itemMargin: 5,
    minItems: 2,
    maxItems: 4,
	controlNav: false,
  });
  
	jQuery("#search-icon").click(function(){
		jQuery(".search-form-wrapper").slideToggle();
		jQuery( ".search-form-coantainer .search-top" ).focus();
		jQuery( ".black-overlay" ).toggleClass( "search-active" );
    });
	
	jQuery( "#show-icons .fa-angle-down" ).click(function() {
	  jQuery( "#mobile-icon" ).slideToggle( "slow" );
	  jQuery("#show-icons .fa-angle-down").addClass("hide-icons");
	  jQuery("#show-icons .fa-angle-up").removeClass("hide-icons");
	});
	jQuery( "#show-icons .fa-angle-up" ).click(function() {
	  jQuery( "#mobile-icon" ).slideToggle( "slow" );
	  jQuery("#show-icons .fa-angle-down").removeClass("hide-icons");
	  jQuery("#show-icons .fa-angle-up").addClass("hide-icons");
	});
	
	jQuery('.flexslider .slides > li').hover(function(){     
        jQuery(this).find('.tour-title').fadeIn(500); 
    },     
    function(){    
        jQuery(this).find('.tour-title').fadeOut(500);
    });
	
	jQuery('a[href*=".png"]:has(img), a[href*=".gif"]:has(img), a[href*=".jpg"]:has(img)').prettyPhoto({ social_tools: false});

	dothis();

});

jQuery(window).resize(function(e) {
    dothis();
});

function dothis(){

    console.log(jQuery(window).width());

    if(jQuery(window).width() > 768){
        jQuery('.post-hover').hover(function(){
		jQuery(this).addClass('flip');
		},function(){
			jQuery(this).removeClass('flip');
		});
    } else {
        jQuery(".post-details").removeClass("back");
		jQuery(".post-details").removeClass("front");
    }
}