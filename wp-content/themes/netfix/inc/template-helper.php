<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package netfix
 */

/**
 *
 * netfix header
 */

function netfix_check_header() {
    $netfix_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $netfix_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $netfix_header_style == 'header-style-1' ) {
        netfix_header_style_1();
    } 
    elseif ( $netfix_header_style == 'header-style-2' ) {
        netfix_header_style_2();
    } 
    else {

        /** default header style **/
        if ( $netfix_default_header_style == 'header-style-2' ) {
            netfix_header_style_2();
        } 
        else {
            netfix_header_style_1();
        }
    }

}
add_action( 'netfix_header_style', 'netfix_check_header', 10 );

/**
 * header style 1 + default
 */
function netfix_header_style_1() {
    
   $netfix_side_logo = get_theme_mod( 'netfix_side_logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );
   $netfix_topbar_switch = get_theme_mod( 'netfix_topbar_switch', false );
   $netfix_side_logo_hide = get_theme_mod( 'netfix_side_logo_hide', false );

   $netfix_address = get_theme_mod( 'netfix_address', __( '14/A, Queen Street City, New York, US', 'netfix' ) );
   $netfix_email = get_theme_mod( 'netfix_email', __( 'info@example.com', 'netfix' ) );
   $netfix_open_hour = get_theme_mod( 'netfix_open_hour', __( 'Opening Time : 10: AM - 10 PM', 'netfix' ) );

   $netfix_login_text = get_theme_mod('netfix_login_text', __('Login / Register','netfix'));
   $netfix_login_link = get_theme_mod('netfix_login_link', __('#','netfix'));

   $netfix_header_right = get_theme_mod( 'netfix_header_right', false );

   if ( rtl_enable() ) {
      $btn_text = get_theme_mod( 'netfix_button_text_rtl', __( 'Get a Quote', 'netfix' ) );
   } else {
      $btn_text = get_theme_mod( 'netfix_button_text', __( 'Get a Quote', 'netfix' ) );
   }

   $btn_link = get_theme_mod( 'netfix_button_link', __( '#', 'netfix' ) );

   ?>

   <!-- header-area -->
   <header>
       <?php if(!empty($netfix_topbar_switch)) : ?>
      <div class="header-top-wrap">
          <div class="container">
              <div class="row">
                  <div class="col-xl-8 col-md-7 col-sm-7">
                      <div class="header-top-left">
                          <ul>
                              <?php if(!empty($netfix_address)) : ?>
                              <li class="d-none d-xl-flex"><i class="flaticon-location"></i><?php print esc_html($netfix_address); ?></li>
                              <?php endif; ?>

                              <?php if(!empty($netfix_email)) : ?>
                              <li class="d-none d-lg-flex"><i class="flaticon-email"></i> <?php print esc_html($netfix_email); ?></li>
                              <?php endif; ?>

                              <?php if(!empty($netfix_open_hour)) : ?>
                              <li><i class="flaticon-clock"></i> <?php print esc_html($netfix_open_hour); ?></li>
                              <?php endif; ?>
                          </ul>
                      </div>
                  </div>
                  <div class="col-xl-4 col-md-5 col-sm-5">
                      <div class="header-top-right">
                          <ul>
                              <?php if(!empty($netfix_login_text)) : ?>
                              <li class="header-user-info">
                                  <i class="flaticon-businessman"></i>
                                  <a href="<?php print esc_url($netfix_login_link); ?>"><?php print esc_html($netfix_login_text); ?></a>
                              </li>
                              <?php endif; ?>

                              <li class="header-social">
                                 <?php netfix_header_social_profiles(); ?>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div id="header-top-fixed"></div>
      <?php endif; ?>
      <div id="sticky-header" class="menu-area">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                      <div class="menu-wrap">
                          <nav class="menu-nav">
                              <div class="logo">
                                 <?php netfix_header_logo(); ?>
                              </div>
                              <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <?php netfix_header_menu();?>
                              </div>

                              <?php if ( !empty( $netfix_header_right ) ): ?>
                              <div class="header-action">
                                  <ul>
                                      <?php if (NETFIX_WOOCOMMERCE_ACTIVED) : ?> 
                                      <li class="header-shop-cart"><a href="javascript:void(0);"><i class="flaticon-shopping-cart"></i><span><?php echo esc_html(WC()->cart->cart_contents_count); ?></span></a>

                                        <?php print netfix_shopping_cart(); ?>

                                      </li>
                                      <?php endif; ?>


                                       <?php if(!empty($btn_text)) : ?>
                                       <li class="header-btn d-none d-md-block"><a href="<?php print esc_url($btn_link); ?>" class="btn transparent-btn s-border-btn"><?php print esc_html($btn_text); ?></a>
                                       </li>
                                       <?php endif; ?>
                                  </ul>
                              </div>
                              <?php endif; ?>
                          </nav>
                      </div>
                      <!-- Mobile Menu  -->
                      <div class="mobile-menu">
                          <nav class="menu-box">
                              <div class="close-btn"><i class="fal fa-times"></i></div>
                              <?php if(!empty($netfix_side_logo_hide)) : ?>
                              <div class="nav-logo">
                                    <a href="<?php print esc_url( home_url( '/' ) );?>" class="mobile_logo">
                                        <img src="<?php print esc_url($netfix_side_logo); ?>" alt="<?php print esc_attr__('Side Logo', 'netfix'); ?>">
                                    </a>
                              </div>
                              <?php endif; ?>
                              <div class="menu-outer mt-60">
                                  <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                              </div>
                              <div class="social-links">
                                  <ul class="clearfix">
                                       <?php netfix_header_mobile_social_profiles(); ?>
                                  </ul>
                              </div>
                          </nav>
                      </div>
                      <div class="menu-backdrop"></div>
                      <!-- End Mobile Menu -->
                  </div>
              </div>
          </div>
      </div>
   </header>
   <!-- header-area-end -->

<?php
}

/**
 * header style 2
 */
 function netfix_header_style_2() {
   $netfix_side_logo_hide = get_theme_mod( 'netfix_side_logo_hide', false );
   $netfix_side_logo = get_theme_mod( 'netfix_side_logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );
   $netfix_address = get_theme_mod( 'netfix_address', __( '14/A, Queen Street City, New York, US', 'netfix' ) );
   $netfix_email = get_theme_mod( 'netfix_email', __( 'info@example.com', 'netfix' ) );
   $netfix_open_hour = get_theme_mod( 'netfix_open_hour', __( 'Opening Time : 10: AM - 10 PM', 'netfix' ) );
   $netfix_phone_label = get_theme_mod( 'netfix_phone_label', __( 'Customer Service:', 'netfix' ) );
   $netfix_phone = get_theme_mod( 'netfix_phone', __( '+1 872 923 025', 'netfix' ) );

   $netfix_login_text = get_theme_mod('netfix_login_text', __('Login / Register','netfix'));
   $netfix_login_link = get_theme_mod('netfix_login_link', __('#','netfix'));

   $netfix_header_right = get_theme_mod( 'netfix_header_right', false );

   if ( rtl_enable() ) {
      $btn_text = get_theme_mod( 'netfix_button_text_rtl', __( 'Get a Quote', 'netfix' ) );
   } else {
      $btn_text = get_theme_mod( 'netfix_button_text', __( 'Get a Quote', 'netfix' ) );
   }

   $btn_link = get_theme_mod( 'netfix_button_link', __( '#', 'netfix' ) );

    ?>


    <header class="header-style-two">
        <div class="header-two-logo">
            <div class="container custom-container">
                <div class="path-logo">
                    <?php netfix_header_logo(); ?>
                </div>
            </div>
        </div>
        <div class="header-top-wrap">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-xl-8 col-md-7 col-sm-7">
                        <div class="header-top-left">
                            <ul>
                                <?php if(!empty($netfix_address)) : ?>
                                <li class="d-none d-xxl-flex"><i class="flaticon-location"></i><?php print esc_html($netfix_address); ?></li>
                                <?php endif; ?>

                                <?php if(!empty($netfix_email)) : ?>
                                <li class="d-none d-lg-flex"><i class="flaticon-email"></i> <?php print esc_html($netfix_email); ?></li>
                                <?php endif; ?>

                                <?php if(!empty($netfix_open_hour)) : ?>
                                <li><i class="flaticon-clock"></i> <?php print esc_html($netfix_open_hour); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-5 col-sm-5">
                        <div class="header-top-right">
                            <ul>
                                <?php if(!empty($netfix_login_text)) : ?>
                                <li class="header-user-info">
                                    <i class="flaticon-businessman"></i>
                                    <a href="<?php print esc_url($netfix_login_link); ?>"><?php print esc_html($netfix_login_text); ?></a>
                                </li>
                                <?php endif; ?>

                                <li class="header-social">
                                    <?php netfix_header_social_profiles(); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-top-fixed"></div>
        <div id="sticky-header" class="menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav">
                                <div class="logo">
                                    <?php netfix_header_sticky_logo(); ?>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <?php netfix_header_menu();?>
                                </div>

                                <?php if ( !empty( $netfix_header_right ) ): ?>

                                <?php if (NETFIX_WOOCOMMERCE_ACTIVED) : ?> 
                                <div class="header-action d-md-none">
                                    <ul>
                                        <li class="header-shop-cart"><a href="javascript:void(0);"><i class="flaticon-shopping-cart"></i><span><?php echo esc_html(WC()->cart->cart_contents_count); ?></span></a>

                                            <?php print netfix_shopping_cart(); ?>

                                        </li>
                                    </ul>
                                </div>
                                <?php endif; ?>

                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <?php if (NETFIX_WOOCOMMERCE_ACTIVED) : ?> 
                                        <li class="header-shop-cart"><a href="javascript:void(0);"><i class="flaticon-shopping-cart"></i><span><?php echo esc_html(WC()->cart->cart_contents_count); ?></span></a>

                                            <?php print netfix_shopping_cart(); ?>

                                        </li>
                                        <?php endif; ?>

                                        <?php if(!empty($netfix_phone)) : ?>
                                        <li class="header-phone">
                                            <div class="icon">
                                                <i class="fal fa-mobile-android"></i>
                                            </div>
                                            <div class="content">
                                                <span> <?php print esc_html($netfix_phone_label); ?></span>
                                                <h5 class="number"><a href="tel:<?php print esc_url($netfix_phone); ?>"> <?php print esc_html($netfix_phone); ?></a></h5>
                                            </div>
                                        </li>
                                        <?php endif; ?>

                                        <?php if(!empty($btn_text)) : ?>
                                        <li class="header-btn"><a href="<?php print esc_url($btn_link); ?>" class="btn transparent-btn s-border-btn"><?php print esc_html($btn_text); ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>

                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <nav class="menu-box">
                                <div class="close-btn"><i class="fal fa-times"></i></div>
                                <?php if(!empty($netfix_side_logo_hide)) : ?>
                                <div class="nav-logo">
                                    <a href="<?php print esc_url( home_url( '/' ) );?>" class="mobile_logo">
                                        <img src="<?php print esc_url($netfix_side_logo); ?>" alt="<?php print esc_attr__('Side Logo', 'netfix'); ?>">
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="menu-outer mt-60">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <?php netfix_header_mobile_social_profiles(); ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>



<?php
}




// netfix_side_info
function netfix_side_info() {

    $netfix_side_hide = get_theme_mod( 'netfix_side_hide', false );
    $netfix_side_logo = get_theme_mod( 'netfix_side_logo', get_template_directory_uri() . '/assets/img/logo/logo-black.png' );
    $netfix_login_text = get_theme_mod( 'netfix_login_text', __( 'Login', 'netfix' ) );
    $netfix_login_link = get_theme_mod( 'netfix_login_link', __( '#', 'netfix' ) );
    $netfix_button_text = get_theme_mod( 'netfix_button_text', __( 'Get Started', 'netfix' ) );
    $netfix_button_link = get_theme_mod( 'netfix_button_link', __( '#', 'netfix' ) );

    ?>


   <!-- sidebar area start -->
   <div class="sidebar__area">
      <div class="sidebar__wrapper">
         <div class="sidebar__close">
            <button class="sidebar__close-btn" id="sidebar__close-btn">
               <span><i class="fal fa-times"></i></span>
            </button>
         </div>
         <div class="sidebar__content">
            <div class="logo mb-40">
                <a href="<?php print esc_url( home_url( '/' ) );?>" class="mobile_logo">
                    <img src="<?php print esc_url($netfix_side_logo); ?>" alt="<?php print esc_attr__('Side Logo', 'netfix'); ?>">
                </a>
            </div>

            <div class="mobile-menu fix"></div>

            <?php if ( !empty( $netfix_side_hide ) ): ?>
            <div class="sidebar__search p-relative mt-40 ">
               <form action="<?php print esc_url( home_url( '/' ) );?>">
                  <input type="text" name="s" value="<?php print esc_attr( get_search_query() )?>" placeholder="<?php print esc_attr__( 'Search...', 'netfix' );?>">
                  <button type="submit"><i class="fad fa-search"></i></button>
               </form>
            </div>

            <?php if (netfix_WOOCOMMERCE_ACTIVED): ?>
            <div class="sidebar__cart mt-30">
               <a href="<?php echo wc_get_cart_url(); ?>">
                  <div class="header__cart-icon">
                     <svg viewBox="0 0 24 24">
                        <circle class="st0" cx="9" cy="21" r="1"/>
                        <circle class="st0" cx="20" cy="21" r="1"/>
                        <path class="st0" d="M1,1h4l2.7,13.4c0.2,1,1,1.6,2,1.6h9.7c1,0,1.8-0.7,2-1.6L23,6H6"/>
                     </svg>
                  </div>
                  <span class="cart-item"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>
               </a>
            </div>
            <?php endif;  ?>
            <?php endif;?>
         </div>
      </div>
   </div>
   <!-- sidebar area end -->  

<?php }

/**
 * [netfix_header_lang description]
 * @return [type] [description]
 */
function netfix_header_lang_defualt() {
    $netfix_header_lang = get_theme_mod( 'netfix_header_lang', false );
    if ( $netfix_header_lang ): ?>

    <ul>
        <li><a href="#0" class="lang__btn"><?php print esc_html__( 'EN', 'netfix' );?> <i class="ti-arrow-down"></i></a>
        <?php do_action( 'netfix_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}

/**
 * [netfix_language_list description]
 * @return [type] [description]
 */
function _netfix_language( $mar ) {
    return $mar;
}
function netfix_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul>';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul>';
        $mar .= '<li><a href="#">' . esc_html__( 'USA', 'netfix' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'UK', 'netfix' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'CA', 'netfix' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'AU', 'netfix' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _netfix_language( $mar );
}
add_action( 'netfix_language', 'netfix_language_list' );

// favicon logo
function netfix_favicon_logo_func() {
        $netfix_favicon = get_template_directory_uri() . '/assets/img/favicon.png';
        $netfix_favicon_url = get_theme_mod( 'favicon_url', $netfix_favicon );
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $netfix_favicon_url );?>">

    <?php
}
add_action( 'wp_head', 'netfix_favicon_logo_func' );

// header logo
function netfix_header_logo() {
    ?>
    <?php
        $netfix_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
        $netfix_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
        $netfix_logo_white = get_template_directory_uri() . '/assets/img/logo/logo-white.png';

        $netfix_site_logo = get_theme_mod( 'logo', $netfix_logo );
        $netfix_secondary_logo = get_theme_mod( 'seconday_logo', $netfix_logo_white );
    ?>

        <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                if ( !empty( $netfix_logo_on ) ) {
                    ?>
                        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                            <img src="<?php print esc_url( $netfix_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'netfix' );?>" />
                        </a>
                    <?php
                } else {
                    ?>
                        <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                            <img src="<?php print esc_url( $netfix_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'netfix' );?>" />
                        </a>
                    <?php
                }
            }
        ?>
    <?php
}


// header logo
function netfix_header_sticky_logo() {
    ?>
    <?php
        $netfix_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
        $netfix_site_logo = get_theme_mod( 'logo_sticky', $netfix_logo );
    ?>

    <?php
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
        ?>
            <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                <img src="<?php print esc_url( $netfix_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'netfix' );?>" />
            </a>
        <?php

        }
    ?>
    <?php
}



function netfix_mobile_logo() {
    // side info
    $netfix_mobile_logo_hide = get_theme_mod( 'netfix_mobile_logo_hide', false );

    $netfix_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );

    ?>

    <?php if ( !empty( $netfix_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $netfix_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'netfix' );?>" />
        </a>
    </div>
    <?php endif;?>



<?php }

/**
 * [netfix_header_social_profiles description]
 * @return [type] [description]
 */
function netfix_header_social_profiles() {
    $netfix_topbar_fb_url = get_theme_mod( 'netfix_topbar_fb_url', __( '#', 'netfix' ) );
    $netfix_topbar_twitter_url = get_theme_mod( 'netfix_topbar_twitter_url', __( '#', 'netfix' ) );
    $netfix_topbar_instagram_url = get_theme_mod( 'netfix_topbar_instagram_url', __( '#', 'netfix' ) );
    $netfix_topbar_linkedin_url = get_theme_mod( 'netfix_topbar_linkedin_url', __( '#', 'netfix' ) );
    $netfix_topbar_youtube_url = get_theme_mod( 'netfix_topbar_youtube_url', __( '#', 'netfix' ) );
    ?>

        <?php if ( !empty( $netfix_topbar_fb_url ) ): ?>
         <a href="<?php print esc_url( $netfix_topbar_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_twitter_url ) ): ?>
         <a href="<?php print esc_url( $netfix_topbar_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_instagram_url ) ): ?>
         <a href="<?php print esc_url( $netfix_topbar_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_linkedin_url ) ): ?>
         <a href="<?php print esc_url( $netfix_topbar_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_youtube_url ) ): ?>
         <a href="<?php print esc_url( $netfix_topbar_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a>
        <?php endif;?>

<?php
}

/**
 * [netfix_header_mobile_social_profiles description]
 * @return [type] [description]
 */
function netfix_header_mobile_social_profiles() {
    $netfix_topbar_fb_url = get_theme_mod( 'netfix_topbar_fb_url', __( '#', 'netfix' ) );
    $netfix_topbar_twitter_url = get_theme_mod( 'netfix_topbar_twitter_url', __( '#', 'netfix' ) );
    $netfix_topbar_instagram_url = get_theme_mod( 'netfix_topbar_instagram_url', __( '#', 'netfix' ) );
    $netfix_topbar_linkedin_url = get_theme_mod( 'netfix_topbar_linkedin_url', __( '#', 'netfix' ) );
    $netfix_topbar_youtube_url = get_theme_mod( 'netfix_topbar_youtube_url', __( '#', 'netfix' ) );
    ?>

        <?php if ( !empty( $netfix_topbar_fb_url ) ): ?>
         <li>
            <a href="<?php print esc_url( $netfix_topbar_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a>
         </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_twitter_url ) ): ?>
         <li>
            <a href="<?php print esc_url( $netfix_topbar_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a>
         </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_instagram_url ) ): ?>
         <li>
            <a href="<?php print esc_url( $netfix_topbar_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a>
         </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_linkedin_url ) ): ?>
         <li>
            <a href="<?php print esc_url( $netfix_topbar_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a>
         </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_topbar_youtube_url ) ): ?>
         <li>
            <a href="<?php print esc_url( $netfix_topbar_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a>
         </li>
        <?php endif;?>

<?php
}

function netfix_footer_social_profiles() {
    $netfix_footer_fb_url = get_theme_mod( 'netfix_footer_fb_url', __( '#', 'netfix' ) );
    $netfix_footer_twitter_url = get_theme_mod( 'netfix_footer_twitter_url', __( '#', 'netfix' ) );
    $netfix_footer_instagram_url = get_theme_mod( 'netfix_footer_instagram_url', __( '#', 'netfix' ) );
    $netfix_footer_linkedin_url = get_theme_mod( 'netfix_footer_linkedin_url', __( '#', 'netfix' ) );
    $netfix_footer_youtube_url = get_theme_mod( 'netfix_footer_youtube_url', __( '#', 'netfix' ) );
    ?>

        <ul>
        <?php if ( !empty( $netfix_footer_fb_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $netfix_footer_fb_url );?>">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_footer_twitter_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $netfix_footer_twitter_url );?>">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_footer_instagram_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $netfix_footer_instagram_url );?>">
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_footer_linkedin_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $netfix_footer_linkedin_url );?>">
                    <i class="fab fa-linkedin"></i>
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif;?>

        <?php if ( !empty( $netfix_footer_youtube_url ) ): ?>
            <li>
                <a href="<?php print esc_url( $netfix_footer_youtube_url );?>">
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif;?>
        </ul>
<?php
}

/**
 * [netfix_header_menu description]
 * @return [type] [description]
 */
function netfix_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => 'navigation',
            'container'      => '',
            'fallback_cb'    => 'Navwalker_Class::fallback',
            'walker'         => new Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [netfix_header_menu description]
 * @return [type] [description]
 */
function netfix_mobile_menu() {
    ?>
    <?php
        $netfix_menu = wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'menu_id'        => 'mobile-menu-active',
            'echo'           => false,
        ] );

    $netfix_menu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $netfix_menu );
        echo wp_kses_post( $netfix_menu );
    ?>
    <?php
}

/**
 * [netfix_search_menu description]
 * @return [type] [description]
 */
function netfix_header_search_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-search-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Navwalker_Class::fallback',
            'walker'         => new Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [netfix_footer_menu description]
 * @return [type] [description]
 */
function netfix_footer_menu() {
    wp_nav_menu( [
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0',
        'container'      => '',
        'fallback_cb'    => 'Navwalker_Class::fallback',
        'walker'         => new Navwalker_Class,
    ] );
}


/**
 * [netfix_category_menu description]
 * @return [type] [description]
 */
function netfix_category_menu() {
    wp_nav_menu( [
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Navwalker_Class::fallback',
        'walker'         => new Navwalker_Class,
    ] );
}

/**
 *
 * netfix footer
 */
add_action( 'netfix_footer_style', 'netfix_check_footer', 10 );

function netfix_check_footer() {
    $netfix_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
    $netfix_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

    if ( $netfix_footer_style == 'footer-style-1' ) {
        netfix_footer_style_1();
    } elseif ( $netfix_footer_style == 'footer-style-2' ) {
        netfix_footer_style_2();
    }  
    else {

        /** default footer style **/
        if ( $netfix_default_footer_style == 'footer-style-2' ) {
            netfix_footer_style_2();
        } 
        else {
            netfix_footer_style_1();
        }

    }
}

/**
 * footer  style_defaut
 */
function netfix_footer_style_1() {

    $footer_bg_img = get_theme_mod( 'netfix_footer_bg' );
    $netfix_footer_logo = get_theme_mod( 'netfix_footer_logo' );
    $netfix_footer_top_space = function_exists('get_field') ? get_field('netfix_footer_top_space') : '0';
    $netfix_copyright_center = $netfix_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $netfix_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'netfix_footer_bg' ) : '';
    $netfix_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'netfix_footer_bg_color' ) : '';
    $footer_bg_color = get_theme_mod( 'netfix_footer_bg_color' );

    $netfix_footer_logo_default = get_template_directory_uri() . '/assets/img/logo/w_logo.png';
    $netfix_footer_logo = get_theme_mod( 'footer_logo', $netfix_footer_logo_default );

    // bg image
    $bg_img = !empty( $netfix_footer_bg_url_from_page['url'] ) ? $netfix_footer_bg_url_from_page['url'] : $footer_bg_img;

    // bg color
    $bg_color = !empty( $netfix_footer_bg_color_from_page ) ? $netfix_footer_bg_color_from_page : $footer_bg_color;


    // footer_columns
    $footer_columns = 0;
    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-' . $num ) ) {
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-lg-3 col-md-6 col-sm-6';
        $footer_class[2] = 'col-lg-3 col-md-6 col-sm-6';
        $footer_class[3] = 'col-lg-3 col-md-6 col-sm-6';
        $footer_class[4] = 'col-lg-3 col-md-6 col-sm-6';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
    }

    ?>

    <!-- footer area start --> 

    <footer data-bg-color="<?php print esc_attr( $bg_color );?>" data-top-space="<?php print esc_attr($netfix_footer_top_space); ?>px"  data-background="<?php print esc_url( $bg_img );?>">

        <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') OR is_active_sidebar('footer-3-5') ): ?>
        <div class="footer-wrap pt-120 pb-70">
            <div class="container">
                <div class="row g-0">
                    <?php
                        if ( $footer_columns < 5 ) {
                        print '<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">';
                        dynamic_sidebar( 'footer-1' );
                        print '</div>';

                        print '<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">';
                        dynamic_sidebar( 'footer-2' );
                        print '</div>';

                        print '<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">';
                        dynamic_sidebar( 'footer-3' );
                        print '</div>';

                        print '<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">';
                        dynamic_sidebar( 'footer-4' );
                        print '</div>';
                        } else {
                            for ( $num = 1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-' . $num ) ) {
                                    continue;
                                }
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-' . $num );
                                print '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="footer-logo">
                            <a href="<?php print esc_url( home_url( '/' ) );?>"><img src="<?php print esc_url( $netfix_footer_logo );?>" alt="<?php print esc_attr__( 'logo', 'netfix' );?>"></a>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="copyright-text text-center text-md-end">
                            <p><?php print netfix_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php
}

/**
 * footer  style 2
 */
function netfix_footer_style_2() {
    $footer_bg_img = get_theme_mod( 'netfix_footer_bg' );
    $netfix_footer_logo = get_theme_mod( 'netfix_footer_logo' );
    $netfix_footer_top_space = function_exists('get_field') ? get_field('netfix_footer_top_space') : '0';
    $netfix_copyright_center = $netfix_footer_logo ? 'col-lg-4 offset-lg-4 col-md-6 text-right' : 'col-lg-12 text-center';
    $netfix_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'netfix_footer_bg' ) : '';
    $netfix_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'netfix_footer_bg_color' ) : '';
    $footer_bg_color = get_theme_mod( 'netfix_footer_bg_color' );

    $netfix_footer_logo_default = get_template_directory_uri() . '/assets/img/logo/w_logo.png';
    $netfix_footer_logo = get_theme_mod( 'footer_logo', $netfix_footer_logo_default );

    // bg image
    $bg_img = !empty( $netfix_footer_bg_url_from_page['url'] ) ? $netfix_footer_bg_url_from_page['url'] : $footer_bg_img;

    // bg color
    $bg_color = !empty( $netfix_footer_bg_color_from_page ) ? $netfix_footer_bg_color_from_page : $footer_bg_color;


    $footer_columns = 0;
    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        if ( is_active_sidebar( 'footer-2-' . $num ) ) {
            $footer_columns++;
        }
    }

    switch ( $footer_columns ) {
    case '1':
        $footer_class[1] = 'col-lg-12';
        break;
    case '2':
        $footer_class[1] = 'col-lg-6 col-md-6';
        $footer_class[2] = 'col-lg-6 col-md-6';
        break;
    case '3':
        $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
        $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
        $footer_class[3] = 'col-xl-4 col-lg-6';
        break;
    case '4':
        $footer_class[1] = 'col-xxl-3 col-xl-3 col-lg-3 col-sm-6';
        $footer_class[2] = 'col-xxl-3 col-xl-3 col-lg-3 col-sm-6';
        $footer_class[3] = 'col-xxl-3 col-xl-3 col-lg-3 col-sm-6';
        $footer_class[4] = 'col-xxl-3 col-xl-3 col-lg-3 col-sm-6';
        break;
    case '5':
        $footer_class[1] = 'col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        $footer_class[2] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[3] = 'col-xxl-3 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[4] = 'col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6';
        $footer_class[5] = 'col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6';
        break;
    default:
        $footer_class = 'col-xl-3 col-lg-3 col-md-6';
        break;
    }

    ?>

    <!-- footer area start -->

    <footer data-bg-color="<?php print esc_attr( $bg_color );?>" data-top-space="<?php print esc_attr($netfix_footer_top_space); ?>px"             data-background="<?php print esc_url( $bg_img );?>">
        <?php if ( is_active_sidebar( 'footer-2-1' ) OR is_active_sidebar( 'footer-2-2' ) OR is_active_sidebar( 'footer-2-3' ) OR is_active_sidebar( 'footer-2-4' ) ): ?>
        <div class="footer-wrap">
            <div class="container">
                <div class="row g-0">
                    <?php
                        if ( $footer_columns < 5 ) {
                        print '<div class="col-3">';
                        dynamic_sidebar( 'footer-2-1' );
                        print '</div>';

                        print '<div class="col-2">';
                        dynamic_sidebar( 'footer-2-2' );
                        print '</div>';

                        print '<div class="col-2">';
                        dynamic_sidebar( 'footer-2-3' );
                        print '</div>';

                        print '<div class="col-1">';
                        dynamic_sidebar( 'footer-2-4' );
                        print '</div>';
                        } else {
                            for ( $num = 1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-2-' . $num ) ) {
                                    continue;
                                }
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-2-' . $num );
                                print '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="footer-logo">
                            <a href="<?php print esc_url( home_url( '/' ) );?>"><img src="<?php print esc_url( $netfix_footer_logo );?>" alt="<?php print esc_attr__( 'logo', 'netfix' );?>"></a>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="copyright-text text-center text-md-end">
                            <p><?php print netfix_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

<?php
}




// netfix_copyright_text
function netfix_copyright_text() {
    if ( rtl_enable() ) {
        print get_theme_mod( 'netfix_copyright_rtl', esc_html__( 'Copyrighted by @Bdevs - All Right Reserved', 'netfix' ) );
    } else {
        print get_theme_mod( 'netfix_copyright', esc_html__( 'Copyrighted by @Bdevs - All Right Reserved', 'netfix' ) );
    }
}



/**
 * [netfix_breadcrumb_func description]
 * @return [type] [description]
 */
function netfix_breadcrumb_func() {

    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image') : '';

    if ( is_front_page() && is_home() ) {
        $title = get_theme_mod( 'breadcrumb_blog_title', __( 'Blog', 'netfix' ) );
        $breadcrumb_class = 'home_front_page';
    } elseif ( is_front_page() ) {
        $title = get_theme_mod( 'breadcrumb_blog_title', __( 'Blog', 'netfix' ) );
        $breadcrumb_show = 0;

    } elseif ( is_home() ) {
        if ( get_option( 'page_for_posts' ) ) {
            $title = get_the_title( get_option( 'page_for_posts' ) );
            $id = get_option( 'page_for_posts' );
            $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $id) : '';
            $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $id) : '';
            $back_title = function_exists('get_field') ? get_field('breadcrumb_back_title') : '';
        }
    } elseif ( is_single() && 'post' == get_post_type() ) {
        if ( rtl_enable() ) {
            $title = get_theme_mod( 'breadcrumb_blog_title_details_rtl', __( 'Blog', 'netfix' ) );
        } else {
            $title = get_the_title();
        }

    } elseif ( is_single() && 'product' == get_post_type() ) {
        $title = get_theme_mod( 'breadcrumb_product_details', __( 'Shop', 'netfix' ) );
    } elseif ( is_single() && 'bdevs-services' == get_post_type() ) {
        if ( rtl_enable() ) {
            $title = get_the_title();
        } else {
            $title = get_the_title();
        }

    } elseif ( is_single() && 'bdevs-doctor' == get_post_type() ) {
        if ( rtl_enable() ) {
            $title = get_the_title();
        } else {
            $title = get_the_title();
        }

    } elseif ( is_single() && 'bdevs-cases' == get_post_type() ) {
        if ( rtl_enable() ) {
            $title = get_the_title();
        } else {
            $title = get_the_title();
        }

    } elseif ( is_search() ) {
        $title = esc_html__( 'Search Results for : ', 'netfix' ) . get_search_query();
    } elseif ( is_404() ) {
        $title = esc_html__( 'Page not Found', 'netfix' );
    } elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
        $title = get_theme_mod( 'breadcrumb_shop', __( 'Shop', 'netfix' ) );
    } elseif ( is_archive() ) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }


    $_id = get_the_ID();
    if ( is_single() && 'product' == get_post_type() ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( is_home() && get_option( 'page_for_posts' ) ) {
        $_id = get_option( 'page_for_posts' );
    }
    elseif ( function_exists("is_shop") ) { 
        $_id = wc_get_page_id('shop');
    } 
    elseif ( function_exists("is_page") ) { 
        $_id = get_the_ID();
    } 


    $is_breadcrumb = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_breadcrumb') : '';

    if ( empty( $is_breadcrumb ) && $breadcrumb_show == 1 ) {

        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image') : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image') : '';
        // get_theme_mod
        $bg_img = get_theme_mod( 'breadcrumb_bg_img' );

        $netfix_breadcrumb_padding_top = function_exists('get_field') ? get_field('netfix_breadcrumb_padding_top') : '148';
        $netfix_breadcrumb_padding_bottom = function_exists('get_field') ? get_field('netfix_breadcrumb_padding_bottom') : '148'; 

        if ( $hide_bg_img ) {
            $bg_img = '';
        } else {
            $bg_img = !empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
        }
        
        ?>

        <?php    
            $breadcrumb_switch = get_theme_mod('breadcrumb_switch', true); 
        ?>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg <?php print esc_attr( $breadcrumb_class );?>" data-background="<?php print esc_attr($bg_img);?>" data-top-space="<?php print esc_attr($netfix_breadcrumb_padding_top); ?>px" data-bottom-space="<?php print esc_attr($netfix_breadcrumb_padding_bottom); ?>px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="breadcrumb-content">
                            <h3 class="title"><?php echo wp_kses_post( $title ); ?></h3>
                            <?php netfix_breadcrumb_callback(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <?php
}
}
add_action( 'netfix_before_main_content', 'netfix_breadcrumb_func' );

function netfix_breadcrumb_callback() {
    $args = [
        'show_browse'   => false,
        'post_taxonomy' => ['product' => 'product_cat'],
    ];
    $breadcrumb = new Breadcrumb_Class( $args );

    return $breadcrumb->trail();
}



// netfix_search_form
function netfix_search_form() {
    ?>
     <div class="search-wrapper p-relative transition-3 d-none">
         <div class="search-form transition-3">
             <form method="get" action="<?php print esc_url( home_url( '/' ) );?>" >
                 <input type="search" name="s" value="<?php print esc_attr( get_search_query() )?>" placeholder="<?php print esc_attr__( 'Enter Your Keyword', 'netfix' );?>" >
                 <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
             </form>
             <a href="javascript:void(0);" class="search-close"><i class="far fa-times"></i></a>
         </div>
     </div>
   <?php
}

add_action( 'netfix_before_main_content', 'netfix_search_form' );


/**
 *
 * pagination
 */
if ( !function_exists( 'netfix_pagination' ) ) {

    function _netfix_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function netfix_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _netfix_pagi_callback( $pagi );
    }
}

// rtl_enable
function rtl_enable() {
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable = get_theme_mod( 'rtl_switch', false );
    if ( $my_current_lang != 'en' && $rtl_enable ) {
        return true;
    } else {
        return false;
    }
}

// header top bg color
function netfix_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'netfix_breadcrumb_bg_color', '#222' );
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'netfix-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'netfix_breadcrumb_bg_color' );

// breadcrumb-spacing top
function netfix_breadcrumb_spacing() {
    $padding_px = get_theme_mod( 'netfix_breadcrumb_spacing', '160px' );
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style( 'netfix-breadcrumb-top-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'netfix_breadcrumb_spacing' );

// breadcrumb-spacing bottom
function netfix_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod( 'netfix_breadcrumb_bottom_spacing', '160px' );
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style( 'netfix-breadcrumb-bottom-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'netfix_breadcrumb_bottom_spacing' );

// scrollup
function netfix_scrollup_switch() {
    $scrollup_switch = get_theme_mod( 'netfix_scrollup_switch', false );
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', [] );
    if ( $scrollup_switch ) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style( 'netfix-scrollup-switch', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'netfix_scrollup_switch' );

// theme color
function netfix_custom_color() {
    $color_code = get_theme_mod( 'netfix_color_option', '#df0e0e' );
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".header-shop-cart a span, .pricing-thumb .net-speed, .video-paly a:hover, .special-offer-mbps, .streaming-thumb .tag, .streaming-thumb .popup-video:hover, .scroll-top, .pricing-item-3rd div.pricing-two-item::before, .pricing-two-content .pricing-btn .btn-link:hover, .subscribe-two-bg .overlay-price, .streaming-two-thumb .tag, .streaming-two-thumb .popup-video:hover, .services-sidebar-list li a::before, .sidebar-doc-download > .title span::after, .basic-pagination ul li .page-numbers.current, .basic-pagination ul li .page-numbers:hover, .sidebar-widget-title::before, .tagcloud a:hover, blockquote cite::before, .best-team-images .overlay-content, .shop-sidebar .woocommerce-product-search button, product-desc-wrap .nav-item .nav-link::after, .product-desc-wrap .nav-item .nav-link::after, .woocommerce .shop-item .button, .woocommerce .shop-item .button:hover, .woocommerce .shop-item .added_to_cart.wc-forward, .woocommerce .shop-item .added_to_cart.wc-forward:hover, .header-mini-cart .woocommerce-mini-cart__buttons .button, .progress-fill, .btn-main, .btn.transparent-btn.b-border-btn::before, .btn.c-border-btn, .k-cart-btn { background: " . $color_code . "}";

        $custom_css .= ".header-top-left ul li i, .header-user-info i, .header-social a:hover, .navbar-wrap > ul > li.active > a, .navbar-wrap > ul > li:hover > a, .mobile-menu .navigation li.active > a, .banner-price .price, .banner-phone .content .number, .banner-phone .icon, a:hover, ul.pricing-list li i, .price-wrap .price, .pricing-item:hover .pricing-btn .btn-link, .video-paly a, .fact-item .title, .services-icon, .btn.btn-link, .cta-btn-wrap, .special-price, .special-price-wrap .trial-link i, .special-price-wrap .trial-link a:hover, .subscribe-content .title, .streaming-thumb .popup-video, .streaming-time > p span, .blog-post-meta li i, .footer-call .icon, .footer-social a:hover, .footer-widget ul li a:hover, .fw-schedule-list li span.close, .header-phone .icon, .header-phone .content .number, .pricing-three-head .devices-support, .devices-icon-wrap li, .streaming-two-title .sub-title, .streaming-two-thumb .popup-video, .blog-post-meta li a:hover, a, button, .counter-item .title, .blog__wrapper ul li a:hover, .blog__wrapper ul li a:hover, .widget li a:hover, .widget-post-title a:hover, .blog-sidebar .sidebar__widget-px button:hover, blockquote::before, .logged-in-as a:hover, .team-content .team-social li a:hover, .shop-sidebar .product-categories li a:hover, .shop-sidebar .tagcloud a:hover, .shop-item-content .price, .details-pro-price ins, .contact-info-list li i, .live-chat .icon, .contact-info-list li a:hover, .details-pro-price, .btn.transparent-btn.b-border-btn { color: " . $color_code . "}";

        $custom_css .= ".navbar-wrap > ul > li .sub-menu li a::before, .pricing-two-content .pricing-btn .btn-link:hover, .tagcloud a:hover, .contact-form .form-grp input:focus, .contact-form .form-grp textarea:focus, .contact-form .form-select:focus, .btn.transparent-btn.b-border-btn { border-color: " . $color_code . "}";

        $custom_css .= ".services-sidebar-list li a::after { border-color: transparent transparent transparent ".$color_code." }";
        wp_add_inline_style( 'netfix-custom', $custom_css );

    }
}
add_action( 'wp_enqueue_scripts', 'netfix_custom_color' );


// Secondary color
function netfix_secondary_color() {
    $color_code = get_theme_mod( 'netfix_secondary_color', '#0c31ac' );
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".woocommerce .shop-item .button::before, .woocommerce .shop-item .added_to_cart.wc-forward::before, .header-action .header-btn .transparent-btn.s-border-btn::before, .rev-btn button, .btn.c-border-btn::before, .scroll-top:hover, .k-cart-btn:before { background: " . $color_code . "}";

        $custom_css .= ".subscribe-plan .price, .rev-btn button:hover, .subscribe-plan, .btn.transparent-btn.s-border-btn, .subscribe-plan .btn:hover { color: " . $color_code . "}";

        $custom_css .= ".subscribe-plan .price, .rev-btn button, .product-review-box textarea:focus, .btn.transparent-btn.s-border-btn { border-color: " . $color_code . "}";
        wp_add_inline_style( 'netfix-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'netfix_secondary_color' );


// netfix_header_menu_color
function netfix_header_menu_color() {
    $color_code = get_theme_mod( 'netfix_header_menu_color', '#0c31ac' );
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".menu-btn::before { background: " . $color_code . "}";

        $custom_css .= ".menu-btn { color: " . $color_code . "}";

        $custom_css .= ".menu-btn { border-color: " . $color_code . "}";
        wp_add_inline_style( 'netfix-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'netfix_header_menu_color' );

// Logo size 
function netfix_logo_size(){
    $logo_size = get_theme_mod( 'netfix_logo_size','191px');
    wp_enqueue_style( 'netfix-custom', NETFIX_THEME_CSS_DIR . 'netfix-custom.css', array());
    if($logo_size!=''){
        $custom_css = '';
        $custom_css .= ".standard-logo img { width: ".$logo_size."px}";
        wp_add_inline_style('netfix-custom',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'netfix_logo_size');


// netfix_kses_intermediate
function netfix_kses_intermediate( $string = '' ) {
    return wp_kses( $string, netfix_get_allowed_html_tags( 'intermediate' ) );
}

function netfix_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}

function netfix_shopping_cart()
{
    ob_start();
    ?>
    <div class="header-mini-cart"></div>
    <?php
    return ob_get_clean();
}