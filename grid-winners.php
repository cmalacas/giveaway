<?php
class Elementor_Grid_Winners_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'grid-winners-widget';
	}

	public function get_title()
	{
		return esc_html__('Grid Winners', 'briantech');
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
		return ['winners', 'grid'];
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
?>
		<div class="bitslab-winners-grid">
			<?php
			$args = [
				'post_type' => 'ct-winners',
				'posts_per_page' => $number_of_post,
				'post_status' => 'publish'
			];

			$the_query = new WP_Query($args);

			if ($the_query->have_posts()) {
				echo '<div class="bitslab-winners-grid__inner">';
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id = get_the_ID();
					$date_win = get_field('date_win', $post_id);
					$winner_entry = get_field('winner_entry', $post_id);
					$giveaway_winner = get_field('giveaway_winner', $post_id);
					$featured_img_url = get_the_post_thumbnail_url($post_id, 'full');

			?>
					<div class="bitslab-winners-grid__item">
						<div class="bitslab-winners-grid__item-image">
							<?php if ($featured_img_url) { ?>
								<img src="<?php echo $featured_img_url; ?>" />
							<?php } ?>
						</div>
						<div class="bitslab-winners-grid__content">
							<div class="bitslab-winners-grid__content-top">
								<div class="bitslab-title">
									<a data-lity href="/slot-machine/?giveaway-id=<?= $giveaway_winner->ID ?>" target="_blank"><?= get_the_title() ?><span>watch now</span></a>
								</div>
								<div class="bitslab-date">
									<?= $date_win ?>
								</div>
							</div>

							<div class="bitslab-winners-grid__content-bottom">
								<?php if ($winner_entry) { ?>
									<p class="winner-entry">Winner Entry: <?= $winner_entry ?></p>
								<?php } ?>
								<?php if ($giveaway_winner) { ?>
									<p class="winner-giveaway">	 <?= $giveaway_winner->post_title ?></p>
								<?php } ?>
							</div>
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
