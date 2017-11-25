<?php

    get_header();
    
    if ( is_category() ) {

    $this_category = get_category($cat);

?>


<div class="page gallery-page">
    <div class="container">
        <div class="gallery float">
        <?php if ( get_category_children( $this_category->cat_ID ) != "" ) {
            
             $childcategories = get_categories(array(
                'orderyby'   => 'name',
                'hide_empty' => false,
                'child_of'   => $this_category->cat_ID
            ));
            
            foreach( $childcategories as $category ) {
            $photo = get_field('image', $category); ?>
            
            <div class="item">
                <a href="<?php echo get_category_link( $category->term_id ); ?>">
                    <div class="overlay"></div>
                    <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
                </a>
            </div>
        <?php } } ?>
            
            
        <?php if ( have_posts() ) : ?>
            
            <?php query_posts(array('category__in' => array($this_category->cat_ID))); ?>

    
            <?php while ( have_posts() ) : the_post(); ?>
            
            <div class="item">
                <a href="<?php the_permalink(); ?>">
                    <div class="overlay"></div>
                    <?php $image = get_field('featured_image'); ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                </a>
            </div>
            
            <?php endwhile;  endif;?>
        </div>
    </div>
</div>

<?php

    }

    get_footer();
    
?>