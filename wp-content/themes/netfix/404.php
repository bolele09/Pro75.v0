<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package netfix
 */

get_header();
?>

<section class="error__area pt-200 pb-200">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-5 col-lg-10">
            <?php 
               $netfix_error_title = get_theme_mod('netfix_error_title', __('Page not found', 'netfix'));
               $netfix_error_link_text = get_theme_mod('netfix_error_link_text', __('Back To Home', 'netfix'));
               $netfix_error_desc = get_theme_mod('netfix_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'netfix'));
            ?>

            <div class="error-img text-center mb-40">
                 <img src="<?php echo get_template_directory_uri(); ?>/assets/img/images/404.png" alt="<?php print esc_attr__('Error 404','netfix'); ?>">
             </div>
             <div class="error-content text-center">
                 <h3 class="title"><?php print esc_html($netfix_error_title);?> </h3>
                 <p><?php print esc_html($netfix_error_desc);?></p>
                 <a href="<?php print esc_url(home_url('/'));?>" class="btn"><?php print esc_html($netfix_error_link_text);?></a>
             </div>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();
