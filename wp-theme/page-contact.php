<?php

  /* Template Name: Contact Page */
  get_header();
  
?>
<div class="page contact">
  <div class="container">
    <div class="email">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/contact/email.png">
      <div class="text">
        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
      </div>
    </div>
    <div class="phone">
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/contact/phone.png">
      <div class="text">
        <a href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a>
        <small><?php the_field('phone_disclaimer'); ?></small>
      </div>
    </div>
   </div>
</div>

<?php

    get_footer();
    
?>
