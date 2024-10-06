<?php
//about theme info
add_action( 'admin_menu', 'appointment_booking_gettingstarted' );
function appointment_booking_gettingstarted() {    	
	add_theme_page( esc_html__('About Appointment Booking', 'appointment-booking'), esc_html__('About Appointment Booking', 'appointment-booking'), 'edit_theme_options', 'appointment_booking_guide', 'appointment_booking_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function appointment_booking_admin_theme_style() {
   wp_enqueue_style('appointment-booking-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('appointment-booking-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'appointment_booking_admin_theme_style');


//guidline for about theme
function appointment_booking_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'appointment-booking' );
?>

<div class="wrapper-info">
    <div class="col-left sshot-section">
    	<h2><?php esc_html_e( 'Welcome to Appointment Booking Theme', 'appointment-booking' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','appointment-booking'); ?></p>
    </div>
    <div class="col-right coupen-section">
    	<div class="logo-section">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		</div>
		<div class="logo-right">			
			<div class="update-now">
				<h4><?php esc_html_e('Try Premium ','appointment-booking'); ?></h4>
				<h4><?php esc_html_e('Appointment Booking Theme','appointment-booking'); ?></h4>
				<h4 class="disc-text"><?php esc_html_e('at 20% Discount','appointment-booking'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','appointment-booking'); ?> ( <span><?php esc_html_e('vwpro20','appointment-booking'); ?></span> ) </h4> 
				<div class="info-link">
					<a href="<?php echo esc_url( APPOINTMENT_BOOKING_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'appointment-booking' ); ?></a>
					
				</div>
			</div>
		</div>   
		<div class="logo-img">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="appointment_booking_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'appointment-booking' ); ?></button> 
			<button class="tablinks" onclick="appointment_booking_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'appointment-booking' ); ?></button>
			<button class="tablinks" onclick="appointment_booking_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'appointment-booking' ); ?></button>
			<button class="tablinks" onclick="appointment_booking_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'appointment-booking' ); ?></button>
		  	<button class="tablinks" onclick="appointment_booking_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'appointment-booking' ); ?></button>
		 	<button class="tablinks" onclick="appointment_booking_open_tab(event, 'free_pro')"><?php esc_html_e( 'Free Vs Premium', 'appointment-booking' ); ?></button>
		 	<button class="tablinks" onclick="appointment_booking_open_tab(event, 'get_bundle')"><?php esc_html_e( 'Get 250+ Themes Bundle at $99', 'appointment-booking' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php 
			$appointment_booking_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$appointment_booking_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Appointment_Booking_Plugin_Activation_Settings::get_instance();
				$appointment_booking_actions = $plugin_ins->recommended_actions;
				?>
				<div class="appointment-booking-recommended-plugins">
				    <div class="appointment-booking-action-list">
				        <?php if ($appointment_booking_actions): foreach ($appointment_booking_actions as $key => $appointment_booking_actionValue): ?>
				                <div class="appointment-booking-action" id="<?php echo esc_attr($appointment_booking_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($appointment_booking_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($appointment_booking_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($appointment_booking_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','appointment-booking'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($appointment_booking_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'appointment-booking' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Appointment Booking is a sophisticated WordPress theme with a clean and elegantly designed layout for websites facilitating hospital booking and doctor appointment booking online. It is a multipurpose theme as it can be used for hospitals, advertise, reservation, gynecology, nursing home, reviews, Full body checkup, SARS, Covid-19, general clinics, service provider, directory, google map, dental clinic, listing clinics, health services, drug stores, healthcare organizations, health professionals, dermatology, child care,Scheduling, Consultations, Reservations, Services, Clinics, physical therapist, orthopedician, psychiatrist, surgery, dentist, doctors, health centers, Vaccination websites, Orthodontist, community health centers, medical stores, optometrist, laboratory, pathologies, physiatrist pediatric clinic, veterinary clinic and any medical and healthcare-related website. This theme is so well crafted that it makes your website appear as if it is designed by a professional WordPress developer. Your visitors will love the way your website performs at this theme includes clean codes that are optimized for speed as well as performance. With a plethora of customization options at your disposal, you can do any desired changes in the layout and make your website look the way you have always wanted. Designed using the Bootstrap framework, Custom Menu, Threaded Comments. it has a visual appeal and its minimalist design never lets the focus of your visitors drift away from the key information displayed on your site. Compatible with Gutenberg Editor. Your website will be interactive as there are many Call To Action (CTA) buttons included in the theme. Mobile users will have a great experience as your web page adjusts to every screen size thanks to the theme’s responsive and retina-ready design. It is translation ready and includes social media icons and a lot of shortcodes.','appointment-booking'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'appointment-booking' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'appointment-booking' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( APPOINTMENT_BOOKING_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'appointment-booking' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'appointment-booking'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'appointment-booking'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'appointment-booking'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'appointment-booking'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'appointment-booking'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( APPOINTMENT_BOOKING_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'appointment-booking'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'appointment-booking'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'appointment-booking'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( APPOINTMENT_BOOKING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'appointment-booking'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'appointment-booking' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','appointment-booking'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_top_header') ); ?>" target="_blank"><?php esc_html_e('Top Header','appointment-booking'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','appointment-booking'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','appointment-booking'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','appointment-booking'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=appointment_booking_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','appointment-booking'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','appointment-booking'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','appointment-booking'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','appointment-booking'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','appointment-booking'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','appointment-booking'); ?></span><?php esc_html_e(' Go to ','appointment-booking'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','appointment-booking'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','appointment-booking'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','appointment-booking'); ?></span><?php esc_html_e(' Go to ','appointment-booking'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','appointment-booking'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','appointment-booking'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','appointment-booking'); ?> <a class="doc-links" href="https://preview.vwthemesdemo.com/docs/free-appointment-booking/" target="_blank"><?php esc_html_e('Documentation','appointment-booking'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>	

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Appointment_Booking_Plugin_Activation_Settings::get_instance();
			$appointment_booking_actions = $plugin_ins->recommended_actions;
			?>
				<div class="appointment-booking-recommended-plugins">
				    <div class="appointment-booking-action-list">
				        <?php if ($appointment_booking_actions): foreach ($appointment_booking_actions as $key => $appointment_booking_actionValue): ?>
				                <div class="appointment-booking-action" id="<?php echo esc_attr($appointment_booking_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($appointment_booking_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($appointment_booking_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($appointment_booking_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','appointment-booking'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($appointment_booking_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'appointment-booking' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','appointment-booking'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon ','appointment-booking'); ?></span></b></p>
	              	<div class="appointment-booking-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','appointment-booking'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
	              	 <p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Section >> Publish.','appointment-booking'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'appointment-booking' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','appointment-booking'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','appointment-booking'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','appointment-booking'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','appointment-booking'); ?></a>
									</div>
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','appointment-booking'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','appointment-booking'); ?></a>
									</div> 
								</div>
							</div>
					</div>
				</div>			
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Appointment_Booking_Plugin_Activation_Settings::get_instance();
			$appointment_booking_actions = $plugin_ins->recommended_actions;
			?>
				<div class="appointment-booking-recommended-plugins">
				    <div class="appointment-booking-action-list">
				        <?php if ($appointment_booking_actions): foreach ($appointment_booking_actions as $key => $appointment_booking_actionValue): ?>
				                <div class="appointment-booking-action" id="<?php echo esc_attr($appointment_booking_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($appointment_booking_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($appointment_booking_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($appointment_booking_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'appointment-booking' ); ?></h3>
				<hr class="h3hr">
				<div class="appointment-booking-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','appointment-booking'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'appointment-booking' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','appointment-booking'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','appointment-booking'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','appointment-booking'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','appointment-booking'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=appointment_booking_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','appointment-booking'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','appointment-booking'); ?></a>
								</div> 
							</div>
						</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Appointment_Booking_Plugin_Activation_Woo_Products::get_instance();
				$appointment_booking_actions = $plugin_ins->recommended_actions;
				?>
				<div class="appointment-booking-recommended-plugins">
					    <div class="appointment-booking-action-list">
					        <?php if ($appointment_booking_actions): foreach ($appointment_booking_actions as $key => $appointment_booking_actionValue): ?>
					                <div class="appointment-booking-action" id="<?php echo esc_attr($appointment_booking_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($appointment_booking_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($appointment_booking_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($appointment_booking_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'appointment-booking' ); ?></h3>
				<hr class="h3hr">
				<div class="appointment-booking-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','appointment-booking'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','appointment-booking'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','appointment-booking'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','appointment-booking'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','appointment-booking'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','appointment-booking'); ?></span></b></p>
	              	<div class="appointment-booking-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','appointment-booking'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','appointment-booking'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'appointment-booking' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Appointment Booking WordPress Theme is designed by keeping the online appointment booking features to the core of it. You can easily create a website that allows you to build an online appointment booking site for your clinic, hospital, medical laboratory, pet and veterinary clinic and more. It is aesthetically designed with elegant colors and pictures truly depicting the purpose of your website. With a professionally crafted theme slider, you can attract the audience by showcasing the pictures of your health care center. There are slider settings provided for adjusting the slider timing, changing the pictures, and much more. WP Appointment WordPress Theme includes Call To Action (CTA) buttons that will not only guide the visitors but also help to improve the conversion rates of your website. Everything is well organized so that your visitors will be able to view all the details at a glance. With different sections included, it keeps your website sorted.','appointment-booking'); ?></p>
		    </div>
		    <div class="col-right-pro">
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( APPOINTMENT_BOOKING_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'appointment-booking'); ?></a>
					<a href="<?php echo esc_url( APPOINTMENT_BOOKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'appointment-booking'); ?></a>
					<a href="<?php echo esc_url( APPOINTMENT_BOOKING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'appointment-booking'); ?></a>
					<a href="<?php echo esc_url( APPOINTMENT_BOOKING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get 250+ Themes Bundle at $99', 'appointment-booking'); ?></a>
				</div>
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'appointment-booking' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'appointment-booking'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'appointment-booking'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'appointment-booking'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'appointment-booking'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'appointment-booking'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'appointment-booking'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'appointment-booking'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'appointment-booking'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'appointment-booking'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'appointment-booking'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'appointment-booking'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'appointment-booking'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'appointment-booking'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'appointment-booking'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( APPOINTMENT_BOOKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'appointment-booking'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">		  	
		   <div class="col-left-pro">
		   	<h3><?php esc_html_e( 'WP Theme Bundle', 'appointment-booking' ); ?></h3>
		    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 250+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','appointment-booking'); ?></p>
		    	<div class="feature">
		    		<h4><?php esc_html_e( 'Features:', 'appointment-booking' ); ?></h4>
		    		<p><?php esc_html_e('250+ Premium Themes & 5+ Plugins.', 'appointment-booking'); ?></p>
		    		<p><?php esc_html_e('Seamless Integration.', 'appointment-booking'); ?></p>
		    		<p><?php esc_html_e('Customization Flexibility.', 'appointment-booking'); ?></p>
		    		<p><?php esc_html_e('Regular Updates.', 'appointment-booking'); ?></p>
		    		<p><?php esc_html_e('Dedicated Support.', 'appointment-booking'); ?></p>
		    	</div>
		    	<p>Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!</p>
		    	<div class="pro-links">
					<a href="<?php echo esc_url( APPOINTMENT_BOOKING_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'appointment-booking'); ?></a>
					<a href="<?php echo esc_url( APPOINTMENT_BOOKING_THEME_BUNDLE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'appointment-booking'); ?></a>
				</div>
		   </div>
		   <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.png" alt="" />
		   </div>		    
		</div>

	</div>
</div>
<?php } ?>