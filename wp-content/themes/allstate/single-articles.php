<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="inner-pages_white">
 <div class="container">
 <div class="white_banner_content">

<div class="banner_img_content">
<div class="white_banner_img"><img src="http://demosrvr.com/wp/allstate/wp-content/uploads/2018/04/wallet-1.png"></div>
<h2><?php the_title();?></h2>
</div>
</div>
</div>
<?php endwhile; ?>


<div class="container">
<div class="subpages-article sub-page-max-width">
<div class="row">
<?php while ( have_posts() ) : the_post(); ?>
<div class="col-sm-12">
  <?php the_content();?>
</div>
<?php endwhile;?>
</div>
</div>


<div class="row">
<div class="get-quote-service" style="background-image:url(http://demosrvr.com/wp/allstate/wp-content/uploads/2018/03/img3-1.jpg);">
<div class="quo-te_bg">
  <div class="row">
  
         <div class="col-md-8 left_quote"><h2>Get A Free Quote For Services</h2></div>
         <div class="col-md-4"><div class="right_quote_btn"><a href="#">Learn More</a></div></div>
          </div>
  </div>

</div>
</div>


</div>


<?php get_footer(); ?>
