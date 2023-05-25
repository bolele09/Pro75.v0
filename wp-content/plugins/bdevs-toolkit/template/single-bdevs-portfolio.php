<?php 
/** 
 * The main template file
 *
 * @package  WordPress
 * @subpackage  medidove
 */
get_header(); ?>


    <section class="portfolio__details pt-120 pb-130">
        <div class="container">
            <?php 
                if( have_posts() ):
                while( have_posts() ): the_post();
                    $case_sub_title = function_exists('get_field') ? get_field('case_sub_title') : '';
                    $case_date = function_exists('get_field') ? get_field('case_date') : '';
                    $case_cat_label = function_exists('get_field') ? get_field('case_cat_label') : '';
                    $case_cat_title = function_exists('get_field') ? get_field('case_cat_title') : '';
                    $case_customer_label = function_exists('get_field') ? get_field('case_customer_label') : '';
                    $case_customer_text = function_exists('get_field') ? get_field('case_customer_text') : '';

                    $department_info_list = function_exists('get_field') ? get_field('department_info_list') : '';
                    $gallery_images =  function_exists('acf_photo_gallery') ? acf_photo_gallery('department_gallery', get_the_id()) : ''; 
            ?>  
            <div class="row">
                <?php if (!empty($gallery_images)) : ?>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="portfolio__img-wrapper">
                        <?php foreach( $gallery_images as $key => $image ) :  ?>
                        <div class="portfolio__img mb-30 w-img wow fadeInUp" data-wow-delay=".2s">
                            <img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="img">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-xl-5 col-lg-6 col-md-6 offset-xl-1">
                    <div class="portfolio__details-content mt-10">
                        <div class="portfolio__meta mb-5 wow fadeInUp" data-wow-delay=".2s">
                            <?php if (!empty($department_info_list['case_sub_title'])) : ?>
                            <h4><?php echo wp_kses_post( $department_info_list['case_sub_title'] ); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($department_info_list['case_date'])) : ?>
                            <span><?php echo wp_kses_post( $department_info_list['case_date'] ); ?></span>
                            <?php endif; ?>
                        </div>

                        <h1 class="wow fadeInUp" data-wow-delay=".4s"><?php the_title(); ?></h1>

                        <div class="portfolio__info mb-25 wow fadeInUp" data-wow-delay=".6s">
                            <?php if (!empty($department_info_list['case_cat_label'])) : ?>
                            <h3><?php echo wp_kses_post( $department_info_list['case_cat_label'] ); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($department_info_list['case_cat_title'])) : ?>
                            <p><?php echo wp_kses_post( $department_info_list['case_cat_title'] ); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="portfolio__info mb-25 wow fadeInUp" data-wow-delay=".8s">
                            <?php if (!empty($department_info_list['case_customer_label'])) : ?>
                            <h3><?php echo wp_kses_post( $department_info_list['case_customer_label'] ); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($department_info_list['case_customer_text'])) : ?>
                            <p><?php echo wp_kses_post( $department_info_list['case_customer_text'] ); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="portfolio__overview mt-40 wow fadeInUp" data-wow-delay="1s">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php if( get_previous_post_link() || get_next_post_link() ) : ?>
              <div class="portfolio__pagination-wrapper mt-70">
                 <div class="row">
                    <div class="col-xxl-12">
                       <div class="portfolio__more-btn d-flex justify-content-between align-items-center mb-120 mt-50">
                        <?php 
                        $prev_post = get_previous_post();
                        if (!empty( $prev_post )): 
                        ?>
                          <a href="<?php print get_permalink( $prev_post->ID ); ?>" class="prev d-flex align-items-center"> <i class="arrow_left"></i> <?php print esc_html__( 'Previous', 'zibber' ); ?></a>
                        <?php endif; ?>

                        <?php $next_post = get_next_post(); 
                        if ( is_a( $next_post , 'WP_Post' ) ): ?>
                           <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next d-flex align-items-center"><?php print esc_html__( 'Next', 'zibber' ); ?> <i class="arrow_right"></i></a>
                        <?php endif; ?>    
                       </div>
                    </div>
                 </div>
              </div>
            <?php endif; ?>

            <?php 
                endwhile; wp_reset_query();
            endif; 
            ?>


        <div class="row mb-30">
            <?php
            $q = new WP_Query( [
                'post_type'      => 'bdevs-portfolio',
                'posts_per_page' => '3',
                'order'          => 'DESC',
                'orderby'        => 'date',
            ] );

            if ( $q->have_posts() ): 
            while ( $q->have_posts() ): $q->the_post();
            $categories = get_the_terms( $post->ID, 'portfolio-categories' );      
            ?>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="portfolio__item mb-30">
                   <div class="portfolio__thumb w-img">

                      <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                      <div class="portfolio__content">
                        <?php if ( !empty( $categories[0]->name ) ): ?> 
                         <span><?php echo esc_html($categories[0]->name); ?></span>
                         <?php endif;?>
                         <h3 class="portfolio__title"><a href="<?php the_permalink();?>">
                            <?php the_title();?></a>
                        </h3>
                      </div>
                   </div>
                </div>
             </div>
         <?php endwhile; wp_reset_query();
        endif;?>
          </div>
        </div>
    </section>


<?php get_footer();  ?>