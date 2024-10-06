<?php

	/*-----------------------First highlight color-------------------*/

	$appointment_booking_first_color = get_theme_mod('appointment_booking_first_color');

	$appointment_booking_custom_css= "";

	if($appointment_booking_first_color != false){
		$appointment_booking_custom_css .='.home-page-header, #footer-2, .scrollup i, #sidebar h3, #sidebar .tagcloud a:hover, .pagination span, .pagination a, .widget_product_search button, nav.woocommerce-MyAccount-navigation ul li, .toggle-nav i, #preloader, #sidebar .wp-block-search .wp-block-search__label, #sidebar .wp-block-heading, .bradcrumbs a:hover, .bradcrumbs span, .post-categories li a:hover, .wp-block-tag-cloud a:hover,.woocommerce-account .addresses .title .edit, #footer .tagcloud a:hover{';
			$appointment_booking_custom_css .='background-color: '.esc_html($appointment_booking_first_color).';';
		$appointment_booking_custom_css .='}';
	}

	if($appointment_booking_first_color != false){
		$appointment_booking_custom_css .='.woocommerce span.onsale,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wc-block-components-order-summary-item__quantity{';
			$appointment_booking_custom_css .='background-color: '.esc_html($appointment_booking_first_color).'!important;';
		$appointment_booking_custom_css .='}';
	}

	if($appointment_booking_first_color != false){
		$appointment_booking_custom_css .='.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .main-navigation ul.sub-menu>li>a:before, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .post-info:hover span a, .entry-content a,a.wc-block-components-product-name, .wc-block-components-product-name,wc-block-components-totals-coupon-link,a.wc-block-components-totals-coupon-link{';
			$appointment_booking_custom_css .='color: '.esc_html($appointment_booking_first_color).'!important;';
		$appointment_booking_custom_css .='}';
	}

	if($appointment_booking_first_color != false){
		$appointment_booking_custom_css .='@media screen and (max-width: 1000px){
			.main-navigation a:hover{';
				$appointment_booking_custom_css .='color: '.esc_html($appointment_booking_first_color).'!important;';
		$appointment_booking_custom_css .='} }';
	}

	if($appointment_booking_first_color != false){
		$appointment_booking_custom_css .='#slider .carousel-caption h1,.heading-text hr,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button{';
			$appointment_booking_custom_css .='border-color: '.esc_html($appointment_booking_first_color).'!important;';
		$appointment_booking_custom_css .='}';
	}

	/*---------------- Second highlight color-------------------*/

	$appointment_booking_second_color = get_theme_mod('appointment_booking_second_color');

	if($appointment_booking_second_color != false){
		$appointment_booking_custom_css .='input[type="submit"], #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .more-btn a, #comments input[type="submit"], #comments a.comment-reply-link, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .wp-block-button__link, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, nav.navigation.posts-navigation .nav-previous a, nav.navigation.posts-navigation .nav-next a,a.added_to_cart.wc-forward, .wp-block-woocommerce-cart .wc-block-components-product-badge{';
			$appointment_booking_custom_css .='background-color: '.esc_html($appointment_booking_second_color).';';
		$appointment_booking_custom_css .='}';
	}

	if($appointment_booking_second_color != false){
		$appointment_booking_custom_css .='.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .wp-block-button .wp-block-button__link:hover, .logo .site-title a:hover,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .woocommerce-account .addresses .title .edit:hover,.wc-block-components-checkout-place-order-button:hover,a.added_to_cart.wc-forward:hover, .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover:hover{
			color: '.esc_html($appointment_booking_second_color).' !important;
		}';
	}

	if($appointment_booking_second_color != false){
		$appointment_booking_custom_css .='.more-btn a, nav.navigation.posts-navigation .nav-previous a, nav.navigation.posts-navigation .nav-next a,a.added_to_cart.wc-forward:hover,.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover:hover, .woocommerce-account .addresses .title .edit{
			border-color: '.esc_html($appointment_booking_second_color).';
		}';
	}

	if($appointment_booking_second_color != false){
		$appointment_booking_custom_css .='nav.navigation.posts-navigation .nav-previous a:hover, nav.navigation.posts-navigation .nav-next a:hover, .wp-block-button.is-style-outline a, .wp-block-button .wp-block-button__link:hover,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation a:hover,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover{
			color: '.esc_html($appointment_booking_second_color).'!important;
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_width_option','Full Width');
    if($appointment_booking_theme_lay == 'Boxed'){
		$appointment_booking_custom_css .='body{';
			$appointment_booking_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#slider .carousel-control-prev-icon{';
			$appointment_booking_custom_css .='border-width: 25px 163px 25px 0; top: 42px;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#slider .carousel-control-next-icon{';
			$appointment_booking_custom_css .='border-width: 25px 0 25px 170px; top: 42px;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='right: 100px;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='.scrollup.left i{';
			$appointment_booking_custom_css .='left: 100px;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_theme_lay == 'Wide Width'){
		$appointment_booking_custom_css .='body{';
			$appointment_booking_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='right: 30px;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='.scrollup.left i{';
			$appointment_booking_custom_css .='left: 30px;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_theme_lay == 'Full Width'){
		$appointment_booking_custom_css .='body{';
			$appointment_booking_custom_css .='max-width: 100%;';
		$appointment_booking_custom_css .='}';
	}

	/*----------------- Slider Content Layout -------------------*/

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_slider_content_option','Left');
    if($appointment_booking_theme_lay == 'Left'){
		$appointment_booking_custom_css .='#slider .carousel-caption{';
			$appointment_booking_custom_css .='text-align:left; right: 40%;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_theme_lay == 'Center'){
		$appointment_booking_custom_css .='#slider .carousel-caption{';
			$appointment_booking_custom_css .='text-align:center; right: 25%; left: 25%;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_theme_lay == 'Right'){
		$appointment_booking_custom_css .='#slider .carousel-caption{';
			$appointment_booking_custom_css .='text-align:right; right: 10%; left: 40%;';
		$appointment_booking_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$appointment_booking_slider_content_padding_top_bottom = get_theme_mod('appointment_booking_slider_content_padding_top_bottom');
	$appointment_booking_slider_content_padding_left_right = get_theme_mod('appointment_booking_slider_content_padding_left_right');
	if($appointment_booking_slider_content_padding_top_bottom != false || $appointment_booking_slider_content_padding_left_right != false){
		$appointment_booking_custom_css .='#slider .carousel-caption{';
			$appointment_booking_custom_css .='top: '.esc_attr($appointment_booking_slider_content_padding_top_bottom).'; bottom: '.esc_attr($appointment_booking_slider_content_padding_top_bottom).';left: '.esc_attr($appointment_booking_slider_content_padding_left_right).';right: '.esc_attr($appointment_booking_slider_content_padding_left_right).';';
		$appointment_booking_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$appointment_booking_slider_height = get_theme_mod('appointment_booking_slider_height');
	if($appointment_booking_slider_height != false){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='height: '.esc_attr($appointment_booking_slider_height).';';
		$appointment_booking_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_slider_opacity_color','0.5');
	if($appointment_booking_theme_lay == '0'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.1'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.1';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.2'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.2';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.3'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.3';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.4'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.4';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.5'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.5';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.6'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.6';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.7'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.7';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.8'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.8';
		$appointment_booking_custom_css .='}';
		}else if($appointment_booking_theme_lay == '0.9'){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:0.9';
		$appointment_booking_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$appointment_booking_slider_image_overlay = get_theme_mod('appointment_booking_slider_image_overlay', true);
	if($appointment_booking_slider_image_overlay == false){
		$appointment_booking_custom_css .='#slider img{';
			$appointment_booking_custom_css .='opacity:1;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_slider_image_overlay_color = get_theme_mod('appointment_booking_slider_image_overlay_color', true);
	if($appointment_booking_slider_image_overlay_color != false){
		$appointment_booking_custom_css .='#slider{';
			$appointment_booking_custom_css .='background-color: '.esc_attr($appointment_booking_slider_image_overlay_color).';';
		$appointment_booking_custom_css .='}';
	}


	/*---------------------------Blog Layout -------------------*/

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_blog_layout_option','Default');
    if($appointment_booking_theme_lay == 'Default'){
		$appointment_booking_custom_css .='.post-main-box{';
			$appointment_booking_custom_css .='';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_theme_lay == 'Center'){
		$appointment_booking_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$appointment_booking_custom_css .='text-align:center;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='.post-info{';
			$appointment_booking_custom_css .='margin-top:10px;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_theme_lay == 'Left'){
		$appointment_booking_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$appointment_booking_custom_css .='text-align:Left;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='.post-main-box h2{';
			$appointment_booking_custom_css .='margin-top:10px;';
		$appointment_booking_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$appointment_booking_blog_page_posts_settings = get_theme_mod( 'appointment_booking_blog_page_posts_settings','Into Blocks');
    if($appointment_booking_blog_page_posts_settings == 'Without Blocks'){
		$appointment_booking_custom_css .='.post-main-box{';
			$appointment_booking_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$appointment_booking_custom_css .='}';
	}

	/*--------------------- Grid Posts -------------------*/

	$appointment_booking_display_grid_posts_settings = get_theme_mod( 'appointment_booking_display_grid_posts_settings','Into Blocks');
    if($appointment_booking_display_grid_posts_settings == 'Without Blocks'){
		$appointment_booking_custom_css .='.grid-post-main-box{';
			$appointment_booking_custom_css .='box-shadow: none; border: none; margin:30px 0; background: none;';
		$appointment_booking_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$appointment_booking_resp_slider = get_theme_mod( 'appointment_booking_resp_slider_hide_show',true);
	if($appointment_booking_resp_slider == true && get_theme_mod( 'appointment_booking_slider_arrows', false) == false){
    	$appointment_booking_custom_css .='#slider{';
			$appointment_booking_custom_css .='display:none;';
		$appointment_booking_custom_css .='} ';
	}
    if($appointment_booking_resp_slider == true){
    	$appointment_booking_custom_css .='@media screen and (max-width:575px) {';
		$appointment_booking_custom_css .='#slider{';
			$appointment_booking_custom_css .='display:block;';
		$appointment_booking_custom_css .='} }';
	}else if($appointment_booking_resp_slider == false){
		$appointment_booking_custom_css .='@media screen and (max-width:575px) {';
		$appointment_booking_custom_css .='#slider{';
			$appointment_booking_custom_css .='display:none;';
		$appointment_booking_custom_css .='} }';
	}

	$appointment_booking_resp_sidebar = get_theme_mod( 'appointment_booking_sidebar_hide_show',true);
    if($appointment_booking_resp_sidebar == true){
    	$appointment_booking_custom_css .='@media screen and (max-width:575px) {';
		$appointment_booking_custom_css .='#sidebar{';
			$appointment_booking_custom_css .='display:block;';
		$appointment_booking_custom_css .='} }';
	}else if($appointment_booking_resp_sidebar == false){
		$appointment_booking_custom_css .='@media screen and (max-width:575px) {';
		$appointment_booking_custom_css .='#sidebar{';
			$appointment_booking_custom_css .='display:none;';
		$appointment_booking_custom_css .='} }';
	}

	$appointment_booking_resp_scroll_top = get_theme_mod( 'appointment_booking_resp_scroll_top_hide_show',true);
	if($appointment_booking_resp_scroll_top == true && get_theme_mod( 'appointment_booking_footer_scroll',true) != true){
    	$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='visibility:hidden !important;';
		$appointment_booking_custom_css .='} ';
	}
    if($appointment_booking_resp_scroll_top == true){
    	$appointment_booking_custom_css .='@media screen and (max-width:575px) {';
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='visibility:visible !important;';
		$appointment_booking_custom_css .='} }';
	}else if($appointment_booking_resp_scroll_top == false){
		$appointment_booking_custom_css .='@media screen and (max-width:575px){';
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='visibility:hidden !important;';
		$appointment_booking_custom_css .='} }';
	}

	$appointment_booking_resp_menu_toggle_btn_bg_color = get_theme_mod('appointment_booking_resp_menu_toggle_btn_bg_color');
	if($appointment_booking_resp_menu_toggle_btn_bg_color != false){
		$appointment_booking_custom_css .='.toggle-nav i{';
			$appointment_booking_custom_css .='background-color: '.esc_attr($appointment_booking_resp_menu_toggle_btn_bg_color).';';
		$appointment_booking_custom_css .='}';
	}

	/*---------------- Post Settings ------------------*/

	$appointment_booking_featured_image_border_radius = get_theme_mod('appointment_booking_featured_image_border_radius', 0);
	if($appointment_booking_featured_image_border_radius != false){
		$appointment_booking_custom_css .='.box-image img, .feature-box img{';
			$appointment_booking_custom_css .='border-radius: '.esc_attr($appointment_booking_featured_image_border_radius).'px;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_featured_image_box_shadow = get_theme_mod('appointment_booking_featured_image_box_shadow',0);
	if($appointment_booking_featured_image_box_shadow != false){
		$appointment_booking_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$appointment_booking_custom_css .='box-shadow: '.esc_attr($appointment_booking_featured_image_box_shadow).'px '.esc_attr($appointment_booking_featured_image_box_shadow).'px '.esc_attr($appointment_booking_featured_image_box_shadow).'px #cccccc;';
		$appointment_booking_custom_css .='}';
	}

	// featured image dimention
	$appointment_booking_blog_post_featured_image_dimension = get_theme_mod('appointment_booking_blog_post_featured_image_dimension', 'default');
	$appointment_booking_blog_post_featured_image_custom_width = get_theme_mod('appointment_booking_blog_post_featured_image_custom_width',250);
	$appointment_booking_blog_post_featured_image_custom_height = get_theme_mod('appointment_booking_blog_post_featured_image_custom_height',250);
	if($appointment_booking_blog_post_featured_image_dimension == 'custom'){
		$appointment_booking_custom_css .='.post-main-box img{';
			$appointment_booking_custom_css .='width: '.esc_attr($appointment_booking_blog_post_featured_image_custom_width).'; height: '.esc_attr($appointment_booking_blog_post_featured_image_custom_height).';';
		$appointment_booking_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$appointment_booking_button_border_radius = get_theme_mod('appointment_booking_button_border_radius');
	if($appointment_booking_button_border_radius != false){
		$appointment_booking_custom_css .='.post-main-box .more-btn a{';
			$appointment_booking_custom_css .='border-radius: '.esc_attr($appointment_booking_button_border_radius).'px;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_button_padding_top_bottom = get_theme_mod('appointment_booking_button_padding_top_bottom');
	$appointment_booking_button_padding_left_right = get_theme_mod('appointment_booking_button_padding_left_right');
	if($appointment_booking_button_padding_top_bottom != false || $appointment_booking_button_padding_left_right != false){
		$appointment_booking_custom_css .='.post-main-box .more-btn a{';
			$appointment_booking_custom_css .='padding-top: '.esc_attr($appointment_booking_button_padding_top_bottom).'!important;
			padding-bottom: '.esc_attr($appointment_booking_button_padding_top_bottom).'!important;
			padding-left: '.esc_attr($appointment_booking_button_padding_left_right).'!important;
			padding-right: '.esc_attr($appointment_booking_button_padding_left_right).'!important;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_button_font_size = get_theme_mod('appointment_booking_button_font_size',14);
	$appointment_booking_custom_css .='.post-main-box .more-btn a{';
		$appointment_booking_custom_css .='font-size: '.esc_attr($appointment_booking_button_font_size).';';
	$appointment_booking_custom_css .='}';

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_menu_text_transform','Uppercase');
	if($appointment_booking_theme_lay == 'Capitalize'){
		$appointment_booking_custom_css .='.post-main-box .more-btn a{';
			$appointment_booking_custom_css .='text-transform:Capitalize;';
		$appointment_booking_custom_css .='}';
	}
	if($appointment_booking_theme_lay == 'Lowercase'){
		$appointment_booking_custom_css .='.post-main-box .more-btn a{';
			$appointment_booking_custom_css .='text-transform:Lowercase;';
		$appointment_booking_custom_css .='}';
	}
	if($appointment_booking_theme_lay == 'Uppercase'){
		$appointment_booking_custom_css .='.post-main-box .more-btn a{';
			$appointment_booking_custom_css .='text-transform:Uppercase;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_button_letter_spacing = get_theme_mod('appointment_booking_button_letter_spacing',14);
	$appointment_booking_custom_css .='.post-main-box .more-btn a{';
		$appointment_booking_custom_css .='letter-spacing: '.esc_attr($appointment_booking_button_letter_spacing).';';
	$appointment_booking_custom_css .='}';

	/*---------------- Single Post Settings ------------------*/

	$appointment_booking_comment_width = get_theme_mod('appointment_booking_single_blog_comment_width');
	if($appointment_booking_comment_width != false){
		$appointment_booking_custom_css .='#comments textarea{';
			$appointment_booking_custom_css .='width: '.esc_attr($appointment_booking_comment_width).';';
		$appointment_booking_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$appointment_booking_copyright_background_color = get_theme_mod('appointment_booking_copyright_background_color');
	if($appointment_booking_copyright_background_color != false){
		$appointment_booking_custom_css .='#footer-2{';
			$appointment_booking_custom_css .='background-color: '.esc_attr($appointment_booking_copyright_background_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_widgets_heading = get_theme_mod( 'appointment_booking_footer_widgets_heading','Left');
    if($appointment_booking_footer_widgets_heading == 'Left'){
		$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$appointment_booking_custom_css .='text-align: left;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_footer_widgets_heading == 'Center'){
		$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$appointment_booking_custom_css .='text-align: center;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_footer_widgets_heading == 'Right'){
		$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$appointment_booking_custom_css .='text-align: right;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_widgets_content = get_theme_mod( 'appointment_booking_footer_widgets_content','Left');
    if($appointment_booking_footer_widgets_content == 'Left'){
		$appointment_booking_custom_css .='#footer .widget{';
		$appointment_booking_custom_css .='text-align: left;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_footer_widgets_content == 'Center'){
		$appointment_booking_custom_css .='#footer .widget{';
			$appointment_booking_custom_css .='text-align: center;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_footer_widgets_content == 'Right'){
		$appointment_booking_custom_css .='#footer .widget{';
			$appointment_booking_custom_css .='text-align: right;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_background_color = get_theme_mod('appointment_booking_footer_background_color');
	if($appointment_booking_footer_background_color != false){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background-color: '.esc_attr($appointment_booking_footer_background_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_copyright_alingment = get_theme_mod('appointment_booking_copyright_alingment');
	if($appointment_booking_copyright_alingment != false){
		$appointment_booking_custom_css .='.copyright p,#footer-2 p{';
			$appointment_booking_custom_css .='text-align: '.esc_attr($appointment_booking_copyright_alingment).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_padding = get_theme_mod('appointment_booking_footer_padding');
	if($appointment_booking_footer_padding != false){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='padding: '.esc_attr($appointment_booking_footer_padding).' 0;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_icon = get_theme_mod('appointment_booking_footer_icon');
	if($appointment_booking_footer_icon == false){
		$appointment_booking_custom_css .='.copyright p{';
			$appointment_booking_custom_css .='width:100%; text-align:center; float:none;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_background_image = get_theme_mod('appointment_booking_footer_background_image');
	if($appointment_booking_footer_background_image != false){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background: url('.esc_attr($appointment_booking_footer_background_image).');background-size:cover;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_img_footer','scroll');
	if($appointment_booking_theme_lay == 'fixed'){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background-attachment: fixed !important;';
		$appointment_booking_custom_css .='}';
	}elseif ($appointment_booking_theme_lay == 'scroll'){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background-attachment: scroll !important;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_img_position = get_theme_mod('appointment_booking_footer_img_position','center center');
	if($appointment_booking_footer_img_position != false){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background-position: '.esc_attr($appointment_booking_footer_img_position).'!important;';
		$appointment_booking_custom_css .='}';
	} 

	/*-------------- Woocommerce Settings ----------------*/

	$appointment_booking_related_product_show_hide = get_theme_mod('appointment_booking_related_product_show_hide',true);
	if($appointment_booking_related_product_show_hide != true){
		$appointment_booking_custom_css .='.related.products{';
			$appointment_booking_custom_css .='display: none;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_products_btn_padding_top_bottom = get_theme_mod('appointment_booking_products_btn_padding_top_bottom');
	if($appointment_booking_products_btn_padding_top_bottom != false){
		$appointment_booking_custom_css .='.woocommerce a.button{';
			$appointment_booking_custom_css .='padding-top: '.esc_attr($appointment_booking_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($appointment_booking_products_btn_padding_top_bottom).' !important;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_products_btn_padding_left_right = get_theme_mod('appointment_booking_products_btn_padding_left_right');
	if($appointment_booking_products_btn_padding_left_right != false){
		$appointment_booking_custom_css .='.woocommerce a.button{';
			$appointment_booking_custom_css .='padding-left: '.esc_attr($appointment_booking_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($appointment_booking_products_btn_padding_left_right).' !important;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_woocommerce_sale_position = get_theme_mod( 'appointment_booking_woocommerce_sale_position','right');
    if($appointment_booking_woocommerce_sale_position == 'left'){
		$appointment_booking_custom_css .='.woocommerce ul.products li.product .onsale{';
			$appointment_booking_custom_css .='left: 10px; right: auto !important;';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_woocommerce_sale_position == 'right'){
		$appointment_booking_custom_css .='.woocommerce ul.products li.product .onsale{';
			$appointment_booking_custom_css .='left: auto; right: 0;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_woocommerce_sale_padding_top_bottom = get_theme_mod('appointment_booking_woocommerce_sale_padding_top_bottom');
	if($appointment_booking_woocommerce_sale_padding_top_bottom != false){
		$appointment_booking_custom_css .='.woocommerce span.onsale{';
			$appointment_booking_custom_css .='padding-top: '.esc_attr($appointment_booking_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($appointment_booking_woocommerce_sale_padding_top_bottom).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_woocommerce_sale_padding_left_right = get_theme_mod('appointment_booking_woocommerce_sale_padding_left_right');
	if($appointment_booking_woocommerce_sale_padding_left_right != false){
		$appointment_booking_custom_css .='.woocommerce span.onsale{';
			$appointment_booking_custom_css .='padding-left: '.esc_attr($appointment_booking_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($appointment_booking_woocommerce_sale_padding_left_right).';';
		$appointment_booking_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$appointment_booking_logo_padding = get_theme_mod('appointment_booking_logo_padding');
	if($appointment_booking_logo_padding != false){
		$appointment_booking_custom_css .='.header-box .logo{';
			$appointment_booking_custom_css .='padding: '.esc_attr($appointment_booking_logo_padding).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_logo_margin = get_theme_mod('appointment_booking_logo_margin');
	if($appointment_booking_logo_margin != false){
		$appointment_booking_custom_css .='.header-box .logo{';
			$appointment_booking_custom_css .='margin: '.esc_attr($appointment_booking_logo_margin).';';
		$appointment_booking_custom_css .='}';
	}

	// Site title Font Size
	$appointment_booking_site_title_font_size = get_theme_mod('appointment_booking_site_title_font_size');
	if($appointment_booking_site_title_font_size != false){
		$appointment_booking_custom_css .='.logo h1, .logo p.site-title{';
			$appointment_booking_custom_css .='font-size: '.esc_attr($appointment_booking_site_title_font_size).';';
		$appointment_booking_custom_css .='}';
	}

	// Site tagline Font Size
	$appointment_booking_site_tagline_font_size = get_theme_mod('appointment_booking_site_tagline_font_size');
	if($appointment_booking_site_tagline_font_size != false){
		$appointment_booking_custom_css .='.logo p.site-description{';
			$appointment_booking_custom_css .='font-size: '.esc_attr($appointment_booking_site_tagline_font_size).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_header_menus_color = get_theme_mod('appointment_booking_header_menus_color');
	if($appointment_booking_header_menus_color != false){
		$appointment_booking_custom_css .='.main-navigation a{';
			$appointment_booking_custom_css .='color: '.esc_attr($appointment_booking_header_menus_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_header_menus_hover_color = get_theme_mod('appointment_booking_header_menus_hover_color');
	if($appointment_booking_header_menus_hover_color != false){
		$appointment_booking_custom_css .='.main-navigation a:hover{';
			$appointment_booking_custom_css .='color: '.esc_attr($appointment_booking_header_menus_hover_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_header_submenus_color = get_theme_mod('appointment_booking_header_submenus_color');
	if($appointment_booking_header_submenus_color != false){
		$appointment_booking_custom_css .='.main-navigation ul ul a{';
			$appointment_booking_custom_css .='color: '.esc_attr($appointment_booking_header_submenus_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_header_submenus_hover_color = get_theme_mod('appointment_booking_header_submenus_hover_color');
	if($appointment_booking_header_submenus_hover_color != false){
		$appointment_booking_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$appointment_booking_custom_css .='color: '.esc_attr($appointment_booking_header_submenus_hover_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_navigation_menu_font_size = get_theme_mod('appointment_booking_navigation_menu_font_size');
	if($appointment_booking_navigation_menu_font_size != false){
		$appointment_booking_custom_css .='.main-navigation a{';
			$appointment_booking_custom_css .='font-size: '.esc_attr($appointment_booking_navigation_menu_font_size).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_menus_item = get_theme_mod( 'appointment_booking_menus_item_style','None');
    if($appointment_booking_menus_item == 'None'){
		$appointment_booking_custom_css .='.main-navigation a{';
			$appointment_booking_custom_css .='';
		$appointment_booking_custom_css .='}';
	}else if($appointment_booking_menus_item == 'Zoom In'){
		$appointment_booking_custom_css .='.main-navigation a:hover{';
			$appointment_booking_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #46bf72;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_navigation_menu_font_weight = get_theme_mod('appointment_booking_navigation_menu_font_weight','600');
	if($appointment_booking_navigation_menu_font_weight != false){
		$appointment_booking_custom_css .='.main-navigation a{';
			$appointment_booking_custom_css .='font-weight: '.esc_attr($appointment_booking_navigation_menu_font_weight).';';
		$appointment_booking_custom_css .='}';
	}
	
	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_menu_text_transform','Uppercase');
	if($appointment_booking_theme_lay == 'Capitalize'){
		$appointment_booking_custom_css .='.main-navigation a{';
			$appointment_booking_custom_css .='text-transform:Capitalize;';
		$appointment_booking_custom_css .='}';
	}
	if($appointment_booking_theme_lay == 'Lowercase'){
		$appointment_booking_custom_css .='.main-navigation a{';
			$appointment_booking_custom_css .='text-transform:Lowercase;';
		$appointment_booking_custom_css .='}';
	}
	if($appointment_booking_theme_lay == 'Uppercase'){
		$appointment_booking_custom_css .='.main-navigation a{';
			$appointment_booking_custom_css .='text-transform:Uppercase;';
		$appointment_booking_custom_css .='}';
	}


	/*---------------- Preloader Background Color  -------------------*/

	$appointment_booking_preloader_bg_color = get_theme_mod('appointment_booking_preloader_bg_color');
	if($appointment_booking_preloader_bg_color != false){
		$appointment_booking_custom_css .='#preloader{';
			$appointment_booking_custom_css .='background-color: '.esc_attr($appointment_booking_preloader_bg_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_preloader_border_color = get_theme_mod('appointment_booking_preloader_border_color');
	if($appointment_booking_preloader_border_color != false){
		$appointment_booking_custom_css .='.loader-line{';
			$appointment_booking_custom_css .='border-color: '.esc_attr($appointment_booking_preloader_border_color).'!important;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_preloader_bg_img = get_theme_mod('appointment_booking_preloader_bg_img');
	if($appointment_booking_preloader_bg_img != false){
		$appointment_booking_custom_css .='#preloader{';
			$appointment_booking_custom_css .='background: url('.esc_attr($appointment_booking_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$appointment_booking_custom_css .='}';
	}

	// Header Background Color
	$appointment_booking_header_background_color = get_theme_mod('appointment_booking_header_background_color');
	if($appointment_booking_header_background_color != false){
		$appointment_booking_custom_css .='.home-page-header{';
			$appointment_booking_custom_css .='background-color: '.esc_attr($appointment_booking_header_background_color).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_header_img_position = get_theme_mod('appointment_booking_header_img_position','center top');
	if($appointment_booking_header_img_position != false){
		$appointment_booking_custom_css .='.home-page-header{';
			$appointment_booking_custom_css .='background-position: '.esc_attr($appointment_booking_header_img_position).'!important;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_single_blog_post_navigation_show_hide = get_theme_mod('appointment_booking_single_blog_post_navigation_show_hide',true);
	if($appointment_booking_single_blog_post_navigation_show_hide != true){
		$appointment_booking_custom_css .='.post-navigation{';
			$appointment_booking_custom_css .='display: none;';
		$appointment_booking_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$appointment_booking_scroll_to_top_font_size = get_theme_mod('appointment_booking_scroll_to_top_font_size');
	if($appointment_booking_scroll_to_top_font_size != false){
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='font-size: '.esc_attr($appointment_booking_scroll_to_top_font_size).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_scroll_to_top_padding = get_theme_mod('appointment_booking_scroll_to_top_padding');
	$appointment_booking_scroll_to_top_padding = get_theme_mod('appointment_booking_scroll_to_top_padding');
	if($appointment_booking_scroll_to_top_padding != false){
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='padding-top: '.esc_attr($appointment_booking_scroll_to_top_padding).'!important;padding-bottom: '.esc_attr($appointment_booking_scroll_to_top_padding).'!important;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_scroll_to_top_width = get_theme_mod('appointment_booking_scroll_to_top_width');
	if($appointment_booking_scroll_to_top_width != false){
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='width: '.esc_attr($appointment_booking_scroll_to_top_width).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_scroll_to_top_height = get_theme_mod('appointment_booking_scroll_to_top_height');
	if($appointment_booking_scroll_to_top_height != false){
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='height: '.esc_attr($appointment_booking_scroll_to_top_height).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_scroll_to_top_border_radius = get_theme_mod('appointment_booking_scroll_to_top_border_radius');
	if($appointment_booking_scroll_to_top_border_radius != false){
		$appointment_booking_custom_css .='.scrollup i{';
			$appointment_booking_custom_css .='border-radius: '.esc_attr($appointment_booking_scroll_to_top_border_radius).'px;';
		$appointment_booking_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$appointment_booking_social_icon_font_size = get_theme_mod('appointment_booking_social_icon_font_size');
	if($appointment_booking_social_icon_font_size != false){
		$appointment_booking_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$appointment_booking_custom_css .='font-size: '.esc_attr($appointment_booking_social_icon_font_size).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_social_icon_padding = get_theme_mod('appointment_booking_social_icon_padding');
	if($appointment_booking_social_icon_padding != false){
		$appointment_booking_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$appointment_booking_custom_css .='padding: '.esc_attr($appointment_booking_social_icon_padding).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_social_icon_width = get_theme_mod('appointment_booking_social_icon_width');
	if($appointment_booking_social_icon_width != false){
		$appointment_booking_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$appointment_booking_custom_css .='width: '.esc_attr($appointment_booking_social_icon_width).';';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_social_icon_height = get_theme_mod('appointment_booking_social_icon_height');
	if($appointment_booking_social_icon_height != false){
		$appointment_booking_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$appointment_booking_custom_css .='height: '.esc_attr($appointment_booking_social_icon_height).';';
		$appointment_booking_custom_css .='}';
	}

	/*---------------- Footer Settings ------------------*/

	$appointment_booking_button_footer_heading_letter_spacing = get_theme_mod('appointment_booking_button_footer_heading_letter_spacing',1);
	$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label, a.rsswidget.rss-widget-title{';
		$appointment_booking_custom_css .='letter-spacing: '.esc_attr($appointment_booking_button_footer_heading_letter_spacing).'px;';
	$appointment_booking_custom_css .='}';

	$appointment_booking_button_footer_font_size = get_theme_mod('appointment_booking_button_footer_font_size','25');
	$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label, a.rsswidget.rss-widget-title{';
		$appointment_booking_custom_css .='font-size: '.esc_attr($appointment_booking_button_footer_font_size).'px;';
	$appointment_booking_custom_css .='}';

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_button_footer_text_transform','Capitalize');
	if($appointment_booking_theme_lay == 'Capitalize'){
		$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$appointment_booking_custom_css .='text-transform:Capitalize;';
		$appointment_booking_custom_css .='}';
	}
	if($appointment_booking_theme_lay == 'Lowercase'){
		$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label, a.rsswidget.rss-widget-title{';
			$appointment_booking_custom_css .='text-transform:Lowercase;';
		$appointment_booking_custom_css .='}';
	}
	if($appointment_booking_theme_lay == 'Uppercase'){
		$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label, a.rsswidget.rss-widget-title{';
			$appointment_booking_custom_css .='text-transform:Uppercase;';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_footer_heading_weight = get_theme_mod('appointment_booking_footer_heading_weight','800');
	if($appointment_booking_footer_heading_weight != false){
		$appointment_booking_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label, a.rsswidget.rss-widget-title{';
			$appointment_booking_custom_css .='font-weight: '.esc_attr($appointment_booking_footer_heading_weight).';';
		$appointment_booking_custom_css .='}';
	}

    /*---------------------------Footer Style -------------------*/

	$appointment_booking_theme_lay = get_theme_mod( 'appointment_booking_footer_template','appointment_booking-footer-one');
    if($appointment_booking_theme_lay == 'appointment_booking-footer-one'){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='';
		$appointment_booking_custom_css .='}';

	}else if($appointment_booking_theme_lay == 'appointment_booking-footer-two'){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$appointment_booking_custom_css .='color:#000;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#footer ul li::before{';
			$appointment_booking_custom_css .='background:#000;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$appointment_booking_custom_css .='border: 1px solid #000;';
		$appointment_booking_custom_css .='}';

	}else if($appointment_booking_theme_lay == 'appointment_booking-footer-three'){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background: #232524;';
		$appointment_booking_custom_css .='}';
	}
	else if($appointment_booking_theme_lay == 'appointment_booking-footer-four'){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background: #f7f7f7;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$appointment_booking_custom_css .='color:#000;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#footer ul li::before{';
			$appointment_booking_custom_css .='background:#000;';
		$appointment_booking_custom_css .='}';
		$appointment_booking_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$appointment_booking_custom_css .='border: 1px solid #000;';
		$appointment_booking_custom_css .='}';
	}
	else if($appointment_booking_theme_lay == 'appointment_booking-footer-five'){
		$appointment_booking_custom_css .='#footer{';
			$appointment_booking_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$appointment_booking_custom_css .='}';
	}

	$appointment_booking_responsive_preloader_hide = get_theme_mod('appointment_booking_responsive_preloader_hide',false);
	if($appointment_booking_responsive_preloader_hide == true && get_theme_mod('appointment_booking_loader_enable',false) == false){
		$appointment_booking_custom_css .='@media screen and (min-width:575px){
			#preloader{';
			$appointment_booking_custom_css .='display:none !important;';
		$appointment_booking_custom_css .='} }';
	}

	if($appointment_booking_responsive_preloader_hide == false){
		$appointment_booking_custom_css .='@media screen and (max-width:575px){
			#preloader{';
			$appointment_booking_custom_css .='display:none !important;';
		$appointment_booking_custom_css .='} }';
	}

	$appointment_booking_bradcrumbs_alignment = get_theme_mod( 'appointment_booking_bradcrumbs_alignment','Left');
    if($appointment_booking_bradcrumbs_alignment == 'Left'){
    	$appointment_booking_custom_css .='@media screen and (min-width:768px) {';
		$appointment_booking_custom_css .='.bradcrumbs{';
			$appointment_booking_custom_css .='text-align:start;';
		$appointment_booking_custom_css .='}}';
	}else if($appointment_booking_bradcrumbs_alignment == 'Center'){
		$appointment_booking_custom_css .='@media screen and (min-width:768px) {';
		$appointment_booking_custom_css .='.bradcrumbs{';
			$appointment_booking_custom_css .='text-align:center;';
		$appointment_booking_custom_css .='}}';
	}else if($appointment_booking_bradcrumbs_alignment == 'Right'){
		$appointment_booking_custom_css .='@media screen and (min-width:768px) {';
		$appointment_booking_custom_css .='.bradcrumbs{';
			$appointment_booking_custom_css .='text-align:end;';
		$appointment_booking_custom_css .='}}';
	}
