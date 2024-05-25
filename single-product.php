<?php
class Elementor_Single_Product_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'single-product-widget';
	}

	public function get_title()
	{
		return esc_html__('Single Product', 'briantech');
	}

	public function get_icon()
	{
		return 'eicon-products';
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
		return ['product', 'step'];
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
			'product_id',
			[
				'label' => esc_html__('Product ID', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'briantech'),
				'placeholder' => esc_html__('Type product ID', 'briantech'),
			]
		);

		$this->add_control(
			'border_image',
			[
				'label' => esc_html__('Border Image', 'briantech'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'briantech'),
				'label_off' => esc_html__('Hide', 'briantech'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Choose Background', 'briantech'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__('Style', 'briantech'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__('Title Color', 'briantech'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bitslab-single-product-widget .bitslab-single-product-content-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$product_ID = $settings['product_id'];
		$border_image = $settings['border_image'];
		$bg_image = $settings['bg_image'];
?>
		<div class="bitslab-widget">
			<div class="bitslab-single-product-widget">
				<?php
				if ($product_ID && wc_get_product($product_ID)) {
					$url = get_permalink($product_ID);
					$product = wc_get_product($product_ID);
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($product_ID), 'single-post-thumbnail');
					$is_enabled       = get_post_meta($product_ID, '_' . 'prowc_product_countdown_enabled', true);
					$countdown_date   = get_post_meta($product_ID, '_' . 'prowc_product_countdown_date',    true);
					$countdown_time   = get_post_meta($product_ID, '_' . 'prowc_product_countdown_time',    true);
				?>
					<a href="<?= $url ?>" class="bitslab-single-product-link <?= ($border_image == 'yes') ? 'image-border' : '' ?>">
						<?php if ($bg_image['url']) { ?>
							<img class="image-background-product" src="<?php echo $bg_image['url']; ?>" />
						<?php } ?>
						<?php if ($image) { ?>
							<img src="<?php echo $image[0]; ?>" />
						<?php } ?>
					</a>
					<div class="bitslab-single-product-content">
						<div class="bitslab-single-product-content-top">
							<div class="bitslab-single-product-content-col bitslab-single-product-content-title">
								<a href="<?= $url ?>"><?= $product->get_title() ?></a>
							</div>
							<div class="bitslab-single-product-content-col bitslab-single-product-content-price">
								Or <?= $product->get_price_html() ?>
							</div>
						</div>

						<div class="bitslab-single-product-content-bottom">
							<div class="bitslab-single-product-content-col bitslab-single-product-content-countdown">
								<?php if ($is_enabled) { ?>
									<div class="bitslab-countdown-timer" data-datetime="<?= $countdown_date . ' ' . $countdown_time ?>">
										<div id="days"></div>
										<div id="hours"></div>
										<div id="minutes"></div>
										<div id="seconds"></div>
									</div>
								<?php } ?>
							</div>
							<div class="bitslab-single-product-content-col bitslab-single-product-content-button">
								<a href="<?= $product->get_permalink(); ?>">ENTER NOW</a>
							</div>
						</div>
					</div>
				<?php
				} else {
				?>
					<div class="bitslab-widget-error">
						Please fill a ID product!
					</div>
				<?php
				}
				?>
			</div>
		</div>
<?php

	}

	protected function content_template()
	{
	}
}
