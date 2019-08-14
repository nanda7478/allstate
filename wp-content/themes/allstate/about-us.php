<?php
/*
*
Template Name: Custom About Us 
*/
get_header();

?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php $image = get_field('banner_image'); ?>
<div class="inner-pages-banner" style="background-image:url(<?php echo $image['url'];?>);">
 <div class="container inner-pages-content-table">
 <div id="post-<?php the_ID(); ?>" class="inner-pages-content-table-cell text-left">
 <h1 class="entry-title">
<?php the_title(); ?>
 </h1> 
</div>
</div>
</div>
<?php endwhile;?>


<div class="about_second_bg">
<div class="container">
<div class="about_second">
<div class="row">
<div class="col-sm-7">
 <div class="text-manige"> 
  <?php echo $after__slider_text = get_field( 'after__slider_text'); ?> 
 </div>
 </div>
 </div> </div> </div>
 </div>
 
 
 <div class="container">
<div class="about_content">
<div class="row padding_right_div">
<div class="col-md-6 img_left">
 <?php $image = get_field('left_featured_image'); ?>
   <img src="<?php echo $image['url'];?>">
</div>
<div class="col-md-6 p_content">
<div class="about_matter left-right-space"><p><?php  echo  get_post_meta(get_the_ID(),'right_text',true);?></p>
</div></div>
</div></div>
<div class="about_content">
<div class="row">
<div class="col-md-6 p_content">
<div class="about_matter left-right-space"><p><?php  echo  get_post_meta(get_the_ID(),'left_text',true);?></p></div>
</div>
<div class="col-md-6 img_left">
<?php $imager = get_field('right_featured_image'); ?>
   <img src="<?php echo $imager['url'];?>">
</div>
</div></div></div>

<div class="container">

<?php $image = get_field('quote_image'); ?>
<div class="get-quote-service" style="background-image:url(<?php echo $image['url'];?>);">
<div class="quo-te_bg">
  <div class="row">
  <?php
  if( have_rows('get_a_quote_flexible') ):

     
    while ( have_rows('get_a_quote_flexible') ) : the_row();

        if( get_row_layout() == 'quote_service' ):
          ?>

         <div class="col-md-8 left_quote"><h2><?php the_sub_field('title');?></h2></div>
         <div class="col-md-4"><div class="right_quote_btn"><a href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_title'); ?></a></div></div>
        <?php

        endif;

    endwhile;

endif;
  ?>
  </div></div>
  </div>

</div>




</div>

<?php get_footer(); ?>