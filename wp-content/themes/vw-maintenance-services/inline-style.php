<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_maintenance_services_first_color = get_theme_mod('vw_maintenance_services_first_color');

	$vw_maintenance_services_custom_css = '';

	if($vw_maintenance_services_first_color != false){
		$vw_maintenance_services_custom_css .='#topbar .custom-social-icons i:hover, .search-box i:hover, .top-btn:hover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .view-more, .scrollup i, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer .tagcloud a:hover, #footer-2, .pagination span, .pagination a, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .main-navigation a:hover, #comments a.comment-reply-link, #footer a.custom_read_more, #sidebar a.custom_read_more{';
			$vw_maintenance_services_custom_css .='background-color: '.esc_html($vw_maintenance_services_first_color).';';
		$vw_maintenance_services_custom_css .='}';
	}
	if($vw_maintenance_services_first_color != false){
		$vw_maintenance_services_custom_css .='.left-services:hover a, .right-services:hover a, #footer li a:hover, .post-main-box:hover h2, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation ul.sub-menu a:hover{';
			$vw_maintenance_services_custom_css .='color: '.esc_html($vw_maintenance_services_first_color).';';
		$vw_maintenance_services_custom_css .='}';
	}
	if($vw_maintenance_services_first_color != false){
		$vw_maintenance_services_custom_css .='#topbar .custom-social-icons i:hover{';
			$vw_maintenance_services_custom_css .='border-color: '.esc_html($vw_maintenance_services_first_color).';';
		$vw_maintenance_services_custom_css .='}';
	}
	if($vw_maintenance_services_first_color != false){
		$vw_maintenance_services_custom_css .='.post-info hr{';
			$vw_maintenance_services_custom_css .='border-top-color: '.esc_html($vw_maintenance_services_first_color).';';
		$vw_maintenance_services_custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_maintenance_services_second_color = get_theme_mod('vw_maintenance_services_second_color');

	if($vw_maintenance_services_second_color != false){
		$vw_maintenance_services_custom_css .='.search-box i, .top-btn, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .view-more:hover, #footer input[type="submit"], input[type="submit"], .pagination .current, .pagination a:hover, #sidebar .custom-social-icons i:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer .more-button a:hover, #sidebar .more-button a:hover{';
			$vw_maintenance_services_custom_css .='background-color: '.esc_html($vw_maintenance_services_second_color).';';
		$vw_maintenance_services_custom_css .='}';
	}
	if($vw_maintenance_services_second_color != false){
		$vw_maintenance_services_custom_css .='a, #sidebar caption, .post-navigation a, .woocommerce-message::before, .woocommerce .quantity .qty, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_maintenance_services_custom_css .='color: '.esc_html($vw_maintenance_services_second_color).';';
		$vw_maintenance_services_custom_css .='}';
	}
	if($vw_maintenance_services_second_color != false){
		$vw_maintenance_services_custom_css .='.woocommerce .quantity .qty{';
			$vw_maintenance_services_custom_css .='border-color: '.esc_html($vw_maintenance_services_second_color).';';
		$vw_maintenance_services_custom_css .='}';
	}
	if($vw_maintenance_services_second_color != false){
		$vw_maintenance_services_custom_css .='.woocommerce-message, .main-navigation ul ul{';
			$vw_maintenance_services_custom_css .='border-top-color: '.esc_html($vw_maintenance_services_second_color).';';
		$vw_maintenance_services_custom_css .='}';
	}
	if($vw_maintenance_services_second_color != false){
		$vw_maintenance_services_custom_css .='.main-navigation ul ul, .header-fixed{';
			$vw_maintenance_services_custom_css .='border-bottom-color: '.esc_html($vw_maintenance_services_second_color).';';
		$vw_maintenance_services_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_maintenance_services_theme_lay = get_theme_mod( 'vw_maintenance_services_width_option','Full Width');
    if($vw_maintenance_services_theme_lay == 'Boxed'){
		$vw_maintenance_services_custom_css .='body{';
			$vw_maintenance_services_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_maintenance_services_custom_css .='}';
		$vw_maintenance_services_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_maintenance_services_custom_css .='width: 97%;';
		$vw_maintenance_services_custom_css .='}';
	}else if($vw_maintenance_services_theme_lay == 'Wide Width'){
		$vw_maintenance_services_custom_css .='body{';
			$vw_maintenance_services_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_maintenance_services_custom_css .='}';
	}else if($vw_maintenance_services_theme_lay == 'Full Width'){
		$vw_maintenance_services_custom_css .='body{';
			$vw_maintenance_services_custom_css .='max-width: 100%;';
		$vw_maintenance_services_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_maintenance_services_theme_lay = get_theme_mod( 'vw_maintenance_services_slider_opacity_color','0.5');
	if($vw_maintenance_services_theme_lay == '0'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.1'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.1';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.2'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.2';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.3'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.3';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.4'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.4';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.5'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.5';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.6'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.6';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.7'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.7';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.8'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.8';
		$vw_maintenance_services_custom_css .='}';
		}else if($vw_maintenance_services_theme_lay == '0.9'){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='opacity:0.9';
		$vw_maintenance_services_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_maintenance_services_theme_lay = get_theme_mod( 'vw_maintenance_services_slider_content_option','Left');
    if($vw_maintenance_services_theme_lay == 'Left'){
		$vw_maintenance_services_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_maintenance_services_custom_css .='text-align:left; left:10%; right:50%;';
		$vw_maintenance_services_custom_css .='}';
	}else if($vw_maintenance_services_theme_lay == 'Center'){
		$vw_maintenance_services_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_maintenance_services_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_maintenance_services_custom_css .='}';
	}else if($vw_maintenance_services_theme_lay == 'Right'){
		$vw_maintenance_services_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_maintenance_services_custom_css .='text-align:right; left:50%; right:10%;';
		$vw_maintenance_services_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_maintenance_services_slider_height = get_theme_mod('vw_maintenance_services_slider_height');
	if($vw_maintenance_services_slider_height != false){
		$vw_maintenance_services_custom_css .='#slider img{';
			$vw_maintenance_services_custom_css .='height: '.esc_html($vw_maintenance_services_slider_height).';';
		$vw_maintenance_services_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_maintenance_services_slider = get_theme_mod('vw_maintenance_services_slider_hide_show');
	if($vw_maintenance_services_slider == false){
		$vw_maintenance_services_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_maintenance_services_custom_css .='position: static; background: #f3f6fa; padding: 10px 0;';
		$vw_maintenance_services_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_maintenance_services_theme_lay = get_theme_mod( 'vw_maintenance_services_blog_layout_option','Default');
    if($vw_maintenance_services_theme_lay == 'Default'){
		$vw_maintenance_services_custom_css .='.post-main-box{';
			$vw_maintenance_services_custom_css .='';
		$vw_maintenance_services_custom_css .='}';
	}else if($vw_maintenance_services_theme_lay == 'Center'){
		$vw_maintenance_services_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_maintenance_services_custom_css .='text-align:center;';
		$vw_maintenance_services_custom_css .='}';
		$vw_maintenance_services_custom_css .='.post-info{';
			$vw_maintenance_services_custom_css .='margin-top:10px;';
		$vw_maintenance_services_custom_css .='}';
		$vw_maintenance_services_custom_css .='.post-info hr{';
			$vw_maintenance_services_custom_css .='margin:10px auto;';
		$vw_maintenance_services_custom_css .='}';
	}else if($vw_maintenance_services_theme_lay == 'Left'){
		$vw_maintenance_services_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_maintenance_services_custom_css .='text-align:Left;';
		$vw_maintenance_services_custom_css .='}';
		$vw_maintenance_services_custom_css .='.post-info hr{';
			$vw_maintenance_services_custom_css .='margin-bottom:10px;';
		$vw_maintenance_services_custom_css .='}';
		$vw_maintenance_services_custom_css .='.post-main-box h2{';
			$vw_maintenance_services_custom_css .='margin-top:10px;';
		$vw_maintenance_services_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_maintenance_services_res_stickyheader = get_theme_mod( 'vw_maintenance_services_stickyheader_hide_show',false);
    if($vw_maintenance_services_res_stickyheader == true){
    	$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='.header-fixed{';
			$vw_maintenance_services_custom_css .='display:block;';
		$vw_maintenance_services_custom_css .='} }';
	}else if($vw_maintenance_services_res_stickyheader == false){
		$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='.header-fixed{';
			$vw_maintenance_services_custom_css .='display:none;';
		$vw_maintenance_services_custom_css .='} }';
	}

	$vw_maintenance_services_res_slider = get_theme_mod( 'vw_maintenance_services_resp_slider_hide_show',false);
    if($vw_maintenance_services_res_slider == true){
    	$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='#slider{';
			$vw_maintenance_services_custom_css .='display:block;';
		$vw_maintenance_services_custom_css .='} }';
	}else if($vw_maintenance_services_res_slider == false){
		$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='#slider{';
			$vw_maintenance_services_custom_css .='display:none;';
		$vw_maintenance_services_custom_css .='} }';
	}

	$vw_maintenance_services_metabox = get_theme_mod( 'vw_maintenance_services_metabox_hide_show',true);
    if($vw_maintenance_services_metabox == true){
    	$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='.post-info{';
			$vw_maintenance_services_custom_css .='display:block;';
		$vw_maintenance_services_custom_css .='} }';
	}else if($vw_maintenance_services_metabox == false){
		$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='.post-info{';
			$vw_maintenance_services_custom_css .='display:none;';
		$vw_maintenance_services_custom_css .='} }';
	}

	$vw_maintenance_services_sidebar = get_theme_mod( 'vw_maintenance_services_sidebar_hide_show',true);
    if($vw_maintenance_services_sidebar == true){
    	$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='#sidebar{';
			$vw_maintenance_services_custom_css .='display:block;';
		$vw_maintenance_services_custom_css .='} }';
	}else if($vw_maintenance_services_sidebar == false){
		$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='#sidebar{';
			$vw_maintenance_services_custom_css .='display:none;';
		$vw_maintenance_services_custom_css .='} }';
	}

	$vw_maintenance_services_resp_scroll_top = get_theme_mod( 'vw_maintenance_services_resp_scroll_top_hide_show',true);
    if($vw_maintenance_services_resp_scroll_top == true){
    	$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='.scrollup i{';
			$vw_maintenance_services_custom_css .='display:block;';
		$vw_maintenance_services_custom_css .='} }';
	}else if($vw_maintenance_services_resp_scroll_top == false){
		$vw_maintenance_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_maintenance_services_custom_css .='.scrollup i{';
			$vw_maintenance_services_custom_css .='display:none !important;';
		$vw_maintenance_services_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_maintenance_services_sticky_header_padding = get_theme_mod('vw_maintenance_services_sticky_header_padding');
	if($vw_maintenance_services_sticky_header_padding != false){
		$vw_maintenance_services_custom_css .='.header-fixed{';
			$vw_maintenance_services_custom_css .='padding: '.esc_html($vw_maintenance_services_sticky_header_padding).';';
		$vw_maintenance_services_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_maintenance_services_search_padding_top_bottom = get_theme_mod('vw_maintenance_services_search_padding_top_bottom');
	$vw_maintenance_services_search_padding_left_right = get_theme_mod('vw_maintenance_services_search_padding_left_right');
	$vw_maintenance_services_search_font_size = get_theme_mod('vw_maintenance_services_search_font_size');
	$vw_maintenance_services_search_border_radius = get_theme_mod('vw_maintenance_services_search_border_radius');
	if($vw_maintenance_services_search_padding_top_bottom != false || $vw_maintenance_services_search_padding_left_right != false || $vw_maintenance_services_search_font_size != false || $vw_maintenance_services_search_border_radius != false){
		$vw_maintenance_services_custom_css .='.search-box i{';
			$vw_maintenance_services_custom_css .='padding-top: '.esc_html($vw_maintenance_services_search_padding_top_bottom).'; padding-bottom: '.esc_html($vw_maintenance_services_search_padding_top_bottom).';padding-left: '.esc_html($vw_maintenance_services_search_padding_left_right).';padding-right: '.esc_html($vw_maintenance_services_search_padding_left_right).';font-size: '.esc_html($vw_maintenance_services_search_font_size).';border-radius: '.esc_html($vw_maintenance_services_search_border_radius).'px;';
		$vw_maintenance_services_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_maintenance_services_button_padding_top_bottom = get_theme_mod('vw_maintenance_services_button_padding_top_bottom');
	$vw_maintenance_services_button_padding_left_right = get_theme_mod('vw_maintenance_services_button_padding_left_right');
	if($vw_maintenance_services_button_padding_top_bottom != false || $vw_maintenance_services_button_padding_left_right != false){
		$vw_maintenance_services_custom_css .='.content-bttn .view-more{';
			$vw_maintenance_services_custom_css .='padding-top: '.esc_html($vw_maintenance_services_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_maintenance_services_button_padding_top_bottom).';padding-left: '.esc_html($vw_maintenance_services_button_padding_left_right).';padding-right: '.esc_html($vw_maintenance_services_button_padding_left_right).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_button_border_radius = get_theme_mod('vw_maintenance_services_button_border_radius');
	if($vw_maintenance_services_button_border_radius != false){
		$vw_maintenance_services_custom_css .='.content-bttn .view-more{';
			$vw_maintenance_services_custom_css .='border-radius: '.esc_html($vw_maintenance_services_button_border_radius).'px;';
		$vw_maintenance_services_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_maintenance_services_copyright_alingment = get_theme_mod('vw_maintenance_services_copyright_alingment');
	if($vw_maintenance_services_copyright_alingment != false){
		$vw_maintenance_services_custom_css .='.copyright p{';
			$vw_maintenance_services_custom_css .='text-align: '.esc_html($vw_maintenance_services_copyright_alingment).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_copyright_padding_top_bottom = get_theme_mod('vw_maintenance_services_copyright_padding_top_bottom');
	if($vw_maintenance_services_copyright_padding_top_bottom != false){
		$vw_maintenance_services_custom_css .='#footer-2{';
			$vw_maintenance_services_custom_css .='padding-top: '.esc_html($vw_maintenance_services_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_maintenance_services_copyright_padding_top_bottom).';';
		$vw_maintenance_services_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_maintenance_services_scroll_to_top_font_size = get_theme_mod('vw_maintenance_services_scroll_to_top_font_size');
	if($vw_maintenance_services_scroll_to_top_font_size != false){
		$vw_maintenance_services_custom_css .='.scrollup i{';
			$vw_maintenance_services_custom_css .='font-size: '.esc_html($vw_maintenance_services_scroll_to_top_font_size).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_scroll_to_top_padding = get_theme_mod('vw_maintenance_services_scroll_to_top_padding');
	$vw_maintenance_services_scroll_to_top_padding = get_theme_mod('vw_maintenance_services_scroll_to_top_padding');
	if($vw_maintenance_services_scroll_to_top_padding != false){
		$vw_maintenance_services_custom_css .='.scrollup i{';
			$vw_maintenance_services_custom_css .='padding-top: '.esc_html($vw_maintenance_services_scroll_to_top_padding).';padding-bottom: '.esc_html($vw_maintenance_services_scroll_to_top_padding).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_scroll_to_top_width = get_theme_mod('vw_maintenance_services_scroll_to_top_width');
	if($vw_maintenance_services_scroll_to_top_width != false){
		$vw_maintenance_services_custom_css .='.scrollup i{';
			$vw_maintenance_services_custom_css .='width: '.esc_html($vw_maintenance_services_scroll_to_top_width).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_scroll_to_top_height = get_theme_mod('vw_maintenance_services_scroll_to_top_height');
	if($vw_maintenance_services_scroll_to_top_height != false){
		$vw_maintenance_services_custom_css .='.scrollup i{';
			$vw_maintenance_services_custom_css .='height: '.esc_html($vw_maintenance_services_scroll_to_top_height).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_scroll_to_top_border_radius = get_theme_mod('vw_maintenance_services_scroll_to_top_border_radius');
	if($vw_maintenance_services_scroll_to_top_border_radius != false){
		$vw_maintenance_services_custom_css .='.scrollup i{';
			$vw_maintenance_services_custom_css .='border-radius: '.esc_html($vw_maintenance_services_scroll_to_top_border_radius).'px;';
		$vw_maintenance_services_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_maintenance_services_social_icon_font_size = get_theme_mod('vw_maintenance_services_social_icon_font_size');
	if($vw_maintenance_services_social_icon_font_size != false){
		$vw_maintenance_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_maintenance_services_custom_css .='font-size: '.esc_html($vw_maintenance_services_social_icon_font_size).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_social_icon_padding = get_theme_mod('vw_maintenance_services_social_icon_padding');
	if($vw_maintenance_services_social_icon_padding != false){
		$vw_maintenance_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_maintenance_services_custom_css .='padding: '.esc_html($vw_maintenance_services_social_icon_padding).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_social_icon_width = get_theme_mod('vw_maintenance_services_social_icon_width');
	if($vw_maintenance_services_social_icon_width != false){
		$vw_maintenance_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_maintenance_services_custom_css .='width: '.esc_html($vw_maintenance_services_social_icon_width).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_social_icon_height = get_theme_mod('vw_maintenance_services_social_icon_height');
	if($vw_maintenance_services_social_icon_height != false){
		$vw_maintenance_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_maintenance_services_custom_css .='height: '.esc_html($vw_maintenance_services_social_icon_height).';';
		$vw_maintenance_services_custom_css .='}';
	}

	$vw_maintenance_services_social_icon_border_radius = get_theme_mod('vw_maintenance_services_social_icon_border_radius');
	if($vw_maintenance_services_social_icon_border_radius != false){
		$vw_maintenance_services_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_maintenance_services_custom_css .='border-radius: '.esc_html($vw_maintenance_services_social_icon_border_radius).'px;';
		$vw_maintenance_services_custom_css .='}';
	}