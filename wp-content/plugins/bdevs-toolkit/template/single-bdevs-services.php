<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  netfix
 */
get_header(); ?>

   <div class="services-details-area pt-120 pb-120">
      <div class="container">
            <?php 
               if( have_posts() ):
               while( have_posts() ): the_post();
               $department_details_thumb = function_exists('get_field') ? get_field('department_details_thumb') : '';
            ?>
            <div class="row services-details-wrap">
               <div class="col-4">
                  <aside class="services-sidebar">
                     <?php do_action("netfix_service_sidebar"); ?>
                  </aside>
               </div>
               <div class="col-8">
                  <div class="services-details-img">
                     <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="services-details-content">
                     <h2 class="title"><?php the_title(); ?></h2>
                     <?php the_content(); ?>
                  </div>
               </div>
            </div>
         <?php 
             endwhile; wp_reset_query();
         endif; 
         ?>
      </div>
   </div>

<?php get_footer();  ?>