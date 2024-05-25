<?php
class Elementor_Accumulating_Bitlabs_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'bitlabs-accumulating';
	}

	public function get_title()
	{
		return esc_html__('Accumulating Section', 'briantech');
	}

	public function get_icon()
	{
		return 'eicon-favorite';
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
		return ['accumulating', 'section'];
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
			'title',
			[
				'label' => esc_html__('Title', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('ENTRIES THAT NEVER STOP ACCUMULATING', 'briantech'),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__('Description', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Click to see how many entires you will be getting based on the tier you choose', 'briantech'),
			]
		);

		$this->add_control(
			'button_1',
			[
				'label' => esc_html__('Button 1', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('MOD 1', 'briantech'),
			]
		);

		$this->add_control(
			'image_1',
			[
				'label' => esc_html__('Choose Image MOD 1', 'briantech'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image_1_mb',
			[
				'label' => esc_html__('Choose Image MOD 1 Mobile', 'briantech'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'button_2',
			[
				'label' => esc_html__('Button 2', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('MOD 2', 'briantech'),
			]
		);

		$this->add_control(
			'image_2',
			[
				'label' => esc_html__('Choose Image MOD 2', 'briantech'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image_32_mb',
			[
				'label' => esc_html__('Choose Image MOD 2 Mobile', 'briantech'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'button_3',
			[
				'label' => esc_html__('Button 3', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('MOD 3', 'briantech'),
			]
		);

		$this->add_control(
			'image_3',
			[
				'label' => esc_html__('Choose Image MOD 3', 'briantech'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'image_3_mb',
			[
				'label' => esc_html__('Choose Image MOD 3 Mobile', 'briantech'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$title =  $settings['title'];
		$description =  $settings['description'];
		$button_1 =  isset($settings['button_1']) ? $settings['button_1'] : '';
		$button_2 =  isset($settings['button_2']) ? $settings['button_2'] : '';
		$button_3 =  isset($settings['button_3']) ? $settings['button_3'] : '';
		$image_1 =  isset($settings['image_1']) ? $settings['image_1'] : [];
		$image_2 =  isset($settings['image_2']) ? $settings['image_2'] : [];
		$image_3 =  isset($settings['image_3']) ? $settings['image_3'] : [];

		$image_1_mb =  isset($settings['image_1_mb']) ? $settings['image_1_mb'] : [];
		$image_2_mb =  isset($settings['image_2_mb']) ? $settings['image_2_mb'] : [];
		$image_3_mb =  isset($settings['image_3_mb']) ? $settings['image_3_mb'] : [];

?>
		<div class="bitslab-accumulating-widget">
			<div class="bitslab-accumulating-wrap">
				<h2 class="title"><?= $title ?></h2>
				<p class="description"><?= $description ?></p>
				<div class="tabs page_tabs">
					<div class="tabs_header">
						<ul class="tabs_list">
							<li class="tabs_item tabs_item_active" data-mod="mod1">
								<button class="tabs_button"><span><?= $button_1 ?></span></button>
							</li>
							<li class="tabs_item" data-mod="mod2">
								<button class="tabs_button"><span><?= $button_2 ?></span></button>
							</li>
							<li class="tabs_item" data-mod="mod3">
								<button class="tabs_button"><span><?= $button_3 ?></span></button>
							</li>
						</ul>
					</div>
					<div class="tabs_body">
						<div class="tab tab_active" data-mod="mod1">
							<?php if (isset($image_1['url'])) { ?>
								<div class="dis_desk">
									<img width="1190" height="338" src="<?= $image_1['url'] ?>" class="attachment-full size-full" alt="">
								</div>
							<?php	} ?>
							<?php if (isset($image_1_mb['url'])) { ?>
								<div class="dis_mob">
									<img width="376" height="209" src="<?= $image_1_mb['url'] ?>" class="attachment-full size-full" alt="">
								</div>
							<?php	} ?>
						</div>
						<div class="tab" data-mod="mod2">
							<?php if (isset($image_2['url'])) { ?>
								<div class="dis_desk">
									<img width="1190" height="338" src="<?= $image_2['url'] ?>" class="attachment-full size-full" alt="">
								</div>
							<?php	} ?>
							<?php if (isset($image_2_mb['url'])) { ?>
								<div class="dis_mob">
									<img width="376" height="209" src="<?= $image_2_mb['url'] ?>" class="attachment-full size-full" alt="">
								</div>
							<?php	} ?>
						</div>
						<div class="tab" data-mod="mod3">
							<?php if (isset($image_3['url'])) { ?>
								<div class="dis_desk">
									<img width="1190" height="338" src="<?= $image_3['url'] ?>" class="attachment-full size-full" alt="">
								</div>
							<?php	} ?>
							<?php if (isset($image_3_mb['url'])) { ?>
								<div class="dis_mob">
									<img width="376" height="209" src="<?= $image_3_mb['url'] ?>" class="attachment-full size-full" alt="">
								</div>
							<?php	} ?>
						</div>
					</div>

				</div>
			</div>
		</div>
<?php

	}

	protected function content_template()
	{
	}
}
