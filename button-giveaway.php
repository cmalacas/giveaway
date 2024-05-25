<?php
class Elementor_GiveAway_Button_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'giveaway-button-widget';
	}

	public function get_title()
	{
		return esc_html__('GiveAway Button', 'briantech');
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
		return ['giveaway', 'detail'];
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
		$settings = $this->get_settings_for_display();
		$countdown = get_field('datetime_countdown', get_the_ID());
		$value = get_field('value', get_the_ID());

		?>
		<div class="bitslab-giveaway-button-widget">
			<?php
			$current_post_id = get_the_ID();
			if (empty($current_post_id)) {
				return;
			}

			$post_id = $current_post_id;
			$is_user_logged_in = is_user_logged_in();
			$id_current_user = get_current_user_id();
			$list_user_meta = get_post_meta($post_id, '_list_user', true);
			$max_join_user = get_field('max_join_user', $post_id);
			$entries = get_user_meta($id_current_user, 'number_entries', true);

			$user_infos = get_userdata($id_current_user);
			$user_roless = $user_infos->roles;

			$valueStocks = get_field('max_join_user', $post_id);
		    $showEntriesFrontEnd = json_decode(get_post_meta($post_id, '_list_user', true));
		    $ListUserFirstSubs = json_decode(get_post_meta($post_id, '_list_user_first_subs', true));

		    if(empty($ListUserFirstSubs)){ 
		    	$ListUserFirstSubs = array(53);
		    }
		    if($showEntriesFrontEnd){ 
		    	$showEntriesFrontEnd = array_unique(array_merge($showEntriesFrontEnd, $ListUserFirstSubs));
		    }
		    $showEntriesFrontEnd_aray = (!empty($showEntriesFrontEnd)) ? $showEntriesFrontEnd : $ListUserFirstSubs;
		    //$showEntriesFrontEndaray = (!empty($showEntriesFrontEnd)) ? count($showEntriesFrontEnd) : count($ListUserFirstSubs);
				$showEntriesFrontEndaray = showEntriesFrontEnd($post_id)
			?>

			<div>
				<?php if ($is_user_logged_in) {
					$args_user = $list_user_meta ? json_decode($list_user_meta) : [];

					if($valueStocks != $showEntriesFrontEndaray){
						if (in_array($id_current_user, $showEntriesFrontEnd_aray)) {
							?>
							<div class="bitslab-giveaway__content-button 12">
								<a href="#signup-login">BUY MORE ENTRIES</a>
							</div>
							<?php
						}elseif ($user_roless[0]=='one-time') {
											?>
											<div class="bitslab-giveaway__content-button ">
												<a href="<?php echo get_permalink() ?>/#signup-login" class="btn-disableds">ENTER NOW</a>
											</div>
										<?php
										}else{
							?>
							<div class="bitslab-giveaway__content-button sadada" data-link="<?php echo get_permalink() ?>/#signup-login" <?php
																						if (!empty($entries)) {
																							echo 'data-id-user="' . get_current_user_id() . '"';
																						}
																						?> data-post-id=<?= $post_id ?>>
											<a href="javascript:void(0)">ENTER NOW</a>
										</div>
							
							<?php
						}
						?>
						
					<?php } elseif (in_array($id_current_user, $showEntriesFrontEnd_aray)) { ?>
						<div class="bitslab-giveaway__content-button 34">
							<a href="#signup-login">BUY MORE ENTRIES</a>
						</div>
					<?php } else { ?>
						<div class="bitslab-giveaway__content-button 23">
								<a href="javascript:void(0)" class="btn-disabled">CAPPED AT ONLY <?= $max_join_user ?> ENTRANTS</a>
							</div>
					<?php }
				} elseif ($valueStocks == $showEntriesFrontEndaray) {
					?>
						<div class="bitslab-giveaway-grid__content-col  bitslab-giveaway__content-button 4">
							<a href="javascript:void(0)" class="btn-disabled">CAPPED AT ONLY <?= $max_join_user ?> ENTRANTS</a>
						</div>
					<?php
					} elseif ($valueStocks > $showEntriesFrontEndaray) { ?>
					<div class="bitslab-giveaway__content-button 455">
						<a href="<?= get_permalink() ?>#signup-login">ENTER NOW</a>
					</div>
				<?php } ?>
			</div>

			<?php
			?>
		</div>
		<?php
	}

	protected function content_template()
	{
	}
}
