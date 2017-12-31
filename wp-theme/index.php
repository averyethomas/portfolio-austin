<?php

    /* Template Name: Home Page */
    get_header();
    
?>

<div class="page home">
    <div class="container">
        <div class="gallery">
        <?php   $cat = get_category_by_slug('campaigns');
                $photo = get_field('image', $cat);
        ?>
        <div class="item">
            <a href="/<?php echo $cat->slug; ?>">
                <div class="overlay"></div>
                <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
            </a>
        </div>    
        
        <?php $objects = get_field('featured_posts');
            
        if( $objects ):
        
            while ( have_rows('featured_posts') ) : the_row();
            
            $post_object = get_sub_field('post');
 
                if( $post_object ):
                
                $post = $post_object; setup_postdata( $post );
                
                $image = get_field('featured_image'); ?>
                        
                <div class="item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="overlay"></div>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                </div>
                
                <?php wp_reset_postdata();
                
                endif;
                    
            endwhile;
            
        endif ?>
        
        </div>
    </div>
</div>

<?php

    get_footer();
    
?>
