<?php
class Elementor_Box_Steps_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'box-steps-widget';
	}

	public function get_title()
	{
		return esc_html__('Box Steps', 'briantech');
	}

	public function get_icon()
	{
		return 'eicon-number-field';
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
		return ['box', 'steps'];
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
			'list_box',
			[
				'label' => esc_html__('List Box', 'briantech'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_icon',
						'label' => esc_html__('Icon', 'briantech'),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'list_title',
						'label' => esc_html__('Title', 'briantech'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('Title', 'briantech'),
						'label_block' => true,
					],
					[
						'name' => 'list_desc',
						'label' => esc_html__('Description', 'briantech'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('Description', 'briantech'),
						'label_block' => true,
					],
					[
						'name' => 'list_btn',
						'label' => esc_html__('Button Text', 'briantech'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('BUTTON', 'briantech'),
						'label_block' => true,
					],
					[
						'name' => 'list_btn_url',
						'label' => esc_html__('Link', 'briantech'),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__('https://your-link.com', 'briantech'),
						'options' => ['url', 'is_external'],
						'default' => [
							'url' => '',
							'is_external' => false,
						],
						'label_block' => true,
					]
				],
				'default' => [
					[
						'list_icon' => '',
						'list_title' => esc_html__('Title #1', 'briantech'),
						'list_desc' => esc_html__('Item content. Click the edit button to change this text.', 'briantech'),
						'list_btn' => esc_html__('BUTTON', 'briantech'),
					],
					[
						'list_icon' => '',
						'list_title' => esc_html__('Title #2', 'briantech'),
						'list_desc' => esc_html__('Item content. Click the edit button to change this text.', 'briantech'),
						'list_btn' => esc_html__('BUTTON', 'briantech'),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
?>
		<div class="bitslab-widget">
			<div class="bitslab-box-steps-widget">
				<div class="bitslab-box-steps-widget__inner">
					<?php
					if ($settings['list_box']) {
						echo '<div class="bitslab-box-steps-widget__list">';
						foreach ($settings['list_box'] as $k => $box) {
					?>
							<div class="bitslab-box-steps-widget__box">
								<div class="step-num"><?= $k + 1 ?></div>
								<div class="bitslab-box-steps-widget__box-inner">
									<div class="bitslab-box-steps-widget__icon">
										<?php if ($box['list_icon']) { ?>
											<img src="<?= $box['list_icon']['url'] ?>" alt="icon" />
										<?php }  ?>
									</div>
									<div class="bitslab-box-steps-widget__content">
										<h5 class="bitslab-box-steps-widget__content-title"><?= $box['list_title'] ?></h5>
										<div class="bitslab-box-steps-widget__content-desc"><?= $box['list_desc'] ?></div>
										<?php if ($box['list_btn']) { ?>
											<a class="bitslab-box-steps-widget__content-btn" href="<?= $box['list_btn_url']['url'] ?>" target="<?= ($box['list_btn_url']['is_external']) ? '_blank' : '' ?>"><?= $box['list_btn'] ?></a>
										<?php }  ?>
									</div>
								</div>
							</div>
					<?php
						}
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
<?php

	}

	protected function content_template()
	{
	}
}
