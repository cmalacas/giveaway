<?php
class Elementor_Single_GiveAway_Countdown_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'single-giveaway-countdown-widget';
	}

	public function get_title()
	{
		return esc_html__('Single GiveAway Countdown', 'briantech');
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
		return ['giveaway', 'single', 'countdown'];
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

                <div class="elementor-element elementor-element-9919f69 e-flex e-con-boxed e-con e-child" data-id="9919f69" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
					<div class="e-con-inner">
				        <div class="elementor-element elementor-element-7eb57bb elementor-widget elementor-widget-text-editor" data-id="7eb57bb" data-element_type="widget" data-widget_type="text-editor.default">
				            <div class="elementor-widget-container">
							    Entrants				
                            </div>
				        </div>
				
                        <div class="elementor-element elementor-element-8a3331f elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="8a3331f" data-element_type="widget" data-widget_type="text-editor.default">
				            <div class="elementor-widget-container">
							Time Left						</div>
				</div>
				<div class="elementor-element elementor-element-c0021ce elementor-widget elementor-widget-single-giveaway-widget" data-id="c0021ce" data-element_type="widget" id="single-giveaway_landing" data-widget_type="single-giveaway-widget.default">
				<div class="elementor-widget-container">
			
		<div class="bitslab-giveaway bitslab-giveaway-widget">
			<div class="bitslab-giveaway-grid__inner asddsadsadasdadasd">					<div class="bitslab-giveaway__inner">
						<div class="bitslab-giveaway__col bitslab-giveaway__image">
							<a href="https://bitslab.com.au/giveaway/hyte-y70-rebel/">
								<picture><source type="image/webp" data-srcset="https://bitslab.com.au/wp-content/uploads/2024/04/MagicEraser_240521_220806.jpg.webp"><img decoding="async" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAB4AAAAeAAQAAAAAH2XdrAAAAAnRSTlMAAHaTzTgAAAHXSURBVHja7cExAQAAAMKg9U9tDB+gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHgaD+kAAcuGLKEAAAAASUVORK5CYII=" data-eio="p" data-src="https://bitslab.com.au/wp-content/uploads/2024/04/MagicEraser_240521_220806.jpg" class="lazyload" data-eio-rwidth="1920" data-eio-rheight="1920"><noscript><img decoding="async" src="https://bitslab.com.au/wp-content/uploads/2024/04/MagicEraser_240521_220806.jpg" data-eio="l" /></noscript></picture>
							</a>
						</div>
						<div class="bitslab-wrap bitslab-giveaway__col bitslab-giveaway__content">
							<h4 class="bitslab-giveaway__content-title">
								<a href="https://bitslab.com.au/giveaway/hyte-y70-rebel/" style="color: #B609E7">
									Hyte Y70 Rebel								</a>
							</h4>

							<div class="bitslab-giveaway__col bitslab-giveaway__value-mobile">
								Or $3500 Cash							</div>

							<div class="bitslab-giveaway__content-desc">
								<div class="page" title="Page 1">
<div class="layoutArea">
<div class="column">

<span style="color: #ff0000;"><strong>Capped at 400 Entrants! RRP $5700</strong></span>

<span style="color: #33cccc;"><strong><span style="color: #cc99ff;">Hyte Y70 Touch</span> 4080 SUPER <span style="color: #cc99ff;">Gaming Rig by LCC</span></strong></span>
<ul>
 	<li>Hyte Y70 Touch - Black</li>
 	<li>Asus ROG Strix GeForce RTX 4080 SUPER OC 16GB Graphics Card</li>
 	<li>Asus ROG Strix Z790 H Z790-H Gaming WIFI LGA 1700 ATX</li>
 	<li>Intel Core i7 14700KF Processor</li>
 	<li>DeepCool Mystique 360 Liquid CPU Cooler LCD All-In-One Water Cooler</li>
 	<li>Corsair Dominator RGB 32GB (2x16GB) DDR5</li>
 	<li>Crucial P3 Plus M.2 NVMe SSD 2TB</li>
 	<li>Lian Li Strimer Cables</li>
 	<li>be quiet Pure Power 12M 80+ Gold 1000W Modular PCIe 5.0 Power Supply</li>
 	<li>9x Lian Li SL120 UNI FAN</li>
 	<li>Windows 11 Professional</li>
</ul>
<div dir="auto"><span style="color: #ff0000;">Noone caps a giveaway at 400</span>, wait on, we do 🙂</div>
<div dir="auto">Others are capping at 800 or more, come to Bits Lab and enjoy a cap that can double your chances!</div>
<div dir="auto"></div>
<strong><span style="color: #cc99ff;">Winner can choose 1 of the below.</span></strong>
<ul>
 	<li>Y70 Rebel 4080 SUPER Gaming Rig</li>
 	<li>$3500 Cash alternative</li>
</ul>
<em>Note: Not available to ACT customers.</em>

</div>
</div>
</div>							</div>
							<div class="d-flex">
								
																
								<div class="progress-box 1212">
																		<p>299 / 400</p>
									<progress id="file" value="299" max="400"></progress>
									<!-- <div class="progress-circle">test</div> -->
								</div>

								<div class="ml-4 date-giveaway">
									<p>14/06/2024</p>
								</div>
							</div>
							<div>
								<div class="watch-live">watch live</div>
								<div class="bitslab-countdown-timer bitslab-giveaway__content-timer" data-datetime="2024-06-14 12:00 pm" data-giveaway-id="4422">
									<div id="days"><span>18</span><span>Day</span></div>
									<div id="hours"><span>21</span><span>Hrs</span></div>
									<div id="minutes"><span>30</span><span>Min</span></div>
									<div id="seconds"><span>23</span><span>Sec</span></div>
								</div>
							</div>

																		<div class="bitslab-giveaway__content-button 232323" data-link="https://bitslab.com.au/giveaway/hyte-y70-rebel//#signup-login" data-post-id="4422">
											<a href="javascript:void(0)">ENTER NOW</a>
										</div>
																					
																						</div>
						<div class="bitslab-giveaway__col bitslab-giveaway__value">
							Or $3500 Cash						</div>
					</div>
			</div>		</div>
		</div>
				</div>
				<div class="elementor-element elementor-element-4c96a75 elementor-widget elementor-widget-text-editor" data-id="4c96a75" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							Or <span style="color: #ff12d2;">$3500</span> Cash						</div>
				</div>
				<div class="elementor-element elementor-element-e0dcf98 elementor-widget elementor-widget-button" data-id="e0dcf98" data-element_type="widget" data-widget_type="button.default">
				<div class="elementor-widget-container">
					<div class="elementor-button-wrapper">
			<a class="elementor-button elementor-button-link elementor-size-sm" href="#enroll-scroll">
						<span class="elementor-button-content-wrapper">
									<span class="elementor-button-text">Enter Now</span>
					</span>
					</a>
		</div>
				</div>
				</div>
					</div>
				</div>
               
               <?php

               break;

            }
        }

    }

	protected function content_template()
	{
	}
}
