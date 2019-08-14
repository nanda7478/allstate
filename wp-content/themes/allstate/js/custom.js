//js for carousel slider
$(function(){
      SyntaxHighlighter.all();
    });
   $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });



jQuery(window).load(function(){
      $('#slider1').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });





//js for services tabs 
jQuery(document).ready(function(){
 jQuery(".privatearticles").trigger("click");
 jQuery(".faqbusiness").trigger("click");
 jQuery(".radioint").trigger("click");

 });

	$.urlParam = function(name){
	    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	    if (results==null){
	       return null;
	    }
	    else{
	       return decodeURI(results[1]) || 0;   
	    }
	}	

jQuery(document).ready(function(){
	$tab  = $.urlParam('tab');
	if($tab  > 0){  
		setTimeout(function(){
          jQuery('.tab-'+$tab).trigger("click");   
        }, 500)
	}
});