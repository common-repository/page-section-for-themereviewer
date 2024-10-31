<?php
if ( ! function_exists( 'silver_hubs_sponsors_activate' ) ) {
	function silver_hubs_sponsors_activate(){
		$sections = array();
		$sponsors = apply_filters('silver_hubs_pro_section', $sections);
		$our_sponsors_number = get_theme_mod( 'our_sponsors_number', 10 );
		?>
		<div class="our_sponsors_section">
			<div class="our_sponsors_info">
				<div class="our_sponsors_data">
					<div class="our_sponsors_title">
						<h2><?php echo esc_html(get_theme_mod( 'our_sponsors_main_title', 'Our Sponsors' )); ?></h2>
						<div class="section-separator"></div>
					</div>
					<div class="our_sponsors_disc">
						<p><?php echo esc_html(get_theme_mod( 'our_sponsors_main_discription',$sponsors['sponsor']['description'])); ?></p>
					</div>
				</div>
				<div class="our_sponsors_contain">
					<div id="our_sponsors_demo" class="owl-carousel owl-theme our_sponsors_demo">
						<?php
						for ( $i = 1; $i <= $our_sponsors_number ; $i++ ) {
							if($i <= 10){
							?>
								<div class="our_sponsors_img">
									<?php if(get_theme_mod( 'our_sponsors_image_'.$i)){
										?>
										<a href='<?php echo esc_attr(get_theme_mod( 'our_sponsors_image_link_'.$i,$sponsors['sponsor']['image_link'][$i-1]))?>'><img src="<?php echo esc_attr(get_theme_mod( 'our_sponsors_image_'.$i))?>"></a>
										<?php
									}else{
										?>
										<a href='<?php echo esc_attr(get_theme_mod( 'our_sponsors_image_link_'.$i,$sponsors['sponsor']['image_link'][$i-1]))?>'><img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us"></a>
										<?php
									} ?>
								</div>
							<?php }else{
								?>
								<div class="our_sponsors_img">
									<?php if(get_theme_mod( 'our_sponsors_image_'.$i)){
										?>
										<a href='<?php echo esc_attr(get_theme_mod( 'our_sponsors_image_link_'.$i))?>'><img src="<?php echo esc_attr(get_theme_mod( 'our_sponsors_image_'.$i))?>"></a>
										<?php
									}else{
										?>
										<a href='<?php echo esc_attr(get_theme_mod( 'our_sponsors_image_link_'.$i))?>'><img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us"></a>
										<?php
									} ?>
								</div>
								<?php
							} ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}