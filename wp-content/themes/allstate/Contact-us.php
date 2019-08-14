<?php
/*
*
Template Name: Contact Us 
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
  <?php echo $after__slider_text = get_field( 'slider_text'); ?> 
 </div>
 </div>
 </div> </div> </div>
 </div>

<div class="container">
<div class="contact_page">
<div class="row">
 <?php
while( have_rows('flexible_content') ): the_row();            
$featuredtext = get_sub_field( 'featured_image_and_content' );
?>
<div class="col-sm-6 contact_left">
  <?php echo $featuredtext;  ?> 
    </div>
    <div class="col-sm-6 contact_right">
    <div class="contact_form">
    <?php  echo $contect_form = get_sub_field( 'contect_form'); ?>
    </div>    </div>

<?php  endwhile; ?>
</div></div></div>


<?php get_footer(); ?>