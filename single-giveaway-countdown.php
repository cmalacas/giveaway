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

				$users = [];

				$result = $wpdb->get_results("SELECT user_id FROM {$wpdb->prefix}usermeta WHERE meta_key = 'subscription_status' AND meta_value = 'active'");

				foreach($result as $r) {

					$users[] = $r->user_id;

				}

				$oneOffResults = $wpdb->get_results("SELECT user_id FROM {$wpdb->prefix}one_of_package WHERE post_id = $post_id");

				foreach($oneOffResults as $row) {
					$users[] = $row->user_id;
				}

				$showEntriesFrontEnd = count(array_unique($users));

				$showEntriesFrontEnd = $showEntriesFrontEnd < $max_join_user ? $showEntriesFrontEnd : $max_join_user;

    ?>
		<style>
			.elementor-element.elementor-element-7eb57bb {
				text-align: center;
				color: #00BEAD;
				font-size: 24px;
			}

			.elementor-element-8a3331f > .elementor-widget-container {
				padding: 10px 10px 10px 10px;
    		background-color: transparent;
    		background-image: linear-gradient(180deg, #4F7FF2 0%, #5946CE 100%);
    		border-radius: 50px 50px 50px 50px;
				color: #fff;
				font-weight: 600;
				font-size: 24px;
				width: 15%;
				text-align: center;
				margin: 0 auto;
			}

			.progress-box progress {
				margin: 0 auto;
				display: block;
    		vertical-align: baseline;
    		position: relative;
    		-webkit-appearance: none;
    		appearance: none;
    		background-color: transparent;
    		border-radius: 100px;
				width: 35%;
			}

			.progress-box p {
				text-align: center;
				font-size: 22px;
			}

			.elementor-element-9919f69 .bitslab-countdown-timer {
				justify-content: center;
			}

			.elementor-element-9919f69 .bitslab-countdown-timer #days,
			.elementor-element-9919f69 .bitslab-countdown-timer #hours,
			.elementor-element-9919f69 .bitslab-countdown-timer #minutes,
			.elementor-element-9919f69 .bitslab-countdown-timer #seconds {
				padding: 25px 60px;
				background: url('/wp-content/uploads/2024/04/timer-bg.png') no-repeat;
			}

			.elementor-element-9919f69 .bitslab-countdown-timer > div > span:nth-child(1) {
				background: transparent;
    		border: none;
    		color: #fff;
    		text-shadow: 0 2px 6px rgba(0,0,0,.25);
    		font-size: 40px;
    		padding: 0;
			}

			.elementor-element-9919f69 .bitslab-countdown-timer > div > span:nth-child(2) {
				background: #fff;
    		padding: 13px 25px;
    		color: #F777F2;
    		border-radius: 100px;
    		font-size: 20px;
    		font-weight: bold;
			}
		</style>

  	<div 
			class="elementor-element elementor-element-9919f69 e-flex e-con-boxed e-con e-child" 
			data-id="9919f69" 
			data-element_type="container" 
			data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"
		>
			<div class="e-con-inner">
					<div 
						class="elementor-element elementor-element-7eb57bb elementor-widget elementor-widget-text-editor" 
						data-id="7eb57bb" 
						data-element_type="widget" 
						data-widget_type="text-editor.default"
					>
						<div class="elementor-widget-container">
							Entrants				
						</div>
					</div>

				<div class="progress-box 1212">
					<p><?= $showEntriesFrontEnd ?> / <?= $max_join_user ?></p>
					<progress id="file" value="<?= $showEntriesFrontEnd ?>" max="<?= $max_join_user ?>"></progress>									
				</div>
				
        <div 
					class="elementor-element elementor-element-8a3331f elementor-widget__width-initial elementor-widget elementor-widget-text-editor" 
					data-id="8a3331f" 
					data-element_type="widget" 
					data-widget_type="text-editor.default"
				>
				  <div class="elementor-widget-container">
							Time Left						
					</div>
				</div>	
			</div>
			
			<div class="elementor-element counter-timer">
				<div class="e-con-inner">
					<div 
						class="bitslab-countdown-timer bitslab-giveaway__content-timer" 
						data-datetime="<?= get_field('datetime_countdown', $post_id) ?>" 
						data-giveaway-id="<?= $post_id ?>">
							<div id="days"><span>18</span><span>Day</span></div>
							<div id="hours"><span>15</span><span>Hrs</span></div>
							<div id="minutes"><span>50</span><span>Min</span></div>
							<div id="seconds"><span>50</span><span>Sec</span></div>
					</div>
				</div>
			</div>
		</div>

		<div 
			class="elementor-element elementor-element-4c96a75 elementor-widget elementor-widget-text-editor" 
			data-id="4c96a75" 
			data-element_type="widget" 
			data-widget_type="text-editor.default"
		>
			<div class="elementor-widget-container">
				Or <span style="color: #ff12d2;">$3500</span> Cash						
			</div>
		</div>

		<div 
			class="elementor-element elementor-element-e0dcf98 elementor-widget elementor-widget-button" 
			data-id="e0dcf98" 
			data-element_type="widget" 
			data-widget_type="button.default"
		>
			<div class="elementor-widget-container">
				<div class="elementor-button-wrapper">
					<a class="elementor-button elementor-button-link elementor-size-sm" href="<?= get_permalink() ?>#signup-login">
						<span class="elementor-button-content-wrapper">
							<span class="elementor-button-text">Enter Now</span>
						</span>
					</a>
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
