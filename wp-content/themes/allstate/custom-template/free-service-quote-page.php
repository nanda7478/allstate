<?php
/*
  Display Template Name: Free Service Quote
*/

 get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="inner-pages_white">
 <div class="container">
 <div class="white_banner_content">
<?php the_content();?>  
<?php the_field('header_content');?>
</div>

</div>
</div>
<?php endwhile;?>




<div class="container">
<div class="free_auote_page">
<div class="row">

  <div class="col-sm-12">
  <?php  the_field('service_quote_content');?>
  </div>

</div>

</div>

</div>


<?php
get_footer();
?>