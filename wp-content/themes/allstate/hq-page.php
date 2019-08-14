<?php

/*
  Display Template Name: Head Quarter Page
*/

  get_header();

?>

<?php if (is_page('hq-info')): ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="inner-pages_white">
 <div class="container">
 <div class="white_banner_content">

<?php the_content();?>

  
</div>
</div>
</div>
<?php endwhile;?>

<div class="page_content">
<div class="container">
<div class="row">

  <div class="col-sm-12">
  <div class="hq_page">
  <?php  the_field('head_quarter_content');?>
  </div>

</div>
</div>



<?php $image = get_field('background_image'); ?>
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
  </div>
  </div>

</div></div></div>

<?php endif;?>




<?php if (is_page('join-our-team')): ?>



<?php while ( have_posts() ) : the_post(); ?>
<div class="inner-pages_white">
 <div class="container">
 <div class="white_banner_content">

<?php the_content();?>

  
</div>
</div>
</div>


<?php endwhile;?>



<div class="container">
<div class="join_our_team_page">
 <div class="jointeam">
  <?php  the_field('head_quarter_content');?>
  </div>
<?php $image = get_field('background_image'); ?>
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
  </div>
  </div>

</div></div>
</div>




<?php endif;?>


<?php 

get_footer();

?>