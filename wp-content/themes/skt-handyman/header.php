<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Handyman
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--HEADER INFO AREA STARTS-->
<?php 
$top_tagline = get_theme_mod('top_tagline');
$fb_link = get_theme_mod('fb_link'); 
$twitt_link = get_theme_mod('twitt_link');
$gplus_link = get_theme_mod('gplus_link');
$youtube_link = get_theme_mod('youtube_link');
$instagram_link = get_theme_mod('instagram_link');
$linked_link = get_theme_mod('linked_link');
$hidetopbarinfo = get_theme_mod('hide_top_bar_info', 1);
if( $hidetopbarinfo == '') { ?>
<div class="head-info-area">
<div class="center">
<div class="left">
<?php if(!empty($top_tagline)){?>
<span class="taglinetp">  
<?php echo esc_html($top_tagline); ?>
</span>
<?php } ?>
</div> 
<div class="right">
<div class="social-icons">
<?php 
if (!empty($fb_link)) { ?>
<a title="<?php echo esc_attr__('facebook','skt-handyman'); ?>" class="fb" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a> 
<?php } 		
if (!empty($twitt_link)) { ?>
<a title="<?php echo esc_attr__('twitter','skt-handyman'); ?>" class="tw" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
<?php } 
if (!empty($gplus_link)) { ?>
<a title="<?php echo esc_attr__('google-plus','skt-handyman'); ?>" class="gp" target="_blank" href="<?php echo esc_url($gplus_link); ?>"></a>
<?php } 
if (!empty($youtube_link)) { ?>
<a title="<?php echo esc_attr__('youtube-link','skt-handyman'); ?>" class="tube" target="_blank" href="<?php echo esc_url($youtube_link); ?>"></a>
<?php }  
if (!empty($instagram_link)) { ?>
<a title="<?php echo esc_attr__('instagram-link','skt-handyman'); ?>" class="insta" target="_blank" href="<?php echo esc_url($instagram_link); ?>"></a>
<?php } 
if (!empty($linked_link)) { ?> 
<a title="<?php echo esc_attr__('linkedin','skt-handyman'); ?>" class="in" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
<?php } ?>                   
</div>
</div>
<div class="clear"></div>                
</div>
</div>
<?php } ?>
<!--HEADER INFO AREA ENDS-->
<div class="header">
  <div class="container">
    <div class="logo">
		<?php skt_handyman_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
    </div> 
<?php 
	$email_add = get_theme_mod('email_add'); 
	$contact_no = get_theme_mod('contact_no'); 
	$contact_top_address = get_theme_mod('contact_top_address'); 
	$contact_top_address_two = get_theme_mod('contact_top_address_two'); 
	$hidetopbar = get_theme_mod('hide_header_topbar', 1);
if( $hidetopbar == '') { ?>    
    <div class="header-right"> 
        <div class="emltp"><?php if(!empty($contact_no)){ if ( is_rtl() ) {?><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-phone-rtl.png" alt="" /><?php } else{?><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-phone.png" alt="" /><?php } ?>
        <strong><?php echo esc_html($contact_no); ?></strong><?php } ?>  <?php if(!empty($email_add)){ ?><span><?php echo esc_html( antispambot( $email_add ) ); ?></span><?php } ?></div>
        <div class="sintp"><?php if(!empty($contact_top_address)){?><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-home.png" alt="" /> <strong><?php echo esc_html($contact_top_address); ?></strong><?php } ?><?php if(!empty($contact_top_address_two)){?><span><?php echo esc_html($contact_top_address_two); ?></span><?php } ?></div>
        <div class="clear"></div>                
    </div>
<?php } ?>    
    <div class="clear"></div>
    <div id="topmenu">
    	         <div class="toggle"><a class="toggleMenu" href="#" style="display:none;"><?php esc_attr_e('Menu','skt-handyman'); ?></a></div> 
        <div class="sitenav">
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>         
        </div><!-- .sitenav--> 
    </div>
  </div> <!-- container -->
  <div class="clear"></div>
</div><!--.header -->
<div class="clear"></div>