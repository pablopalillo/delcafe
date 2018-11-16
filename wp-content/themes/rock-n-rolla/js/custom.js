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


function submitForm(event)
{
  event.preventDefault();
  var form = document.querySelector("#join-form");

  //node list
  var inputs = form.querySelectorAll("input");
  var selects = form.querySelectorAll("select");
  var result = null;

  // validate inputs
  inputs.forEach(function (value, key) {

    if(!requireInput(value.required, value.value)){
    	result = false;
    	return;
    }

    if (value.required && value.value.length > 0 || !value.required && value.value.length > 0) {
      if(!validateInput(value.type, value.value)) {
      	result = false;
      	return;
      }
    }

    result = true;

  });

  if(!result) {
  	return false;
  }

  // validate selects
  selects.forEach(function (value, key) {
    if(!requireInput(value.required, value.value)){
		result = false;
      	return;
    }
    result = true;
  });

if(!result) {
  	return false;
  } else {
  	form.submit();
  }
}


function requireInput(requiredValue, value)
{
  if (requiredValue) {
    if (!value.length) {
      alert("Campos obligatorios sin gestionar");
      return false;
    }
  }
  return true;
}

function validateInput(typeInput, value)
{
  switch (typeInput) {
    case "email":
      if (!validateEmail(value)) {
        alert("Email no valido");
        return false;
      }
      break;
    case "number":
      if (!validateNumber(value)) {
        alert("Ingrese un número valido");
        return false;
      }
      break;
    case "tel":
      if (!validateNumber(value)) {
        alert("Ingrese un número valido");
        return false;
      }
      break;
   /** case "text":
      if (!validateString(value)) {
        alert("Caracteres no validos");
        return false;
      }
      break; **/
  }

  return true;

}

function validateEmail(email)
{
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function validateNumber(numberInput)
{
  var newNumber = numberInput.replace(" ", "");
  newNumber = parseInt(numberInput);
  if (Number.isInteger(newNumber)) {
    if (newNumber > 0) {
      return true;
    }
  }

  return false;
}

function validateString(stringInput)
{
  var newString  = stringInput.replace(" ", "");
  var bannedList = /[`~!@#$%^&*()_°¬|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;

  if(bannedList.test(newString.toLowerCase())) {
  	return false;
  }

  return true;
}