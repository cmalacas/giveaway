<?php
class Elementor_Single_GiveAway_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'single-giveaway-widget';
	}

	public function get_title()
	{
		return esc_html__('Single GiveAway', 'briantech');
	}

	public function get_icon()
	{
		return 'eicon-info-box';
	}

	public function get_custom_help_url()
	{
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories()
	{
		return ['basic'];
	}

	public function get_keywords()
	{
		return ['giveaway', 'single'];
	}

	public function get_script_depends()
	{
	}

	public function get_style_depends()
	{
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'briantech'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->end_controls_section();
	}

  protected function render() {

		global $wpdb;

    $settings = $this->get_settings_for_display();

		$args = [
			'post_type' => 'giveaway',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'order' => 'DESC',
			'orderby' => 'date',
			'meta_query'	=> [[
				'key' => 'datetime_countdown',
				'compare' => '>=',
				'value' => date("Y-m-d"),
				'type' => 'DATE'
			]]
		];

		$the_query = new WP_Query($args);

		if ($the_query->have_posts()) {
			
			while ($the_query->have_posts()) {
				
				$the_query->the_post();
				$post_id = get_the_ID();
				
				$value = get_field('value', $post_id);
				$color_title = get_field('color_title', $post_id);
				$datetime_countdown = get_field('datetime_countdown', $post_id);
				
				$max_join_user = get_field('max_join_user', $post_id);


				$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
				
				$url = get_permalink();
				
				if (is_user_logged_in()) {
					$id_current_user = get_current_user_id();
					$list_user_meta = get_post_meta($post_id, '_list_user', true);
					$max_join_user = get_field('max_join_user', $post_id);
					if ($list_user_meta) {
						$args_user = json_decode($list_user_meta);

						if ($max_join_user <= count($args_user)) {
							$url = "javascript:void(0)";
						}
					}
				}

    ?>
    <div class="e-con-inner">
		  <div 
				class="elementor-element elementor-element-9ec16bd e-flex e-con-boxed e-con e-child" 
				data-id="9ec16bd" 
				data-element_type="container" 
				data-settings="{'background_background':'gradient'}"
			>				
        <div class="e-con-inner">
		      <div 
						class="elementor-element elementor-element-4a6761e e-flex e-con-boxed e-con e-child" 
						data-id="4a6761e" 
						data-element_type="container"
					>
					  <div class="e-con-inner">
				      <div 
								class="elementor-element elementor-element-51f7226 premium-floating-effects-yes elementor-widget elementor-widget-image" 
								data-id="51f7226" 
								data-element_type="widget" 
								data-settings="{'premium_fe_translate_switcher':'yes','premium_fe_Xtranslate':{'unit':'px','size':'','sizes':{'from':-26,'to':38}},'premium_fe_Ytranslate':{'unit':'px','size':'','sizes':{'from':-20,'to':39}},'premium_fe_Xtranslate_tablet':{'unit':'px','size':'','sizes':[]},'premium_fe_Xtranslate_mobile':{'unit':'px','size':'','sizes':[]},'premium_fe_Ytranslate_tablet':{'unit':'px','size':'','sizes':[]},'premium_fe_Ytranslate_mobile':{'unit':'px','size':'','sizes':[]},'premium_fe_trans_duration':{'unit':'px','size':1000,'sizes':[]},'premium_fe_trans_delay':{'unit':'px','size':'','sizes':[]},'premium_fe_direction':'alternate','premium_fe_loop':'default','premium_fe_easing':'easeInOutSine'}" 
								data-widget_type="image.default"
							>
				        <div 
									class="elementor-widget-container" 
									style="transform: translateX(23.4003px) translateY(25.5409px);">
									<picture>
										<source 
											sizes="295px" 
											type="image/webp" 
											data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png.webp 326w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-300x300.png.webp 300w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-100x100.png.webp 100w" 
											srcset="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png.webp 326w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-300x300.png.webp 300w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-100x100.png.webp 100w"
										>
											<img 
												loading="lazy" 
												decoding="async" 
												width="326" 
												height="327" 
												src="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png" class="attachment-large size-large wp-image-4027 lazyautosizes lazyloaded" 
												alt="" 
												data-eio="p" 
												data-src="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png" 
												data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png 326w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-300x300.png 300w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-100x100.png 100w" 
												data-sizes="auto" 
												data-eio-rwidth="326" 
												data-eio-rheight="327" 
												sizes="295px" 
												srcset="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png 326w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-300x300.png 300w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-100x100.png 100w"
											>
												<noscript>
													<img 
														loading="lazy" 
														decoding="async" 
														width="326" 
														height="327" 
														src="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png" 
														class="attachment-large size-large wp-image-4027" 
														alt="" 
														srcset="https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon.png 326w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-300x300.png 300w, https://bitslab.com.au/wp-content/uploads/2024/04/joystick-icon-100x100.png 100w" 
														sizes="(max-width: 326px) 100vw, 326px" 
														data-eio="l" 
													/>
												</noscript>
										</picture>													
                </div>
				    </div>
					</div>
				</div>

		    <div class="elementor-element elementor-element-b84bcb3 e-flex e-con-boxed e-con e-child" data-id="b84bcb3" data-element_type="container" data-settings="{background_background:classic}">
					<div class="e-con-inner">
					</div>
				</div>

		    <div class="elementor-element elementor-element-5490587 e-flex e-con-boxed e-con e-child" data-id="5490587" data-element_type="container">
					<div class="e-con-inner">
		        <div class="elementor-element elementor-element-6fa5fc2 e-con-full e-flex e-con e-child" data-id="6fa5fc2" data-element_type="container">
				      <div 
                class="elementor-element elementor-element-95dabe4 elementor-skin-slideshow elementor-widget elementor-widget-media-carousel e-widget-swiper" 
                data-id="95dabe4" 
                data-element_type="widget" 
                data-settings="{'skin':'slideshow','slideshow_slides_per_view':'3','centered_slides':'yes','lazyload':'yes','space_between':{'unit':'px','size':5,'sizes':[]},'effect':'slide','speed':500,'autoplay':'yes','autoplay_speed':5000,'loop':'yes','pause_on_hover':'yes','pause_on_interaction':'yes','space_between_tablet':{'unit':'px','size':10,'sizes':[]},'space_between_mobile':{'unit':'px','size':10,'sizes':[]}}" data-widget_type="media-carousel.default">
				        <div class="elementor-widget-container">
			            <link rel="stylesheet" href="https://bitslab.com.au/wp-content/plugins/elementor-pro/assets/css/widget-carousel.min.css">		
                  <div class="elementor-swiper">
			              <div class="elementor-main-swiper swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
				              <div class="swiper-wrapper" id="swiper-wrapper-b727aafa73d610109" aria-live="off" style="cursor: grab; transition-duration: 0ms; transform: translate3d(-1648px, 0px, 0px);">
                        
                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 407px; margin-right: 5px;" role="group" aria-label="1 / 3">
									        <div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
					                </div>
								        </div>
                        
                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" style="width: 407px; margin-right: 5px;" role="group" aria-label="2 / 3">
									        <div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
					                </div>
								        </div>
                        
                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" style="width: 407px; margin-right: 5px;" role="group" aria-label="3 / 3">
									        <div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
					                </div>
								        </div>

											  <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" style="width: 407px; margin-right: 5px;" role="group" aria-label="1 / 3">
									        <div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
					                </div>
								        </div>

											  <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1" style="width: 407px; margin-right: 5px;" role="group" aria-label="2 / 3">
                          <div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
					                </div>
								        </div>

											  <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2" style="width: 407px; margin-right: 5px;" role="group" aria-label="3 / 3">
                        	<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
												</div>
											</div>
											<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 407px; margin-right: 5px;" role="group" aria-label="1 / 3">
												<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
												</div>
											</div>
											
											<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" style="width: 407px; margin-right: 5px;" role="group" aria-label="2 / 3">
												<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
												</div>
											</div>
											
											<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 407px; margin-right: 5px;">
												<div class="elementor-carousel-image swiper-lazy" data-background="https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png">
													<div class="swiper-lazy-preloader"></div>			
												</div>
											</div>
										</div>
										
										<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
									</div>
								</div>
								<div class="elementor-swiper">
									<div class="elementor-thumbnails-swiper swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
										<div class="swiper-wrapper" id="swiper-wrapper-2114ecdb3fd86e35" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-417px, 0px, 0px);">
											<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 129px; margin-right: 10px;" role="group" aria-label="1 / 3">
												<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
												</div>
											</div>
											
											<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" style="width: 129px; margin-right: 10px;" role="group" aria-label="2 / 3">
												<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
												</div>
											</div>
											
											<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" style="width: 129px; margin-right: 10px;" role="group" aria-label="3 / 3">
												<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
												</div>
											</div>
											
											<div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" style="width: 129px; margin-right: 10px;" role="group" aria-label="1 / 3">
												<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
											</div>											
										</div>

										<div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1" style="width: 129px; margin-right: 10px;" role="group" aria-label="2 / 3">
											<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
										</div>
									</div>
									
									<div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2" style="width: 129px; margin-right: 10px;" role="group" aria-label="3 / 3">
										<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
										</div>
									</div>

									<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 129px; margin-right: 10px;" role="group" aria-label="1 / 3">
										<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
									</div>

								</div>
								
								<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="1" style="width: 129px; margin-right: 10px;" role="group" aria-label="2 / 3">
									<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
									</div>
								</div>
								
								<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="2" role="group" aria-label="3 / 3" style="width: 129px; margin-right: 10px;">
									<div class="elementor-carousel-image swiper-lazy swiper-lazy-loaded" style="background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/RectangleIMG.png');">
									</div>
								</div>
							
							</div>
							
							<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
						
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="elementor-element elementor-element-e1856ac e-con-full e-flex e-con e-child" 
				 data-id="e1856ac" 
				 data-element_type="container"
				>
					<style>/*! elementor - v3.21.0 - 08-05-2024 */
							.elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}
							.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}
							.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}
							.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}
							.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}
							.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}

							.elementor-element-b3e3690 > .elementor-widget-container {
								padding: 5px 5px 5px 5px;    
    						background-color: transparent;
    						background-image: linear-gradient(90deg, #F777F2 0%, #A952AC 100%);
    						border-radius: 50px 50px 50px 50px;
								text-align: center;
								color: #fff;
								font-size: 22px;
								font-weight: 600;
								width: 75%;
							}

							.elementor-element-6fe6dce > .elementor-widget-container {
								color: #fff;
								font-size: 22px;
								font-weight: 600;
								font-family: "SF Pro Display", Sans-serif
							}

							.elementor-element-a08e5ed .elementor-icon-list-text {
								color: #fff;
								font-size: 17px;
							}

							.elementor-element-a08e5ed .elementor-icon-list-item {
								padding-bottom: calc(15px / 2);
							}

							.elementor-element-6fa5fc2 {
								width: 38%;
								padding: 0;
							}

							.elementor-element-e1856ac {
								width: 62%;
								padding: 0;
							}

							.elementor-element-51f7226.elementor-widget-image {
								text-align: right;
							}

							.elementor-element-51f7226 .elementor-widget-container {
								margin: 0 -100px 0 0;
							}

							.elementor-element-b84bcb3 {
								background-image: url("https://bitslab.com.au/wp-content/uploads/2024/05/stroke_line.png");
								background-position: top center;
								background-repeat: no-repeat;
								background-size: 100% auto;
								margin-top: -230px;
								padding-bottom: 100px;
								padding-top: 25px;
								padding-left: 25px;
								padding-right: 25px;
								margin-bottom: 0;
								margin-left: 0;
								margin-right: 0;
							}

							.elementor-element-9ec16bd {
								background-color: transparent;
								background-image: linear-gradient(360deg, #4f7ff2 0%, #5946ce 100%);
								border-radius: 25px 25px 25px 25px;
								padding-left: 0;
								padding-right: 0;
								padding-top: 100px;
							}

							.elementor-element-9ec16bd::before {
								display: block;
								content: '';
								position: absolute;
								background-image: url('https://bitslab.com.au/wp-content/uploads/2024/04/top-notch.png');
								background-position: top center;
								background-repeat: no-repeat;
								background-size: 35% auto; 
							}

							.elementor-element-cb28369 > .elementor-widget-container {
								padding: 0 !important;
								background-color: transparent !important;
								border: none !important;
								border-radius: 0 !important;
								box-shadow: none !important;
							}

							.elementor-element-4a6761e {
								margin-top: -280px;
								z-index: 1;
							}

							.elementor-element-0f1868c {
								padding-top: 5%;
								padding-bottom: 0;
								padding-left: 0;
								padding-right: 0;
								margin-top: 80px;
							}

							.elementor-element-5490587 .e-con-inner {
								flex-direction: row !important;
							}

							.elementor-element-c5215fb {
								display: flex;
								flex-direction: row !important;
								border: solid 1px #fff;
								border-radius: 0 25px 0 25px;
								padding: 35px 10px;
								margin: 0 25px;
								width: 96%;
							}

							.elementor-element-c5215fb > .elementor-element {
								padding-left: 0;
								padding-right: 0;
							}

							.elementor-element-46de760 h2,
							.elementor-element-ad61cc7 h2 {
								font-size: 23px;
								color: #fff;
							}

							.elementor-element-a7a3586 {
								color: #fff;
							}

							.elementor-element-ff8edeb .elementor-icon-list-text {
								color: #fff;
							}

							.elementor-element-f63b0a0 {
								padding-left: 0;
								padding-right: 0;
							}

							.elementor-element-f63b0a0 .e-con-inner > .elementor-element {
								padding-right: 0;
								padding-left: 0;
							}

							.elementor-element-f63b0a0 h3 {
								color: #fff;
								margin-bottom: 0;
								font-size: 23px;
								text-transform: uppercase;
							}

							.elementor-element-f63b0a0 p {
								color: #fff;
							}

							.elementor-element-f63b0a0 .elementor-image-box-img {
								width: 45%;
								margin-right: 5px !important;
							}

							.elementor-element-f63b0a0 .e-con-inner {
								padding: 25px 0 0 0;
							}

							.elementor-element-f63b0a0 > .e-con-inner .e-con-inner {
								width: 100%;
								margin: 0 auto;
								height: 100%;
								gap: 20px 20px;
							}

							.elementor-element-f63b0a0 > .e-con-inner .e-con-inner > .elementor-widget {
								width: 100%;
							}

							.text-subtitle {
								color: #fff;
								font-weight: bold;
							}

							.giveaway-text-content {
								color: #fff;
							}

							.giveaway-text-content ul {
								padding: 0;
								margin: 0;
								list-style: none;
							}

							.giveaway-text-content li {
								background-image: url('/wp-content/uploads/2024/04/ph_seal-check.svg');
								background-repeat: no-repeat;
								padding-left: 30px;
								padding-bottom: 10px;
							}

							.text-description {
								color: #fff;

							}

							.text-description ul {
								padding: 0;
								margin: 0;
							}

							.text-description li {
								list-style: none;
								background-image: url('/wp-content/uploads/2024/04/ph_seal-check.svg');
								background-repeat: no-repeat;
								padding-left: 30px;
								padding-bottom: 10px;	
							}

							.elementor-element-ac8d139 .e-con-inner,
							.elementor-element-9ec16bd .e-con-inner,
							.elementor-element-c6fcd33 {
								padding-bottom: 0;
							}

							.elementor-element-08eb52e .e-con-inner,
							.elementor-element-9d71dab .e-con-inner {
								padding-top: 0;
							}

							.counter-timer {
								padding: 40px 0;
							}

							.elementor-element-4c96a75 {
								text-align: center;
    						color: #5943CD;
    						font-size: 44px;
    						font-weight: 700;
								line-height: 1;
							}		
							
							.elementor-element-e0dcf98 {
								text-align: center;
							}

							.elementor-element-e0dcf98 a {
								margin-top: 15px;
								display: inline-block;
							}

							.elementor-element-e0dcf98 a:hover {
								background-color: #ff53f2 !important;
								color: #fff !important;
							}
					</style>				
												
				
				
			<div class="elementor-element elementor-element-6fe6dce elementor-widget elementor-widget-text-editor" data-id="6fe6dce" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
						<?= get_the_title($post_id) ?></div>
				</div>

				<div class="elementor-element elementor-element-b3e3690 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="b3e3690" data-element_type="widget" data-widget_type="text-editor.default">
					<div class="elementor-widget-container">
						<?= get_field('capped', $post_id) ?>
					</div>
				</div>

				<div class="elementor-widget-container text-subtitle">
					<?= get_field('subtitle', $post_id) ?>
				</div>

				<div 
					class="elementor-element elementor-element-a08e5ed elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" 
					data-id="a08e5ed" 
					data-element_type="widget" 
					data-widget_type="icon-list.default"
					>
					<div class="elementor-widget-container giveaway-text-content">
						<link rel="stylesheet" href="https://bitslab.com.au/wp-content/plugins/elementor/assets/css/widget-icon-list.min.css">		

						<?= get_the_content() ?>
						
						<!-- <ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">
								<span class="elementor-icon-list-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						
								</span>
								<span class="elementor-icon-list-text">Lian Li O11 VISION Three Side Tempered Glass E-ATX Case – Black Edition</span>
							</li>
							
							<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">Intel Core i7 14700KF 20 Core, 28 Thread CPU</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">GIGABYTE Z790 UD AX DDR5 MOTHERBOARD (WIFI + BT Built In)</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">Lian Li Galahad II Trinity SL-INF 360 ARGB AIO Liquid CPU Cooler – Black</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">MSI GeForce RTX 4080 Super 16G SUPRIM X GDDR6X Graphics Card</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">Team T-Force Delta RGB 32GB DDR5 6000MHz Desktop RAM- Black</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">Crucial P3 Plus 2TB PCIe 4.0 NVMe SSD</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">Gigabyte UD850GM 850W 80+ Gold ATX 3.0 PCIe 5 Fully Modular Power Supply</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">4x Lian Li UNI FAN INFINITY ARGB Fan – Black</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">3x Lian Li UNI FAN INFINITY REVERSE BLADE ARGB Fan – Black</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">Lian-Li Strimer 12VHPWR ARGB Extension Cable</span>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.1744 9.63937C20.8209 9.27 20.4553 8.88938 20.3175 8.55469C20.19 8.24813 20.1825 7.74 20.175 7.24781C20.1609 6.33281 20.1459 5.29594 19.425 4.575C18.7041 3.85406 17.6672 3.83906 16.7522 3.825C16.26 3.8175 15.7519 3.81 15.4453 3.6825C15.1116 3.54469 14.73 3.17906 14.3606 2.82562C13.7137 2.20406 12.9788 1.5 12 1.5C11.0212 1.5 10.2872 2.20406 9.63937 2.82562C9.27 3.17906 8.88938 3.54469 8.55469 3.6825C8.25 3.81 7.74 3.8175 7.24781 3.825C6.33281 3.83906 5.29594 3.85406 4.575 4.575C3.85406 5.29594 3.84375 6.33281 3.825 7.24781C3.8175 7.74 3.81 8.24813 3.6825 8.55469C3.54469 8.88844 3.17906 9.27 2.82562 9.63937C2.20406 10.2863 1.5 11.0212 1.5 12C1.5 12.9788 2.20406 13.7128 2.82562 14.3606C3.17906 14.73 3.54469 15.1106 3.6825 15.4453C3.81 15.7519 3.8175 16.26 3.825 16.7522C3.83906 17.6672 3.85406 18.7041 4.575 19.425C5.29594 20.1459 6.33281 20.1609 7.24781 20.175C7.74 20.1825 8.24813 20.19 8.55469 20.3175C8.88844 20.4553 9.27 20.8209 9.63937 21.1744C10.2863 21.7959 11.0212 22.5 12 22.5C12.9788 22.5 13.7128 21.7959 14.3606 21.1744C14.73 20.8209 15.1106 20.4553 15.4453 20.3175C15.7519 20.19 16.26 20.1825 16.7522 20.175C17.6672 20.1609 18.7041 20.1459 19.425 19.425C20.1459 18.7041 20.1609 17.6672 20.175 16.7522C20.1825 16.26 20.19 15.7519 20.3175 15.4453C20.4553 15.1116 20.8209 14.73 21.1744 14.3606C21.7959 13.7137 22.5 12.9788 22.5 12C22.5 11.0212 21.7959 10.2872 21.1744 9.63937ZM20.0916 13.3228C19.6425 13.7916 19.1775 14.2763 18.9309 14.8716C18.6947 15.4434 18.6844 16.0969 18.675 16.7297C18.6656 17.3859 18.6553 18.0731 18.3638 18.3638C18.0722 18.6544 17.3897 18.6656 16.7297 18.675C16.0969 18.6844 15.4434 18.6947 14.8716 18.9309C14.2763 19.1775 13.7916 19.6425 13.3228 20.0916C12.8541 20.5406 12.375 21 12 21C11.625 21 11.1422 20.5387 10.6772 20.0916C10.2122 19.6444 9.72375 19.1775 9.12844 18.9309C8.55656 18.6947 7.90313 18.6844 7.27031 18.675C6.61406 18.6656 5.92688 18.6553 5.63625 18.3638C5.34562 18.0722 5.33437 17.3897 5.325 16.7297C5.31562 16.0969 5.30531 15.4434 5.06906 14.8716C4.8225 14.2763 4.3575 13.7916 3.90844 13.3228C3.45937 12.8541 3 12.375 3 12C3 11.625 3.46125 11.1422 3.90844 10.6772C4.35562 10.2122 4.8225 9.72375 5.06906 9.12844C5.30531 8.55656 5.31562 7.90313 5.325 7.27031C5.33437 6.61406 5.34469 5.92688 5.63625 5.63625C5.92781 5.34562 6.61031 5.33437 7.27031 5.325C7.90313 5.31562 8.55656 5.30531 9.12844 5.06906C9.72375 4.8225 10.2084 4.3575 10.6772 3.90844C11.1459 3.45937 11.625 3 12 3C12.375 3 12.8578 3.46125 13.3228 3.90844C13.7878 4.35562 14.2763 4.8225 14.8716 5.06906C15.4434 5.30531 16.0969 5.31562 16.7297 5.325C17.3859 5.33437 18.0731 5.34469 18.3638 5.63625C18.6544 5.92781 18.6656 6.61031 18.675 7.27031C18.6844 7.90313 18.6947 8.55656 18.9309 9.12844C19.1775 9.72375 19.6425 10.2084 20.0916 10.6772C20.5406 11.1459 21 11.625 21 12C21 12.375 20.5387 12.8578 20.0916 13.3228ZM16.2806 9.21937C16.3504 9.28903 16.4057 9.37175 16.4434 9.46279C16.4812 9.55384 16.5006 9.65144 16.5006 9.75C16.5006 9.84856 16.4812 9.94616 16.4434 10.0372C16.4057 10.1283 16.3504 10.211 16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1217 15.6557 10.039 15.6004 9.96937 15.5306L7.71937 13.2806C7.57864 13.1399 7.49958 12.949 7.49958 12.75C7.49958 12.551 7.57864 12.3601 7.71937 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44902 11.9996 8.63989 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.289 9.14964 15.3717 9.09432 15.4628 9.05658C15.5538 9.01884 15.6514 8.99941 15.75 8.99941C15.8486 8.99941 15.9462 9.01884 16.0372 9.05658C16.1283 9.09432 16.211 9.14964 16.2806 9.21937Z" fill="white"></path></svg>						</span>
										<span class="elementor-icon-list-text">Lian-Li Strimer Plus 24Pin ARGB Extension Cable</span>
									</li>
						</ul> -->
				</div>
			</div>
			<div 
				class="elementor-element elementor-element-f63b0a0 e-flex e-con-boxed e-con e-child" 
				data-id="f63b0a0" 
				data-element_type="container"
			>
					<div class="e-con-inner">
						<div 
							class="elementor-element elementor-element-fe20cc3 e-flex e-con-boxed e-con e-child" 
							data-id="fe20cc3" 
							data-element_type="container"
						>
							<div class="e-con-inner">
								<div 
									class="elementor-element elementor-element-fbaf89c elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" 
									data-id="fbaf89c" 
									data-element_type="widget" 
									data-widget_type="image-box.default"
								>
									<div class="elementor-widget-container">
										<style>/*! elementor - v3.21.0 - 08-05-2024 */
										.elementor-widget-image-box .elementor-image-box-content{width:100%}
										
										@media (min-width:768px){
											.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,
											.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper{display:flex}
											.elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper{text-align:end;flex-direction:row-reverse}
											.elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper{text-align:start;flex-direction:row}
											.elementor-widget-image-box.elementor-position-top .elementor-image-box-img{margin:auto}
											.elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper{align-items:flex-start}
											.elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper{align-items:center}
											.elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper{align-items:flex-end}
										}
										
										@media (max-width:767px){
											.elementor-widget-image-box .elementor-image-box-img{margin-left:auto!important;margin-right:auto!important;margin-bottom:15px}}
											.elementor-widget-image-box .elementor-image-box-img{display:inline-block}
											.elementor-widget-image-box .elementor-image-box-title a{color:inherit}
											.elementor-widget-image-box .elementor-image-box-wrapper{text-align:center}
											.elementor-widget-image-box .elementor-image-box-description{margin:0}
										</style>
										
										<div class="elementor-image-box-wrapper">
											<figure class="elementor-image-box-img">
												<picture>
													<source type="image/webp" data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/date-icon.png.webp" srcset="https://bitslab.com.au/wp-content/uploads/2024/04/date-icon.png.webp">
														<img loading="lazy" decoding="async" width="60" height="60" src="https://bitslab.com.au/wp-content/uploads/2024/04/date-icon.png" class="attachment-full size-full wp-image-3995 lazyloaded" alt="" data-eio="p" data-src="https://bitslab.com.au/wp-content/uploads/2024/04/date-icon.png" data-eio-rwidth="60" data-eio-rheight="60">
														<noscript>
															<img loading="lazy" decoding="async" width="60" height="60" src="https://bitslab.com.au/wp-content/uploads/2024/04/date-icon.png" class="attachment-full size-full wp-image-3995" alt="" data-eio="l" />
														</noscript>
												</picture>
											</figure>
											<div class="elementor-image-box-content">
												<h3 class="elementor-image-box-title">Date</h3>
												<p class="elementor-image-box-description"><?= date("d/m/Y", strtotime(get_field('datetime_countdown', $post_id))) ?></p>
											</div>
										</div>		
								</div>
							</div>
						</div>
					</div>
						<div 
							class="elementor-element elementor-element-5dfc7de e-flex e-con-boxed e-con e-child" 
							data-id="5dfc7de" 
							data-element_type="container"
							>
								<div class="e-con-inner">
									<div 
										class="elementor-element elementor-element-728babc elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" 
										data-id="728babc" 
										data-element_type="widget" 
										data-widget_type="image-box.default"
									>
										<div class="elementor-widget-container">
											<div 
												class="elementor-image-box-wrapper"
											>
												<figure class="elementor-image-box-img">
													<picture>
														<source 
															type="image/webp" 
															data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/time-icon.png.webp" srcset="https://bitslab.com.au/wp-content/uploads/2024/04/time-icon.png.webp"><img loading="lazy" 
															decoding="async" 
															width="60" 
															height="60" src="https://bitslab.com.au/wp-content/uploads/2024/04/time-icon.png" class="attachment-full size-full wp-image-3997 lazyloaded" 
															alt="" 
															data-eio="p" 
															data-src="https://bitslab.com.au/wp-content/uploads/2024/04/time-icon.png" data-eio-rwidth="60" 
															data-eio-rheight="60"
														>
															<noscript>
																<img 
																	loading="lazy" 
																	decoding="async" 
																	width="60" 
																	height="60" 
																	src="https://bitslab.com.au/wp-content/uploads/2024/04/time-icon.png" class="attachment-full size-full wp-image-3997" 
																	alt="" 
																	data-eio="l" />
															</noscript>
														</picture>
													</figure>
													
													<div 
														class="elementor-image-box-content"
													>
														<h3 class="elementor-image-box-title">Time</h3>
														<p class="elementor-image-box-description"><?= date("h:A", strtotime(get_field('datetime_countdown', $post_id))); ?></p>
													</div>
												</div>		
											</div>
										</div>
									</div>
								</div>
								<div 
									class="elementor-element elementor-element-55d7262 e-flex e-con-boxed e-con e-child" data-id="55d7262" 
									data-element_type="container"
								>
									<div class="e-con-inner">
										<div 
											class="elementor-element elementor-element-a322dd7 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" 
											data-id="a322dd7" 
											data-element_type="widget" 
											data-widget_type="image-box.default"
										>
											<div class="elementor-widget-container">
												<div class="elementor-image-box-wrapper">
													<figure class="elementor-image-box-img">
														<picture>
															<source 
																type="image/webp" 
																data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/location-icon.png.webp" 
																srcset="https://bitslab.com.au/wp-content/uploads/2024/04/location-icon.png.webp"
															>
																<img 
																	loading="lazy" 
																	decoding="async" 
																	width="60" 
																	height="60" 
																	src="https://bitslab.com.au/wp-content/uploads/2024/04/location-icon.png" class="attachment-full size-full wp-image-3996 lazyloaded" 
																	alt="" 
																	data-eio="p" 
																	data-src="https://bitslab.com.au/wp-content/uploads/2024/04/location-icon.png" data-eio-rwidth="60" 
																	data-eio-rheight="60"
																>
																<noscript>
																	<img 
																		loading="lazy" 
																		decoding="async" 
																		width="60" 
																		height="60" 
																		src="https://bitslab.com.au/wp-content/uploads/2024/04/location-icon.png" class="attachment-full size-full wp-image-3996" 
																		alt="" 
																		data-eio="l" 
																	/>
																</noscript>
															</picture>
														</figure>
														<div class="elementor-image-box-content">
															<h3 class="elementor-image-box-title">Location</h3>
															<p class="elementor-image-box-description">Lives on Facebook and Instagram</p>
														</div>
													</div>		
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div 
					class="elementor-element elementor-element-c5215fb e-con-full e-flex e-con e-child" 
					data-id="c5215fb" 
					data-element_type="container"
				>
					<div 
						class="elementor-element elementor-element-448f752 e-con-full e-flex e-con e-child" 
						data-id="448f752" 
						data-element_type="container"
					>
						<div 
							class="elementor-element elementor-element-46de760 elementor-widget elementor-widget-heading" 
							data-id="46de760" 
							data-element_type="widget" 
							data-widget_type="heading.default"
						>
							<div class="elementor-widget-container">
								<h2 class="elementor-heading-title elementor-size-default"><?= get_field('description_title_1', $post_id) ?></h2>		
							</div>
						</div>
						
						<div 
							class="elementor-element elementor-element-a7a3586 elementor-widget elementor-widget-text-editor" 
							data-id="a7a3586" 
							data-element_type="widget" 
							data-widget_type="text-editor.default"
						>
							<div class="elementor-widget-container">
								<?= get_field('description_1') ?>					
							</div>
						</div>
					</div>
		
					<div 
						class="elementor-element elementor-element-40eebc6 e-con-full e-flex e-con e-child" 
						data-id="40eebc6" 
						data-element_type="container"
					>
						<div 
							class="elementor-element elementor-element-ad61cc7 elementor-widget elementor-widget-heading" 
							data-id="ad61cc7" 
							data-element_type="widget" 
							data-widget_type="heading.default"
						>
							<div class="elementor-widget-container">
								<h2 class="elementor-heading-title elementor-size-default"><?= get_field('description_title_2', $post_id) ?></h2>		
							</div>
						</div>

						<div 
							class="elementor-element elementor-element-ff8edeb elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list text-description" 
							data-id="ff8edeb" 
							data-element_type="widget" 
							data-widget_type="icon-list.default"
						>
							<div class="elementor-widget-container">
								<?= get_field('description_2', $post_id) ?>					
							</div>
						</div>
					</div>
				</div>

				<div 
					class="elementor-element elementor-element-c6fcd33 e-con-full e-flex e-con e-child" 
					data-id="c6fcd33" 
					data-element_type="container"
				>
					<div 
						class="elementor-element elementor-element-cdd0d03 elementor-widget elementor-widget-image" 
						data-id="cdd0d03" 
						data-element_type="widget" 
						data-widget_type="image.default"
					>
						<div class="elementor-widget-container">
							<picture>
								<source 
									sizes="331px" 
									type="image/webp" 
									data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png.webp 441w, https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch-300x43.png.webp 300w" 
									srcset="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png.webp 441w, https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch-300x43.png.webp 300w"
								>
									<img 
										loading="lazy" 
										decoding="async" 
										width="441" 
										height="63" 
										src="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png" 
										class="attachment-large size-large wp-image-4018 lazyautosizes lazyloaded" 
										alt="" 
										data-eio="p" 
										data-src="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png" 
										data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png 441w, https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch-300x43.png 300w" 
										data-sizes="auto" 
										data-eio-rwidth="441" 
										data-eio-rheight="63" 
										sizes="331px" 
										srcset="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png 441w, https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch-300x43.png 300w"
									>
									<noscript>
										<img 
											loading="lazy" 
											decoding="async" 
											width="441" 
											height="63" 
											src="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png" 
											class="attachment-large size-large wp-image-4018" 
											alt="" 
											srcset="https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch.png 441w, https://bitslab.com.au/wp-content/uploads/2024/04/bottom-notch-300x43.png 300w" 
											sizes="(max-width: 441px) 100vw, 441px" 
											data-eio="l" 
										/>
									</noscript>
								</picture>													
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



    <?php
			break;
		}
		
	} else {
			esc_html_e('Sorry, no posts matched your criteria.');
	}
	
			wp_reset_postdata();
	}
  

	protected function xrender()
	{
		$settings = $this->get_settings_for_display();
?>

		<div class="bitslab-giveaway bitslab-giveaway-widget">
			<?php
			$args = [
				'post_type' => 'giveaway',
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'order' => 'DESC',
				'orderby' => 'date',
				'meta_query'	=> [[
					'key' => 'datetime_countdown',
					'compare' => '>=',
					'value' => date("Y-m-d"),
					'type' => 'DATE'
				]]
			];

			$the_query = new WP_Query($args);

			if ($the_query->have_posts()) {
				echo '<div class="bitslab-giveaway-grid__inner asddsadsadasdadasd">';
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id = get_the_ID();
					$value = get_field('value', $post_id);
					$color_title = get_field('color_title', $post_id);
					$datetime_countdown = get_field('datetime_countdown', $post_id);
					$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
					$url = get_permalink();
					if (is_user_logged_in()) {
						$id_current_user = get_current_user_id();
						$list_user_meta = get_post_meta($post_id, '_list_user', true);
						$max_join_user = get_field('max_join_user', $post_id);
						if ($list_user_meta) {
							$args_user = json_decode($list_user_meta);

							if ($max_join_user <= count($args_user)) {
								$url = "javascript:void(0)";
							}
						}
					}

			?>
					<div class="bitslab-giveaway__inner">
						<div class="bitslab-giveaway__col bitslab-giveaway__image">
							<a href="<?= $url ?>">
								<img src="<?php echo $featured_img_url; ?>" />
							</a>
						</div>
						<div class="bitslab-wrap bitslab-giveaway__col bitslab-giveaway__content">
							<h4 class="bitslab-giveaway__content-title">
								<a href="<?= $url ?>" style="color: <?= $color_title ?>">
									<?= get_the_title($post_id) ?>
								</a>
							</h4>

							<div class="bitslab-giveaway__col bitslab-giveaway__value-mobile">
								<?= $value ?>
							</div>

							<div class="bitslab-giveaway__content-desc">
								<?= get_the_content() ?>
							</div>
							<div class="d-flex">
								
								<?php //max_join_user
								//$showEntriesFrontEnd = showEntriesFrontEnd();
								//echo array_sum($showEntriesFrontEnd);
								//echo $post_id;
								$valueStock = get_field('value', $post_id);

								//$showEntriesFrontEnd = showEntriesFrontEnd($post_id);

								$badsymbols = array(",", ".");
							    $valueStocks = get_field('max_join_user', $post_id);
							    // $showEntriesFrontEnd = json_decode(get_post_meta($post_id, '_list_user', true));
							    // $ListUserFirstSubs = json_decode(get_post_meta($post_id, '_list_user_first_subs', true));
							    //echo "<pre>";print_r($ListUserFirstSubs);
							    // if(empty($ListUserFirstSubs)){ //echo "fsfsdf";
							    //	$ListUserFirstSubs = array(53);
							    // }
							    // if($showEntriesFrontEnd){ //echo "fsdfs";
							    //	$showEntriesFrontEnd = array_unique(array_merge($showEntriesFrontEnd, $ListUserFirstSubs));
							    	//echo "<pre>";print_r($ListUserFirstSubs);
							    // }
							    //echo "<pre>";print_r($showEntriesFrontEnd);
								?>
								
								<div class="progress-box 1212">
									<?php
									$showEntriesFrontEndaray = showEntriesFrontEnd($post_id); //(!empty($showEntriesFrontEnd)) ? count($showEntriesFrontEnd) : count($ListUserFirstSubs);
									?>
									<p><?php echo $valueStocks > $showEntriesFrontEndaray ?  $showEntriesFrontEndaray : $valueStocks;?> / <?php echo $valueStocks;?></p>
									<progress id="file" value="<?php echo $showEntriesFrontEndaray;?>" max="<?php echo $valueStocks;?>"></progress>
									<!-- <div class="progress-circle">test</div> -->
								</div>

								<div class="ml-4 date-giveaway">
									<p><?= date("d/m/Y", strtotime($datetime_countdown)) ?></p>
								</div>
							</div>
							<div>
								<div class="watch-live">watch live</div>
								<div class="bitslab-countdown-timer bitslab-giveaway__content-timer" data-datetime="<?= $datetime_countdown ?>" data-giveaway-id="<?= $post_id ?>">
									<div id="days"></div>
									<div id="hours"></div>
									<div id="minutes"></div>
									<div id="seconds"></div>
								</div>
							</div>

							<?php 

							$max_join_user = get_field('max_join_user', $post_id);

							$id_current_user = get_current_user_id();
							
							$entries = get_user_meta($id_current_user, 'number_entries', true);
							
							if (is_user_logged_in()) {
								
								$list_user_meta = get_post_meta($post_id, '_list_user', true);
								
								

								$user_infos = get_userdata($id_current_user);
								$user_roless = $user_infos->roles;

							    //if($valueStock != $showEntriesFrontEnd){
								// echo $id_current_user;
								// echo "<pre>";print_r($ListUserFirstSubs);die("dfgd");
								//echo $valueStocks;
								//if ($list_user_meta) {
								$showEntriesFrontEnd_aray = showEntriesFrontEnd_Array($post_id);
								
								if($showEntriesFrontEndaray){
									$args_user = json_decode($list_user_meta);

									//if ($max_join_user <= count($args_user)) {
									if($valueStocks != $showEntriesFrontEndaray){
										if (in_array($id_current_user, $showEntriesFrontEnd_aray)) {
											?>
											<div class="bitslab-giveaway__content-button ">
												<a href="<?php echo get_permalink() ?>/#signup-login" class="btn-disableds">BUY MORE ENTRIES</a>
											</div>
										<?php
										}elseif($user_roless[0]=='one-time') {
											?>
											<div class="bitslab-giveaway__content-button ">
												<a href="<?php echo get_permalink() ?>/#signup-login" class="btn-disableds">ENTER NOW</a>
											</div>
										<?php
										}else{
											?>
											<div class="bitslab-giveaway__content-button 232323" data-link="<?php echo get_permalink() ?>/#signup-login" <?php
																						if (!empty($entries)) {
																							echo 'data-id-user="' . get_current_user_id() . '"';
																						}
																						?> data-post-id=<?= $post_id ?>>
											<a href="javascript:void(0)">ENTER NOW</a>
										</div>
											<?php
										}	
							?>
										
									<?php
									} elseif (in_array($id_current_user, $showEntriesFrontEnd_aray)) {
									?>
										<div class="bitslab-giveaway__content-button">
											<a href="<?php echo get_permalink() ?>/#signup-login" class="btn-disableds">BUY MORE ENTRIES</a>
										</div>
									<?php
									} else {
									?>
									<div class="bitslab-giveaway__content-button">
											<a href="javascript:void(0)" class="btn-disabled">CAPPED AT ONLY <?= $max_join_user ?> ENTRANTS</a>
										</div>
										
									<?php }
								} else { ?>
									<div class="bitslab-giveaway__content-button saddad" data-link="<?php echo get_permalink() ?>/#signup-login" <?php
																					if (!empty($entries)) {
																						echo 'data-id-user="' . get_current_user_id() . '"';
																					}
																					?> data-post-id=<?= $post_id ?>>
										<a href="javascript:void(0)">ENTER NOW</a>
									</div>
								<?php } ?>
							<?php } elseif ($valueStocks == $showEntriesFrontEndaray) {
											?>
												<div class="bitslab-giveaway-grid__content-col  bitslab-giveaway__content-button 4">
													<a href="javascript:void(0)" class="btn-disabled">CAPPED AT ONLY <?= $max_join_user ?> ENTRANTS</a>
												</div>
											<?php

							
											} elseif ( $valueStocks > $showEntriesFrontEndaray ) {
							?>
								<div class="bitslab-giveaway__content-button">
									<a href="<?= $url ?>#signup-login">ENTER NOW</a>
									<!-- <a href="/become-a-member/#choose-package">ENTER NOW</a> -->
								</div>
							<?php } ?>
						</div>
						<div class="bitslab-giveaway__col bitslab-giveaway__value">
							<?= $value ?>
						</div>
					</div>
			<?php
					break;
				}
				echo '</div>';
			} else {
				esc_html_e('Sorry, no posts matched your criteria.');
			}
			// Restore original Post Data.
			wp_reset_postdata();
			?>
		</div>
<?php
	}

	protected function content_template()
	{
	}
}
