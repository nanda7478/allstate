<?php

/*
 Display Template Name: Our Services
*/

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php $image = get_field('header_banner_image'); ?>
<div class="inner-pages-banner" style="background-image:url(<?php echo $image['url'];?>);">
 <div class="container inner-pages-content-table">
 <div id="post-<?php the_ID(); ?>" class="inner-pages-content-table-cell text-left">
 <h1 class="entry-title">
<?php the_title(); ?>
 </h1>
 <p>
<?php the_content();?>
</p>   
</div>
</div>
</div>
<?php endwhile;?>


<div class="container">
<div class="service_page">
<div class="row">
	 
<?php
$count = 1;

 while( have_rows('service_repeater') ): the_row(); ?>
    <?php $image01 = get_sub_field('image_box'); ?>
    <div class="col-lg-4">
    <div class="service_box">
    
      <div class="service-img">
      <img src="<?php echo $image01['url'];?>">
      </div>
        <div class="service_text">
<div class="icon-img"> <?php $image01 = get_sub_field('icon_image'); ?>
        <img src="<?php echo $image01['url'];?>"></div>
          <h4 class="service-tittle" data-id="ui-id-<?php echo $count; $count++; ?>">
          <a href="<?php the_sub_field( 'url' ); ?>">
          <?php the_sub_field( 'title' ); ?>
          </a> 
           </h4>

          </div>
       
    </div>  </div>
    <?php endwhile; ?>

</div>

</div>
</div>

<?php
get_footer();
?>