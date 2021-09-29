<?php
//about theme info
add_action( 'admin_menu', 'skt_handyman_abouttheme' );
function skt_handyman_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-handyman'), esc_html__('About Theme', 'skt-handyman'), 'edit_theme_options', 'skt_handyman_guide', 'skt_handyman_mostrar_guide');   
} 
//guidline for about theme
function skt_handyman_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'skt-handyman'); ?>
		   </div>
          <p><?php esc_attr_e('SKT Handyman is a tools repair template for plumber, electrician, carpenter, craftsman, workshop, garage, painter, renovation, decoration, maid service, cleaning, mechanic, construction, installation, contractor, home remodeling, building, plastering, partitioning, celings, roofing, architecture, interior work, engineering, welding, refurbishment, spare parts, manufacturing and heavy equipments. Responsive WooCommerce friendly.','skt-handyman'); ?></p>
		  <a href="<?php echo esc_url(SKT_HANDYMAN_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_HANDYMAN_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'skt-handyman'); ?></a> | 
				<a href="<?php echo esc_url(SKT_HANDYMAN_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_attr_e('Buy Pro', 'skt-handyman'); ?></a> | 
				<a href="<?php echo esc_url(SKT_HANDYMAN_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'skt-handyman'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_HANDYMAN_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>