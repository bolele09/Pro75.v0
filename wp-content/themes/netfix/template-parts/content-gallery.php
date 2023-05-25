<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package netfix
 */

$gallery_images = function_exists( 'acf_photo_gallery' ) ? acf_photo_gallery( 'gallery_images', get_the_id() ) : '';
$categories = get_the_terms( $post->ID, 'category' );
if ( is_single() ): ?>


    <article id="post-<?php the_ID();?>" <?php post_class( 'standard-blog-item mb-50 format-gallery' );?> data-wow-delay=".3s">
        <?php if ( !empty( $gallery_images ) ): ?>
        <div class="post_gallery-active">
            <?php foreach ( $gallery_images as $key => $image ): ?>
                <div class="item"><img src="<?php echo esc_url( $image['full_image_url'] ); ?>" alt="<?php print esc_attr__( 'gallery image', 'netfix' );?>"></div>
            <?php endforeach;?>
        </div>
        <?php endif;?>

        <div class="standard-blog-content">
            <ul class="blog-post-meta mb-20">
                <?php if ( !empty( $categories[0]->term_id ) ): ?>
                <li><i class="far fa-folder-open"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
                <?php endif;?>
                <li><i class="flaticon-user"></i> <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php print get_the_author();?></a></li>
                <li><i class="flaticon-calendar"></i> <?php the_time( get_option('date_format') ); ?></li>
            </ul>


            <h2 class="title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h2>

            <div class="post-text mb-20">
               <?php the_content();?>
                <?php
                    wp_link_pages( [
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'netfix' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ] );
                ?>
            </div>
            <div class="blog__deatails--tag">
                <?php print netfix_get_tag(); ?>
            </div>
        </div>

    </article>

    <?php else: ?>


    <article id="post-<?php the_ID();?>" <?php post_class( 'standard-blog-item mb-50 format-gallery' );?> data-wow-delay=".3s">

        <?php if ( !empty( $gallery_images ) ): ?>
        <div class="post_gallery-active">
            <?php foreach ( $gallery_images as $key => $image ): ?>
                <div class="item"><img src="<?php echo esc_url( $image['full_image_url'] ); ?>" alt="<?php print esc_attr__( 'gallery image', 'netfix' );?>"></div>
            <?php endforeach;?>
        </div>
        <?php endif;?>

        <div class="standard-blog-content">

            <ul class="blog-post-meta mb-20">
                <?php if ( !empty( $categories[0]->term_id ) ): ?>
                <li><i class="far fa-folder-open"></i> <a href="<?php print esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></li>
                <?php endif;?>
                <li><i class="flaticon-user"></i> <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php print get_the_author();?></a></li>
                <li><i class="flaticon-calendar"></i> <?php the_time( get_option('date_format') ); ?></li>
            </ul>
            
            <h2 class="title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h2>
            <div class="post-text">
                <?php the_excerpt();?>
            </div>
            <!-- blog btn -->

            <?php
          
                $netfix_blog_btn = get_theme_mod( 'netfix_blog_btn', 'Read More' );
                $netfix_blog_btn_switch = get_theme_mod( 'netfix_blog_btn_switch', true );
            ?>

            <?php if ( !empty( $netfix_blog_btn_switch ) ): ?>
            <a href="<?php the_permalink();?>" class="btn transparent-btn"><?php print esc_html( $netfix_blog_btn );?></a>
            <?php endif;?>
        </div>
    </article>

<?php
endif;?>


