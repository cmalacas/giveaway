<?php
class Elementor_Listing_Partners_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'listing-partners-widget';
	}

	public function get_title()
	{
		return esc_html__('Listing Partners', 'briantech');
	}

	public function get_icon()
	{
		return 'eicon-bullet-list';
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
		return ['listing', 'partners'];
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
?>
		<div class="bitslab-listing-partners-widget">
			<div class="listing-partners-inner">
				<form action="/mate-rates/" method="get" class="partner-form">
					<div class="listing-partners__filter">
						<div class="listing-partners__filter-item">
							<label>Search by Partner Name</label>
							<div class="listing-partners__filter-wrapper">
								<button class="form__square">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M19.9 20.9751L13.325 14.4001C12.825 14.8334 12.242 15.1709 11.576 15.4126C10.91 15.6543 10.2014 15.7751 9.45 15.7751C7.6473 15.7751 6.12163 15.1501 4.87298 13.9001C3.62433 12.6501 3 11.1418 3 9.3751C3 7.60843 3.625 6.1001 4.875 4.8501C6.125 3.6001 7.6375 2.9751 9.4125 2.9751C11.1875 2.9751 12.6958 3.6001 13.9375 4.8501C15.1792 6.1001 15.8 7.60968 15.8 9.37885C15.8 10.093 15.6833 10.7834 15.45 11.4501C15.2167 12.1168 14.8667 12.7418 14.4 13.3251L21 19.8751L19.9 20.9751ZM9.425 14.2751C10.7792 14.2751 11.9302 13.7959 12.8781 12.8376C13.826 11.8793 14.3 10.7251 14.3 9.3751C14.3 8.0251 13.826 6.87093 12.8781 5.9126C11.9302 4.95426 10.7792 4.4751 9.425 4.4751C8.05695 4.4751 6.8941 4.95426 5.93645 5.9126C4.97882 6.87093 4.5 8.0251 4.5 9.3751C4.5 10.7251 4.97882 11.8793 5.93645 12.8376C6.8941 13.7959 8.05695 14.2751 9.425 14.2751Z" fill="black" />
									</svg>
								</button>
								<input type="text" value="<?php echo isset($_GET['pn-name']) ? esc_attr($_GET['pn-name']) : ''; ?>" name="pn-name" id="parner-name" placeholder="Search by partner name" />
							</div>
						</div>
						<div class="listing-partners__filter-item">
							<label>Search by State</label>
							<select id="partner-state" name="pn-state">
								<option value="" disabled selected>Select State</option>
								<?php $state = get_terms('partner-state', ['hide_empty' => false]); ?>
								<?php foreach ($state as $k => $st) : ?>
									<option value="<?php echo $st->slug; ?>" <?php if (bitlabs_state_isselected($st->slug)) : ?>selected="selected" <?php endif; ?>><?php echo $st->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="listing-partners__filter-item">
							<label>Categories</label>
							<select id="partner-categories" name="pn-categories">
								<option value="" disabled selected>Select categories</option>
								<?php $categories = get_terms('partner-categories', ['hide_empty' => false]); ?>
								<?php foreach ($categories as $k => $categories) : ?>
									<option value="<?php echo $categories->slug; ?>" <?php if (bitlabs_categories_isselected($categories->slug)) : ?>selected="selected" <?php endif; ?>><?php echo $categories->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="listing-partners__filter-item">
							<label>Tags</label>
							<select id="partner-tags" name="pn-tag">
								<option value="" disabled selected>Select tag</option>
								<?php $tags = get_terms('partner-tags', ['hide_empty' => false]); ?>
								<?php foreach ($tags as $k => $tag) : ?>
									<option value="<?php echo $tag->slug; ?>" <?php if (bitlabs_tag_isselected($tag->slug)) : ?>selected="selected" <?php endif; ?>><?php echo $tag->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</form>
				<h2 class="heading-partner">All partners</h2>
				<?php
				$term_query = [];

				$term_query['relation'] = 'AND';

				if ($category = bitlabs_category_get()) {
					$term_query[] = array(
						'taxonomy' => 'partner-categories',
						'terms' => array($category->slug),
						'field' => 'slug',
					);
				}

				if ($state = bitlabs_state_get()) {
					$term_query[] = array(
						'taxonomy' => 'partner-state',
						'terms' => array($state->slug),
						'field' => 'slug',
					);
				}

				if ($tags = bitlabs_tags_get()) {
					$term_query[] = array(
						'taxonomy' => 'partner-tags',
						'terms' => array($tags->slug),
						'field' => 'slug',
					);
				}

				$args = array(
					'post_type' => 'partners',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'tax_query' => $term_query
				);

				if (isset($_GET['pn-name'])) {
					$args['s'] = $_GET['pn-name'];
				}

				$the_query = new WP_Query($args);

				// The Loop.
				if ($the_query->have_posts()) {
					echo '<div class="listing-partners-result">';
					while ($the_query->have_posts()) {
						$the_query->the_post();
						$ID = get_the_ID();
						$featured_img_url = get_the_post_thumbnail_url($ID, 'full');
						$website = get_field('website', $ID);
						$facebook = get_field('facebook', $ID);
						$instagram = get_field('instagram', $ID);
						$email = get_field('email', $ID);
						$summary = get_field('summary', $ID);
						$state = get_the_terms(get_the_ID(), 'partner-state');
						$categories = get_the_terms(get_the_ID(), 'partner-categories');
				?>
						<div class="listing-partners__item">
							<div class="listing-partners__item-image">
								<img src="<?= $featured_img_url ?>" alt="<?= get_the_title() ?>" />
							</div>
							<div class="listing-partners__item-content">
								<div class="listing-partners__item-top">
									<div class="listing-partners__item-cat">
										<?php
										if ($categories) {
											echo '<ul>';
											foreach ($categories as $tax) {
												echo '<li>' . $tax->name . '</li>';
											}
											echo '</ul>';
										}
										?>
									</div>
									<div class="listing-partners__item-social">
										<ul>
											<?php if (isset($website) && !empty($website)) { ?>
												<li>
													<a href=<?= $website ?> target="_blank">
														<span>
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M9.9974 18.3334C8.83073 18.3334 7.74045 18.1147 6.72656 17.6772C5.71267 17.2397 4.83073 16.6459 4.08073 15.8959C3.33073 15.1459 2.74045 14.2605 2.3099 13.2397C1.87934 12.2188 1.66406 11.1251 1.66406 9.95841C1.66406 8.79175 1.87934 7.70494 2.3099 6.698C2.74045 5.69105 3.33073 4.81258 4.08073 4.06258C4.83073 3.31258 5.71267 2.72578 6.72656 2.30216C7.74045 1.87855 8.83073 1.66675 9.9974 1.66675C11.1641 1.66675 12.2543 1.87855 13.2682 2.30216C14.2821 2.72578 15.1641 3.31258 15.9141 4.06258C16.6641 4.81258 17.2543 5.69105 17.6849 6.698C18.1154 7.70494 18.3307 8.79175 18.3307 9.95841C18.3307 11.1251 18.1154 12.2188 17.6849 13.2397C17.2543 14.2605 16.6641 15.1459 15.9141 15.8959C15.1641 16.6459 14.2821 17.2397 13.2682 17.6772C12.2543 18.1147 11.1641 18.3334 9.9974 18.3334ZM9.9974 17.1251C10.4835 16.6251 10.8898 16.0522 11.2161 15.4063C11.5425 14.7605 11.8099 13.9931 12.0182 13.1042H7.9974C8.19184 13.9376 8.45226 14.6876 8.77865 15.3542C9.10503 16.0209 9.51128 16.6112 9.9974 17.1251ZM8.22656 16.8751C7.87934 16.3473 7.58073 15.7779 7.33073 15.1667C7.08073 14.5556 6.8724 13.8681 6.70573 13.1042H3.58073C4.10851 14.0904 4.71962 14.8647 5.41406 15.4272C6.10851 15.9897 7.04601 16.4723 8.22656 16.8751ZM11.7891 16.8542C12.7891 16.5348 13.6884 16.0556 14.487 15.4167C15.2856 14.7779 15.928 14.007 16.4141 13.1042H13.3099C13.1293 13.8542 12.9175 14.5348 12.6745 15.1459C12.4314 15.757 12.1363 16.3265 11.7891 16.8542ZM3.16406 11.8542H6.47656C6.4349 11.4792 6.41059 11.1424 6.40365 10.8438C6.3967 10.5452 6.39323 10.2501 6.39323 9.95841C6.39323 9.61119 6.40017 9.30216 6.41406 9.03133C6.42795 8.7605 6.45573 8.45841 6.4974 8.12508H3.16406C3.06684 8.45841 3.00087 8.75703 2.96615 9.02091C2.93142 9.2848 2.91406 9.5973 2.91406 9.95841C2.91406 10.3195 2.93142 10.6424 2.96615 10.9272C3.00087 11.2119 3.06684 11.5209 3.16406 11.8542ZM7.76823 11.8542H12.2474C12.303 11.4237 12.3377 11.073 12.3516 10.8022C12.3655 10.5313 12.3724 10.2501 12.3724 9.95841C12.3724 9.68064 12.3655 9.41328 12.3516 9.15633C12.3377 8.89939 12.303 8.55564 12.2474 8.12508H7.76823C7.71267 8.55564 7.67795 8.89939 7.66406 9.15633C7.65017 9.41328 7.64323 9.68064 7.64323 9.95841C7.64323 10.2501 7.65017 10.5313 7.66406 10.8022C7.67795 11.073 7.71267 11.4237 7.76823 11.8542ZM13.4974 11.8542H16.8307C16.928 11.5209 16.9939 11.2119 17.0286 10.9272C17.0634 10.6424 17.0807 10.3195 17.0807 9.95841C17.0807 9.5973 17.0634 9.2848 17.0286 9.02091C16.9939 8.75703 16.928 8.45841 16.8307 8.12508H13.5182C13.5599 8.61119 13.5877 8.98272 13.6016 9.23966C13.6155 9.49661 13.6224 9.73619 13.6224 9.95841C13.6224 10.264 13.612 10.5522 13.5911 10.823C13.5703 11.0938 13.5391 11.4376 13.4974 11.8542ZM13.2891 6.87508H16.4141C15.9557 5.91675 15.3273 5.11814 14.5286 4.47925C13.73 3.84036 12.8099 3.38897 11.7682 3.12508C12.1155 3.63897 12.4106 4.19453 12.6536 4.79175C12.8967 5.38897 13.1085 6.08341 13.2891 6.87508ZM7.9974 6.87508H12.0391C11.8863 6.13897 11.6293 5.42716 11.2682 4.73966C10.9071 4.05216 10.4835 3.44453 9.9974 2.91675C9.55295 3.29175 9.17795 3.7848 8.8724 4.39591C8.56684 5.00703 8.27517 5.83341 7.9974 6.87508ZM3.58073 6.87508H6.72656C6.87934 6.12508 7.07378 5.45494 7.3099 4.86466C7.54601 4.27439 7.84462 3.70147 8.20573 3.14591C7.16406 3.4098 6.25434 3.85425 5.47656 4.47925C4.69878 5.10425 4.06684 5.90286 3.58073 6.87508Z" fill="#3F3F3F" />
															</svg>
														</span>
														<span>Website</span>
													</a>
												</li>
											<?php } ?>
											<?php if (isset($facebook) && !empty($facebook)) { ?>
												<li>
													<a href=<?= $facebook ?> target="_blank">
														<span>
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<g clip-path="url(#clip0_1237_1858)">
																	<path d="M20 10C20 4.47715 15.5229 0 10 0C4.47715 0 0 4.47715 0 10C0 14.9912 3.65684 19.1283 8.4375 19.8785V12.8906H5.89844V10H8.4375V7.79688C8.4375 5.29063 9.93047 3.90625 12.2146 3.90625C13.3084 3.90625 14.4531 4.10156 14.4531 4.10156V6.5625H13.1922C11.95 6.5625 11.5625 7.3334 11.5625 8.125V10H14.3359L13.8926 12.8906H11.5625V19.8785C16.3432 19.1283 20 14.9912 20 10Z" fill="#3F3F3F" />
																</g>
																<defs>
																	<clipPath id="clip0_1237_1858">
																		<rect width="20" height="20" fill="white" />
																	</clipPath>
																</defs>
															</svg>
														</span>
														<span>Facebook</span>
													</a>
												</li>
											<?php } ?>
											<?php if (isset($instagram) && !empty($instagram)) { ?>
												<li>
													<a href=<?= $instagram ?> target="_blank">
														<span>
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<g clip-path="url(#clip0_1237_1908)">
																	<path d="M10 1.80078C12.6719 1.80078 12.9883 1.8125 14.0391 1.85937C15.0156 1.90234 15.543 2.06641 15.8945 2.20313C16.3594 2.38281 16.6953 2.60156 17.043 2.94922C17.3945 3.30078 17.6094 3.63281 17.7891 4.09766C17.9258 4.44922 18.0898 4.98047 18.1328 5.95312C18.1797 7.00781 18.1914 7.32422 18.1914 9.99219C18.1914 12.6641 18.1797 12.9805 18.1328 14.0313C18.0898 15.0078 17.9258 15.5352 17.7891 15.8867C17.6094 16.3516 17.3906 16.6875 17.043 17.0352C16.6914 17.3867 16.3594 17.6016 15.8945 17.7813C15.543 17.918 15.0117 18.082 14.0391 18.125C12.9844 18.1719 12.668 18.1836 10 18.1836C7.32813 18.1836 7.01172 18.1719 5.96094 18.125C4.98438 18.082 4.45703 17.918 4.10547 17.7813C3.64063 17.6016 3.30469 17.3828 2.95703 17.0352C2.60547 16.6836 2.39063 16.3516 2.21094 15.8867C2.07422 15.5352 1.91016 15.0039 1.86719 14.0313C1.82031 12.9766 1.80859 12.6602 1.80859 9.99219C1.80859 7.32031 1.82031 7.00391 1.86719 5.95312C1.91016 4.97656 2.07422 4.44922 2.21094 4.09766C2.39063 3.63281 2.60938 3.29688 2.95703 2.94922C3.30859 2.59766 3.64063 2.38281 4.10547 2.20313C4.45703 2.06641 4.98828 1.90234 5.96094 1.85937C7.01172 1.8125 7.32813 1.80078 10 1.80078ZM10 0C7.28516 0 6.94531 0.0117187 5.87891 0.0585938C4.81641 0.105469 4.08594 0.277344 3.45313 0.523438C2.79297 0.78125 2.23438 1.12109 1.67969 1.67969C1.12109 2.23438 0.78125 2.79297 0.523438 3.44922C0.277344 4.08594 0.105469 4.8125 0.0585938 5.875C0.0117188 6.94531 0 7.28516 0 10C0 12.7148 0.0117188 13.0547 0.0585938 14.1211C0.105469 15.1836 0.277344 15.9141 0.523438 16.5469C0.78125 17.207 1.12109 17.7656 1.67969 18.3203C2.23438 18.875 2.79297 19.2188 3.44922 19.4727C4.08594 19.7188 4.8125 19.8906 5.875 19.9375C6.94141 19.9844 7.28125 19.9961 9.99609 19.9961C12.7109 19.9961 13.0508 19.9844 14.1172 19.9375C15.1797 19.8906 15.9102 19.7188 16.543 19.4727C17.1992 19.2188 17.7578 18.875 18.3125 18.3203C18.8672 17.7656 19.2109 17.207 19.4648 16.5508C19.7109 15.9141 19.8828 15.1875 19.9297 14.125C19.9766 13.0586 19.9883 12.7188 19.9883 10.0039C19.9883 7.28906 19.9766 6.94922 19.9297 5.88281C19.8828 4.82031 19.7109 4.08984 19.4648 3.45703C19.2188 2.79297 18.8789 2.23438 18.3203 1.67969C17.7656 1.125 17.207 0.78125 16.5508 0.527344C15.9141 0.28125 15.1875 0.109375 14.125 0.0625C13.0547 0.0117188 12.7148 0 10 0Z" fill="#3F3F3F" />
																	<path d="M9.99609 4.86328C7.16016 4.86328 4.85938 7.16406 4.85938 10C4.85938 12.8359 7.16016 15.1367 9.99609 15.1367C12.832 15.1367 15.1328 12.8359 15.1328 10C15.1328 7.16406 12.832 4.86328 9.99609 4.86328ZM9.99609 13.332C8.15625 13.332 6.66406 11.8398 6.66406 10C6.66406 8.16016 8.15625 6.66797 9.99609 6.66797C11.8359 6.66797 13.3281 8.16016 13.3281 10C13.3281 11.8398 11.8359 13.332 9.99609 13.332Z" fill="#3F3F3F" />
																	<path d="M16.5391 4.66016C16.5391 5.32422 16 5.85938 15.3398 5.85938C14.6758 5.85938 14.1406 5.32031 14.1406 4.66016C14.1406 3.99609 14.6797 3.46094 15.3398 3.46094C16 3.46094 16.5391 4 16.5391 4.66016Z" fill="#3F3F3F" />
																</g>
																<defs>
																	<clipPath id="clip0_1237_1908">
																		<rect width="20" height="20" fill="white" />
																	</clipPath>
																</defs>
															</svg>

														</span>
														<span>Instagram</span>
													</a>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
								<h3 class="listing-partners__item-title"><?= get_the_title() ?></h3>
								<ul class="listing-partners__item-location">
									<?php
									if ($state) {
										foreach ($state as $tax) {
											echo '<li><span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M10 18.3334C12.8125 18.3334 17.5 13.1652 17.5 9.07416C17.5 4.98316 14.1421 1.66675 10 1.66675C5.85786 1.66675 2.5 4.98316 2.5 9.07416C2.5 13.1652 7.1875 18.3334 10 18.3334ZM10 11.6667C11.3807 11.6667 12.5 10.5475 12.5 9.16675C12.5 7.78604 11.3807 6.66675 10 6.66675C8.61929 6.66675 7.5 7.78604 7.5 9.16675C7.5 10.5475 8.61929 11.6667 10 11.6667Z" fill="#3C3C3C"/>
											</svg>
											</span><span>' . $tax->name . '</span></li>';
										}
									}
									?>
									<?php if ($email) { ?>
										<li>
											<a href="mailto:<?= $email ?>">
												<span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M1.83806 5.32944L8.23288 9.98022C9.28483 10.7453 10.71 10.7453 11.7619 9.98022L18.1567 5.32944C17.6562 3.69141 16.1326 2.5 14.3307 2.5H5.66406C3.86219 2.5 2.33859 3.69141 1.83806 5.32944ZM18.3307 7.67589L12.9383 11.5977C11.185 12.8728 8.80979 12.8728 7.05654 11.5977L1.66406 7.67589V13.5C1.66406 15.7091 3.45493 17.5 5.66406 17.5H14.3307C16.5399 17.5 18.3307 15.7091 18.3307 13.5V7.67589Z" fill="#3B3B3B" />
													</svg>
												</span>
												<span><?= $email ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
								<div class="listing-partners__item-desc">
									<?php the_content(); ?>
								</div>
								<?php if ($summary) { ?>
									<div class="listing-partners__item-summary">
										<?php echo $summary; ?>
									</div>
								<?php } ?>
							</div>
						</div>
				<?php
					}
					echo '</div>';
				} else {
					echo 'Sorry, no posts matched your criteria.';
				}
				// Restore original Post Data.
				wp_reset_postdata();
				?>
			</div>
		</div>
<?php

	}

	protected function content_template()
	{
	}
}
