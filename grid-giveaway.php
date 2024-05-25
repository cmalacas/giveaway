<?php
class Elementor_Grid_GiveAway_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'grid-giveaway-widget';
	}

	public function get_title()
	{
		return esc_html__('Grid GiveAway', 'briantech');
	}

	public function get_icon()
	{
		return 'eicon-gallery-grid';
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
		return ['giveaway', 'grid'];
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

		$this->add_control(
			'type_giveaway',
			[
				'label' => esc_html__('Select Type Giveaway', 'briantech'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__('Default', 'briantech'),
					'ending-soon' => esc_html__('Ending Soon', 'briantech'),
					'past-winner'  => esc_html__('Past Winner', 'briantech')
				]
			]
		);

		$this->add_control(
			'number_of_post',
			[
				'label' => esc_html__('Number of Post', 'briantech'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 100,
				'step' => 1,
				'default' => 4,
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$number_of_post = $settings['number_of_post'];
		$type_giveaway = $settings['type_giveaway'];
?>
		<div class="bitslab-giveaway-grid bitslab-giveaway-widget">
			<?php
			$post_type = get_post_type();
			$current_id_post = '';
			$offset = 1;
            if ($post_type === 'giveaway') {
                $current_id_post = get_the_ID();
				$offset = '';
            }
			$args = [
				'post_type' => 'giveaway',
				'posts_per_page' => $number_of_post,
				'post_status' => 'publish',
        'post__not_in'   => [$current_id_post],
				'offset'         => $offset,
			];

			if ($type_giveaway == 'ending-soon') {
				$args['meta_query'] = [[
					'key' => 'datetime_countdown',
					'compare' => '>=',
					'value' => date("Y-m-d"),
					'type' => 'DATE'
				]];
			}

			if ($type_giveaway == 'past-winner') {
				$args['meta_query'] = [[
					'key' => 'datetime_countdown',
					'compare' => '<',
					'value' => date("Y-m-d"),
					'type' => 'DATE'
				]];
			}

			$the_query = new WP_Query($args);

			if ($the_query->have_posts()) {
				echo '<div class="bitslab-giveaway-grid__inner">';
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id = get_the_ID();
					$value = get_field('value', $post_id);
					$color_title = get_field('color_title', $post_id);
					$datetime_countdown = get_field('datetime_countdown', $post_id);
					$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
					if ($type_giveaway == 'past-winner') {
						$url = 'javascript:void(0)';
					} else {
						$url = get_permalink();
					}

			?>
					<div class="bitslab-giveaway-grid__item">
						<a href="<?= $url ?>" class="bitslab-giveaway-grid__item-image">
							<?php if ($featured_img_url) { ?>
								<img src="<?php echo $featured_img_url; ?>" />
							<?php } ?>
						</a>
						<div class="bitslab-wrap bitslab-giveaway-grid__content">
							<div class="bitslab-giveaway-grid__content-top">
								<div class="bitslab-giveaway-grid__content-col bitslab-title">
									<a href="<?= $url ?>" style="color: <?= $color_title ?>"><?= get_the_title() ?></a>
								</div>
								<div class="bitslab-giveaway-grid__content-col bitslab-value">
									<?= $value ?>
								</div>
							</div>
							<div>
								
								<?php 
								
								$showEntriesFrontEnd = showEntriesFrontEnd($post_id);

								$showEntriesFrontEndaray = showEntriesFrontEnd_Array($post_id);

								//var_dump($showEntriesFrontEnd);

								//echo array_sum($showEntriesFrontEnd);
								$valueStock = get_field('value', $post_id);
								$badsymbols = array(",", ".");
							    $valueStocks = get_field('max_join_user', $post_id);
							    // $showEntriesFrontEnd = json_decode(get_post_meta($post_id, '_list_user', true));
							    $ListUserFirstSubs = json_decode(get_post_meta($post_id, '_list_user_first_subs', true));
							    if(empty($ListUserFirstSubs)){
							    	$ListUserFirstSubs = array(53);
							    }
							    if($showEntriesFrontEnd){
							    	// $showEntriesFrontEnd = array_unique(array_merge($showEntriesFrontEnd, $ListUserFirstSubs));
							    }
							    // $showEntriesFrontEnd_aray = (!empty($showEntriesFrontEnd)) ? $showEntriesFrontEnd : $ListUserFirstSubs;
		    					//$showEntriesFrontEndaray = (!empty($showEntriesFrontEnd)) ? count($showEntriesFrontEnd) : count($ListUserFirstSubs);
								?>
								
								<div class="progress-box 6767">
									<?php
									// $showEntriesFrontEnd = (!empty($showEntriesFrontEnd)) ? count($showEntriesFrontEnd) : count($ListUserFirstSubs);
									?>
									<p><?php echo $showEntriesFrontEnd;?> / <?php echo $valueStocks;?></p>
									<progress id="file" value="<?php echo $showEntriesFrontEnd;?>" max="<?php echo $valueStocks;?>"></progress>
									<!-- <div class="progress-circle">test</div> -->
								</div>
							</div>
							<?php if ($type_giveaway != 'past-winner') { ?>
								<div class="bitslab-giveaway-grid__content-bottom">
									<div class="bitslab-giveaway-grid__content-col bitslab-coundown ">
										<div class="watch-live"  data-datetime="<?= $datetime_countdown ?>" data-giveaway-id="<?= $post_id ?>">watch live</div>
										<div class="bitslab-countdown-timer" data-datetime="<?= $datetime_countdown ?>" data-giveaway-id="<?= $post_id ?>">
											<div id="days"></div>
											<div id="hours"></div>
											<div id="minutes"></div>
											<div id="seconds"></div>
										</div>
									</div>
									<?php if (is_user_logged_in()) {
										$id_current_user = get_current_user_id();
										$list_user_meta = get_post_meta($post_id, '_list_user', true);
										$max_join_user = get_field('max_join_user', $post_id);
										$entries = get_user_meta($id_current_user, 'number_entries', true);
										//echo "<pre>";print_r($entries);
										if($showEntriesFrontEndaray){
											$args_user = json_decode($list_user_meta);
											if (in_array($id_current_user, $showEntriesFrontEndaray)) {
									?>
												<div class="bitslab-giveaway-grid__content-col bitslab-giveaway__content-button 3">
												<a href="<?php echo get_permalink() ?>/#signup-login" class="btn-get-more-entries">GET MORE ENTRIES</a>
												</div>
											<?php
											} elseif ($valueStocks == $showEntriesFrontEndaray) {
											?>
												<div class="bitslab-giveaway-grid__content-col  bitslab-giveaway__content-button 4">
													<a href="javascript:void(0)" class="btn-disabled">CAPPED AT ONLY <?= $max_join_user ?> ENTRANTS</a>
												</div>
											<?php
											} else { ?>
												<div class="bitslab-giveaway__content-button 5" data-link="<?php echo get_permalink() ?>/#signup-login" <?php
																								if (!empty($entries)) {
																									echo 'data-id-user="' . get_current_user_id() . '"';
																								}
																								?> data-post-id=<?= $post_id ?>>
													<a href="javascript:void(0)">ENTER NOW</a>
												</div>
											<?php }
										} 
										 else { ?>
											<div class="bitslab-giveaway__content-button 1" data-link="<?php echo get_permalink() ?>/#signup-login" <?php
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
											}else { ?>
										<div class="bitslab-giveaway-grid__content-col bitslab-giveaway__content-button 2">
											<a href="<?= $url ?>#signup-login">ENTER NOW</a>
											<!-- <a href="/become-a-member/#choose-package">ENTER NOW</a> -->
										</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
			<?php
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
