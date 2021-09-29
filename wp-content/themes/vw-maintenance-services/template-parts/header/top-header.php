<?php
/**
 * The template part for top header
 *
 * @package VW Maintenance Services 
 * @subpackage vw_maintenance_services
 * @since VW Maintenance Services 1.0
 */
?>

<div id="topbar">
  <div class="container">
    <div class="row m-0">
      <div class="col-lg-3 col-md-12">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_maintenance_services_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_maintenance_services_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_maintenance_services_tagline_hide_show',true) != ''){ ?>
              <p class="site-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-5 col-md-6">
        <?php dynamic_sidebar('social-links'); ?>
      </div>
      <div class="col-lg-3 col-md-5">
        <?php if( get_theme_mod( 'vw_maintenance_services_header_call_text') != '' | get_theme_mod( 'vw_maintenance_services_header_call') != '') { ?>
          <p class="call-text"><i class="<?php echo esc_attr(get_theme_mod('vw_maintenance_services_phone_no_icon','fas fa-phone')); ?>"></i><?php echo esc_html(get_theme_mod('vw_maintenance_services_header_call_text',''));?></p>
          <p class="call-no"><?php echo esc_html(get_theme_mod('vw_maintenance_services_header_call',''));?></p>
        <?php }?>        
      </div>
      <div class="col-lg-1 col-md-1">
        <?php if( get_theme_mod( 'vw_maintenance_services_search_hide_show',true) != '') { ?>
          <div class="search-box">
            <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
          </div>
        <?php }?>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    </div>
  </div>
</div>