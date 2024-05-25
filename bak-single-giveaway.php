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

	protected function render()
	{

		global $wpdb;

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
							<div>
								
								<?php //max_join_user
								//$showEntriesFrontEnd = showEntriesFrontEnd();
								//echo array_sum($showEntriesFrontEnd);
								//echo $post_id;
								$valueStock = get_field('value', $post_id);
								$badsymbols = array(",", ".");
							    $valueStocks = get_field('max_join_user', $post_id);

									$users = [];

									$userResult = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}postmeta WHERE (meta_key = '_list_user') AND post_id = $post_id");

    							$subResult = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}postmeta WHERE (meta_key = '_list_user_first_subs') AND post_id = $post_id");

									$oneOffResults = $wpdb->get_results("SELECT user_id FROM {$wpdb->prefix}one_of_package WHERE post_id = $post_id");

									if (!empty($userResult)) {

										foreach(json_decode($userResult->meta_value) as $user_id) {

											$status = get_user_meta($user_id, 'subscription_status', true);

											if ($status == 'active') {

												$users[] = $user_id;

											}

										}

									}

									if (!empty($subResult)) {

										foreach(json_decode($subResult->meta_value) as $user_id) {

											$status = get_user_meta($user_id, 'subscription_status', true);

											if ($status == 'active') {

												$users[] = $user_id;

											}

										}

									}

									foreach($oneOffResults as $row) {
										$users[] = $row->user_id;
									}

									
									$showEntriesFrontEnd = count(array_unique($users));
							    
									/* $showEntriesFrontEnd = json_decode(get_post_meta($post_id, '_list_user', true));
							    $ListUserFirstSubs = json_decode(get_post_meta($post_id, '_list_user_first_subs', true));
							    //echo "<pre>";print_r($ListUserFirstSubs);
							    if(empty($ListUserFirstSubs)){ //echo "fsfsdf";
							    	$ListUserFirstSubs = array(53);
							    }
							    if($showEntriesFrontEnd){ //echo "fsdfs";
							    	$showEntriesFrontEnd = array_unique(array_merge($showEntriesFrontEnd, $ListUserFirstSubs));
							    	//echo "<pre>";print_r($ListUserFirstSubs);
							    }
							    //echo "<pre>";print_r($showEntriesFrontEnd);
									*/
								?>
								
								<div class="progress-box 1212">
									<?php
									$showEntriesFrontEndaray = count($users);
									?>
									<p><?php echo $showEntriesFrontEndaray;?> / <?php echo $valueStocks;?></p>
									<progress id="file" value="<?php echo $showEntriesFrontEndaray;?>" max="<?php echo $valueStocks;?>"></progress>
									<!-- <div class="progress-circle">test</div> -->
								</div>
							</div>
							<div class="bitslab-countdown-timer bitslab-giveaway__content-timer" data-datetime="<?= $datetime_countdown ?>">
								<div id="days"></div>
								<div id="hours"></div>
								<div id="minutes"></div>
								<div id="seconds"></div>
							</div>

							<?php if (is_user_logged_in()) {
								$id_current_user = get_current_user_id();
								$list_user_meta = get_post_meta($post_id, '_list_user', true);
								$max_join_user = get_field('max_join_user', $post_id);
								$entries = get_user_meta($id_current_user, 'number_entries', true);

								$user_infos = get_userdata($id_current_user);
								$user_roless = $user_infos->roles;

							    //if($valueStock != $showEntriesFrontEnd){
								// echo $id_current_user;
								// echo "<pre>";print_r($ListUserFirstSubs);die("dfgd");
								//echo $valueStocks;
								//if ($list_user_meta) {
								$showEntriesFrontEnd_aray = (!empty($showEntriesFrontEnd)) ? $showEntriesFrontEnd : $ListUserFirstSubs;
								if($showEntriesFrontEndaray){
									$args_user = json_decode($list_user_meta);

									//if ($max_join_user <= count($args_user)) {
									if($valueStocks != $showEntriesFrontEndaray){
										if (in_array($id_current_user, $users)) {
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
											}else {
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
