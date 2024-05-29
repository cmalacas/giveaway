<?php
class Elementor_Price_Table_Bitlabs_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'bitlabs-price-table';
	}

	public function get_title()
	{
		return esc_html__('Bitlabs Price Table', 'briantech');
	}

	public function get_icon()
	{
		return 'eicon-price-table';
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
		return ['price', 'table'];
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
			'type',
			[
				'label' => esc_html__('Type', 'briantech'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'entry-member',
				'options' => [
					'entry-member' => esc_html__('Entry Member', 'briantech'),
					'premium-member'  => esc_html__('Premium Member', 'briantech'),
					'elite-member' => esc_html__('Elite Member', 'briantech'),
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Entry Member', 'briantech'),
			]
		);

		$this->add_control(
			'price',
			[
				'label' => esc_html__('Price', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('$10', 'briantech'),
			]
		);

		$this->add_control(
			'period',
			[
				'label' => esc_html__('Period', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Per Month', 'briantech'),
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_html__('Description', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('No setup fee, cancel anytime', 'briantech'),
			]
		);

		$this->add_control(
			'entries',
			[
				'label' => esc_html__('Text entries', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'briantech'),
			]
		);

		$this->add_control(
			'list_featured',
			[
				'label' => esc_html__('Featured', 'briantech'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'featured',
						'label' => esc_html__('Text', 'briantech'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('VIP Invitation to all events', 'briantech'),
						'label_block' => true,
					]
				],
				'default' => [
					['featured' => esc_html__('Featured #1', 'briantech')],
					['featured' => esc_html__('Featured #2', 'briantech')],
					['featured' => esc_html__('Featured #3', 'briantech')],
					['featured' => esc_html__('Featured #4', 'briantech')],

				],
				'title_field' => '{{{ featured }}}',
			]
		);

		$this->add_control(
			'text_btn',
			[
				'label' => esc_html__('Text Button', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('SELECT', 'briantech'),
			]
		);

		$this->add_control(
			'url_btn',
			[
				'label' => esc_html__('Url Button', 'briantech'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'briantech'),
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$type =  $settings['type'];
		$title =  $settings['title'];
		$price =  $settings['price'];
		$period =  $settings['period'];
		$desc =  $settings['desc'];
		$text_btn =  $settings['text_btn'];
		$url_btn =  $settings['url_btn'];
		$entries =  $settings['entries'];
?>
		


					  <div class="bitslab-price-table-widget <?= $type ?>">
			        <div class="bitslab-price-table-wrap">
				        <div class="bitslab-price-table-header">
					        <span><?= $title ?></span>
				        </div>
				      <div class="bitslab-price-table-price">
					      <div class="bitslab-price-table-price-t" style=""><?= $price ?></div>
					      <div class="bitslab-price-table-price-p"><?= $period ?></div>
									<div class="bitslab-price-table-price-d"><?= $desc ?></div>
								</div>
				        <hr>
				        <div class="bitslab-price-table-featured">
					        <span class="bitslab-price-table-featured-label wy">What you’ll get:</span>
                  			<h3 class="name-entries"><?= $entries ?></h3>
                  			<span class="bitslab-price-table-featured-label it">into every single draw!</span>
					        
									<?php
									if ($settings['list_featured']) {
										echo '<ul class="bitslab-price-table-featured-list">';
										foreach ($settings['list_featured'] as $k => $featured) {
									?>
											<li class="bitslab-price-table-featured-item"><?= $featured['featured'] ?></li>
									<?php
										}
										echo '</ul>';
									}

									$currentpostid = get_the_ID();
									$isuserlogged_in = is_user_logged_in();
									$list_user_meta = get_post_meta($currentpostid, '_list_user', true);
									$maxjoinuser = get_field('max_join_user', $currentpostid);

									$showEntriesFrontEnd = showEntriesFrontEnd($currentpostid);
									// $showEntriesFrontEnd = json_decode(get_post_meta($currentpostid, '_list_user', true));
									$ListUserFirstSubs = json_decode(get_post_meta($currentpostid, '_list_user_first_subs', true));
									
									$valueStock = get_field('max_join_user', $currentpostid);

									if(empty($ListUserFirstSubs)){
										$ListUserFirstSubs = array(53);
									}

									?>

                </div>
				        <div class="bitslab-price-table-footer">
									<?php
										$post_url = get_permalink();
										$allgets = explode('/', $post_url);
										$addClassdiable = '';

										if ($isuserlogged_in) {
											$currentUserId = get_current_user_id();
											$args_user = $list_user_meta ? json_decode($list_user_meta) : [];
											$user_info = get_userdata($currentUserId);
											$user_roles = $user_info->roles;
										
											if($valueStock != $showEntriesFrontEnd){
												$usersubClass = ($user_roles[0]=='one-time') ? 'pointer-events:auto !important' : '';
											}else{
												$usersubClass = '';
											}
										
										
											$showEntriesFrontEnd_aray = showEntriesFrontEnd_Array($currentpostid);

											if($valueStock != $showEntriesFrontEnd){
												if (in_array($currentUserId, $showEntriesFrontEnd_aray)) {
										?>
													<a style="<?php echo $usersubClass;?>" class="bitslab-price-table-footer-button bitslab-price-table-footer-button-loging bitslab-price-table-footer-button-loging" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
										<?php 
												} elseif ($user_roles[0]=='one-time') {
													if (is_front_page()) {
														 ?>
														<a style="<?php echo $usersubClass;?>" class="bitslab-price-table-footer-button-subscriber bitslab-price-table-footer-button" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
														<?php 
													}elseif($allgets[3] == 'dashboard' && isset($allgets[4]) && $allgets[4] == 'giveaway'){
														?>
														<a style="<?php echo $usersubClass;?>" class="bitslab-price-table-footer-button-subscriber bitslab-price-table-footer-button" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
														<?php
													}elseif($allgets[3] == 'giveaway' && isset($allgets[4]) && empty($allgets[4])){
														?>
														<a style="<?php echo $usersubClass;?>" class="bitslab-price-table-footer-button-subscriber bitslab-price-table-footer-button" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
														<?php
													}else{
														?>
														<a style="<?php echo $usersubClass;?>" class="bitslab-price-table-footer-button-loging bitslab-price-table-footer-button-loging" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
														<?php 
													}
											} else {
												?>
												<a class="bitslab-price-table-footer-button bitslab-price-table-footer-button-loging bitslab-price-table-footer-button-loging btn-disabled-point-none" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
												<?php
											}
										} elseif ($user_roles[0]=='one-time') {
											if($allgets[3] == 'dashboard' && isset($allgets[4]) && $allgets[4] == 'giveaway'){
												?>
												<a style="<?php echo $usersubClass;?>" class="bitslab-price-table-footer-button-subscriber bitslab-price-table-footer-button" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
												<?php
											} else {
											?>
											<a style="<?php echo $usersubClass;?>" class="sddadasda bitslab-price-table-footer-button bitslab-price-table-footer-button-loging bitslab-price-table-footer-button-loging" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
											<?php
											}
										} else {
									
										?>
											<a style="<?php echo $usersubClass;?>" class="bitslab-price-table-footer-button bitslab-price-table-footer-button-loging bitslab-price-table-footer-button-loging" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
									
										<?php
										}	 

									} else {

										//echo "<pre>";print_r($allgets);die("fsdfsdf");
										if($allgets[3] == 'giveaway' && isset($allgets[4]) && !empty($allgets[4])){
											$classadd = 'bitslab-price-table-footer-button-loging';
											if($valueStock == $showEntriesFrontEnd){
												$addClassdiable = 'btn-disabled-point-none';
											}
										} else {
											$classadd = 'bitslab-price-table-footer-button';
										}
										
										?>
										<a class="bitslab-price-table-footer-buttonddd <?php echo $classadd;?> <?php echo $addClassdiable;?>" href="<?= $url_btn ?>"> <?= $text_btn ?></a>
										<?php
						
										//}
									}
										
										?>

								</div>
			        </div>
		        </div>

		        <style type="text/css">
			        .bitslab-price-table-widget.elite-member .bitslab-price-table-wrap .bitslab-price-table-footer .bitslab-price-table-footer-button-loging {
                  background: linear-gradient(180deg, #9725FF 0%, #765BFF 100%);
                  background: -webkit-linear-gradient(180deg, #e925ff 0%, #765BFF 100%);
                  color: #FFFDFD;
              }
              .bitslab-price-table-widget .bitslab-price-table-wrap .bitslab-price-table-footer .bitslab-price-table-footer-button-loging {
                  font-style: normal;
                  font-weight: 600;
                  font-size: 18px;
                  line-height: 130%;
                  text-align: center;
                  color: #D300FF;
                  background: #F7F7F7;
                  border-radius: 100px;
                  padding: 10px;
                  width: 80%;
                  display: block;
                  margin: 0 auto;
              }

			  .bitslab-price-table-featured-label.wy {
				text-align: center !important;
				margin-top: 15px;
			  }

			  .bitslab-price-table-featured-label.it {
				display: block !important;
				text-align: center !important;
				margin-bottom: 30px !important;
			  }

			  h3.name-entries {
				color: #000;
				font-weight: 400;
			  }
		        </style>		      
		
<?php

	}

	protected function content_template()
	{
	}
}
