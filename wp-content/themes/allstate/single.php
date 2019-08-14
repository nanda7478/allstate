<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div class="container">
<div class="event-sub-page">

<div class="event-details">
<div class="row">

<div class="col-xs-12 col-md-12">
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

   

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

        ?>

        
        
        <div class="event-content-deatils">
                    <?php allstate_post_thumbnail(); ?>
<!--<div class="details-matter">-->
            <header class="entry-header">
             <?php the_title( '<h4 class="entry-title evenheading">', '</h4>' ); ?>
             </header>

             <div class="author_date">
             <ul>
             
             <li><?php echo get_the_date('M j, Y'); ?></li>


              <li class="social-share">
                
            <div class="entry-share">
    
            <?php dynamic_sidebar('sidebar-2'); ?> 
                <!--  Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
                      https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
                <!-- <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($data_link) ?>" class="popup entry-share-link-facebook facebook_icon">
                    <?php _e('<i class="fa fa-facebook" aria-hidden="true"></i>', 'dfd'); ?>
                </a>
        
        
                
                <a href="https://twitter.com/intent/tweet?text=<?php echo esc_attr($data_link) ?>" class="popup entry-share-link-twitter twitter_icon">
                    <?php _e('<i class="fa fa-twitter" aria-hidden="true"></i>', 'dfd'); ?>
                </a>
    
        
                
                <a href="https://plus.google.com/share?url=<?php echo esc_attr($data_link) ?>" class="popup entry-share-link-googleplus google_icon">
                    <?php _e('<i class="fa fa-google-plus" aria-hidden="true"></i>', 'dfd'); ?>
                </a> -->
        
        
    </div>

             </li>

             </ul>
            </div>

            <div class="entry-content">
            <?php the_content();?>
            </div>

<!--</div>-->
        </div>

            <?php
            // Include the single post content template.
            //get_template_part( 'template-parts/content', 'single' );

            // If comments are open or we have at least one comment, load up the comment template.

            
           
            if ( is_singular( 'attachment' ) ) {
                // Parent post navigation.
                the_post_navigation( array(
                    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'allstate' ),
                ) );
            } elseif ( is_singular( 'post' ) ) {
                // Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '', 'allstate' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post', 'allstate' ) . '</span> ',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '', 'allstate' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post', 'allstate' ) . '</span> ',
                ) );
            }

            // End of the loop.
        endwhile;
        ?>

     

    </main><!-- .site-main -->

    <?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
</div>
</div></div>
<div class="more_event">
<div class="row">

<div class="col-xs-12 col-md-12">
    <?php $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 2, // Number of related posts that will be shown.
    'caller_get_posts'=>1
    );

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
    echo '<div id="related_posts"><h3>More News & Events...</h3><ul>';
    while( $my_query->have_posts() ) {
    $my_query->the_post();?>

    <li><div class="relatedthumb"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a></div>
    <div class="relatedcontent">
    <p><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
    <div class="read_more_link"><a href="<?php the_permalink();?>">Read More</a></div>
    </div>
    </li>
    <?
    }
    echo '</ul></div>';
    }
    }
    $post = $orig_post;
    wp_reset_query(); ?>
</div>
</div>
</div>

</div>
</div>


<?php get_footer(); ?>
