<?php
/*
*
Template Name: Custom Difficult Cases
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
</div>
<?php endwhile;?>

<div class="inner_pages">
<div class="container">
<div class="inner_pages_content">
<div class="row">
<?php
while( have_rows('flexible_content') ): the_row();            
$add_image = get_sub_field( 'add_image' );
$content = get_sub_field( 'content');
?>
<div class="col-sm-6 inner_left_image">
   <div class="manig-motromoial">
      <img src="<?php echo $add_image['url']; ?>" />      
      </div>
      </div>
      <div class="col-sm-6 inner_page_right_content">
      <?php echo $content;  ?>
      </div>
 <?php  endwhile; ?>
 </div>

 
 <div class="row">
<div class="get-quote-service" style="background-image:url(http://demosrvr.com/wp/allstate/wp-content/uploads/2018/03/img3-1.jpg);">
<div class="quo-te_bg">
  <div class="row">
  
         <div class="col-md-8 left_quote"><h2>Get A Free Quote For Services</h2></div>
         <div class="col-md-4"><div class="right_quote_btn"><a href="<?php  echo site_url();?>/free-service-quote/">Learn More</a></div></div>
          </div>
  </div>

</div>
</div>

 </div></div></div>
<?php get_footer(); ?>
