<?php
/**
 * The template part for header
 *
 * @package Appointment Booking
 * @subpackage appointment-booking
 * @since appointment-booking 1.0
 */
?>

<div id="header" class="p-2 p-lg-0 p-md-0">
  <div class="container">
    <div class="header-box p-3">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-9 align-self-center">
          <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('appointment_booking_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title py-1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('appointment_booking_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title py-1 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('appointment_booking_tagline_hide_show',false) == 1){ ?>
                <p class="site-description mb-0">
                  <?php echo esc_html($description); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-3 align-self-center">
          <div class="toggle-nav mobile-menu text-md-right my-md-2">
            <button role="tab" onclick="appointment_booking_menu_open_nav()" class="responsivetoggle"><i class="p-3 <?php echo esc_attr(get_theme_mod('appointment_booking_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','appointment-booking'); ?></span></button>
          </div>
          <div id="mySidenav" class="nav sidenav text-right">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'appointment-booking' ); ?>">
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) );
               ?>
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="appointment_booking_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('appointment_booking_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','appointment-booking'); ?></span></a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
