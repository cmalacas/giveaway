<?php
class Elementor_GiveAway_Detail_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'giveaway-detail-widget';
	}

	public function get_title()
	{
		return esc_html__('GiveAway Detail', 'briantech');
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

		global $wpdb;

		$settings = $this->get_settings_for_display();
		$countdown = get_field('datetime_countdown', get_the_ID());
		$value = get_field('value', get_the_ID());

?>
<div>
								
	<?php 
	//$showEntriesFrontEnd = showEntriesFrontEnd();
	//echo array_sum($showEntriesFrontEnd);
	$postsid = get_the_ID();
	$valueStock = get_field('value', $postsid);
	$badsymbols = array(",", ".");
    $valueStocks = get_field('max_join_user', $postsid);

		$post_id = $postsid;
    
		/* $showEntriesFrontEnd = json_decode(get_post_meta($postsid, '_list_user', true));
    $ListUserFirstSubs = json_decode(get_post_meta($postsid, '_list_user_first_subs', true));
    //echo "<pre>";print_r($showEntriesFrontEnd);die();
    if(empty($ListUserFirstSubs)){
	    	$ListUserFirstSubs = array(53);
	    }
    if($showEntriesFrontEnd){ //echo "sdfsdf";
    	$showEntriesFrontEnd = array_unique(array_merge($showEntriesFrontEnd, $ListUserFirstSubs));
    } */

		$users = [];

		$userResult = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}postmeta WHERE (meta_key = '_list_user') AND post_id = $post_id");

		$subResult = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}postmeta WHERE (meta_key = '_list_user_first_subs') AND post_id = $post_id");

		$oneOffResults = $wpdb->get_results("SELECT user_id FROM {$wpdb->prefix}one_off_package WHERE post_id = $post_id");

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


    
	?>
	
	<div class="progress-box cloa22">
		<?php
		$showEntriesFrontEnd = count(array_unique($users)) // (!empty($showEntriesFrontEnd)) ? count($showEntriesFrontEnd) : count($ListUserFirstSubs);
		?>
		<p><?php echo $showEntriesFrontEnd;?> / <?php echo $valueStocks;?></p>
		<progress id="file" value="<?php echo $showEntriesFrontEnd;?>" max="<?php echo $valueStocks;?>"></progress>
		<!-- <div class="progress-circle">test</div> -->
	</div>
</div>
		<div class="bitslab-giveaway-detail-widget">
			<?php if ($countdown) { ?>
				<div class="bitslab-coundown">
					<div class="bitslab-countdown-timer" data-datetime="<?= $countdown ?>">
						<div id="days"></div>
						<div id="hours"></div>
						<div id="minutes"></div>
						<div id="seconds"></div>
					</div>
				</div>
			<?php } ?>
			<?php if ($countdown) { ?>
				<div class="bitslab-value">
					<?= $value ?>
				</div>
			<?php } ?>
		</div>
<?php
	}

	protected function content_template()
	{
	}
}
