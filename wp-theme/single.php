<?php

    get_header();
    if (have_posts()) : while (have_posts()) : the_post();
?>

<div class="page gallery-page">
    <div class="container">
        <div class="intro">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
        
        <div class="gallery <?php if( get_field('float') ): echo 'float'; endif; ?>">
            
        <?php if( have_rows('media') ):
            while ( have_rows('media') ) : the_row();
            
            if( get_row_layout() == 'image' ): ?>
                
                <?php $image = get_sub_field('photo'); ?>
                
                <div class="item">
                    <img src="<?php echo $image['url']; ?>">
                </div>
                    
            <?php elseif( get_row_layout() == 'video' ): ?>
                
                <div class="item video">
                    
                    <div class="video-inner">
                    
                        <?php $source = get_sub_field('source');
                        
                        if($source == 'Vimeo'): ?>
                        
                            <iframe src="https://player.vimeo.com/video/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                        
                        <?php elseif( $source == 'YouTube'): ?>
                        
                            <iframe src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>" width="640" height="360" frameborder="0"></iframe>
                        
                        <?php endif; ?>
                    
                    </div>
                    
                </div>       
                    
            <?php endif;
                    
            endwhile;
                    
        endif; ?>
 
        </div>
    </div>
</div>

<?php

    endwhile;
    endif;
    get_footer();
    
?>