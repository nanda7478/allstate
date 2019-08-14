<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

			   

		<footer id="colophon" class="site-footer" role="contentinfo">
			   <div class="footerbg">
			   <?php dynamic_sidebar( 'footer-section' );  ?>
			   </div>

              <div class="sub-footer">
              <div class="container">
				<div class="row">
				<div class="col-md-8 footer_logo">
				<?php dynamic_sidebar( 'footer-1' );  ?>
				<?php dynamic_sidebar( 'social-1' );  ?>
				</div>
				<div class="col-md-2 footer_menu">
				<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<div class="col-md-2 footer_menu">
				<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				  </div></div>
				   </div>
			          </div>
			
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->
<!-- Place in the <head>, after the three links -->
<script type="text/javascript">
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
</script>
<?php 
wp_footer(); ?>
</body>
</html>
