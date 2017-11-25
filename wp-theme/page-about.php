<?php

    /* Template Name: About Page */
    get_header();
    
?>
<div class="page about">
  <div class="container">
    <div class="copy">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
        <div class="links">
            <ul>
                <li>
                    <a href="<?php the_field('linkedin'); ?>" target="_blank">LinkedIn</a>
                </li>
                <li>
                    <a href="<?php the_field('resume'); ?>" target="_blank">Resume</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="image">
        <?php $image = get_field('photo'); ?>
        <img src="<?php echo $image['url']; ?>">
        <h6><?php echo $image['caption']; ?></h6>
    </div>
  </div>
</div>
<?php

    get_footer();
    
?>
