<?php
/**
 * The template part for header
 *
 * @package VW Maintenance Services 
 * @subpackage vw_maintenance_services
 * @since VW Maintenance Services 1.0
 */
?>

<div id="header">
	<div class="header-menu <?php if( get_theme_mod( 'vw_maintenance_services_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
		<div class="container">
			<div class="menubar">
				<div class="row m-0">
					<div class="col-lg-9 col-md-9 p-0 col-4">
						<div class="toggle-nav mobile-menu">
						    <button role="tab" onclick="vw_maintenance_services_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_maintenance_services_res_menus_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-maintenance-services'); ?></span></button>
						</div>
						<div id="mySidenav" class="nav sidenav">
				          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-maintenance-services' ); ?>">
				            <?php 
								if(has_nav_menu('primary')){
									wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
									) ); 
								} else {
									wp_nav_menu( array( 
										'container_class' => 'main-menu clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
									) ); 
								}
							?>
				            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_maintenance_services_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_maintenance_services_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-maintenance-services'); ?></span></a>
				          </nav>
	        			</div>
					</div>
					<div class="col-lg-3 col-md-3 pr-0 col-8">
						<?php if( get_theme_mod( 'vw_maintenance_services_top_btn_url') != '' | get_theme_mod( 'vw_maintenance_services_top_btn_text') != '') { ?>
							<div class="top-btn">
								<a href="<?php echo esc_url(get_theme_mod('vw_maintenance_services_top_btn_url',''));?>"><?php echo esc_html(get_theme_mod('vw_maintenance_services_top_btn_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'GET AN APPOINTMENT','vw-maintenance-services' );?></span></a>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>