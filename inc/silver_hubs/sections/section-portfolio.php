<?php
if ( ! function_exists( 'silver_hubs_portfolio_activate' ) ) {
	function silver_hubs_portfolio_activate(){
		$sections = array();
		$portfolios = apply_filters('silver_hubs_pro_section', $sections);
		$quantity  = get_theme_mod( 'our_portfolio_number', 3 );
		?>
			<div class="our_portfolio_info" id="our_portfolio_info">
				<div class="our_portfolio_data">
					<?php if(get_theme_mod('our_portfolio_main_title','Our Portfolio')){
						?>
						<div class="our_portfolio_main_title">
							<h2><?php echo esc_html(get_theme_mod('our_portfolio_main_title','Our Portfolio'));?></h2>
							<div class="section-separator"></div>
						</div>
						<?php
					} ?>
					<div class="our_portfolio_main_disc">
						<p><?php echo esc_html(get_theme_mod( 'our_portfolio_main_discription',$portfolios['portfolio']['description']));?></p>
					</div>		
					<div class="wrappers our_portfolio_section">
						<?php for ( $i = 1; $i <= $quantity ; $i++ ) { ?>
							<div class="parent our_portfolio_caption">
								<div class="our_portfolio_container">
									<div class="protfolio_images">
										<?php if(get_theme_mod( 'our_portfolio_image_' .$i)){ ?>
											<img src="<?php echo esc_attr(get_theme_mod('our_portfolio_image_' .$i)); ?>" alt="The Last of us">
										<?php }else{
											?>
											<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
											<?php
										} ?>
									</div>
									<div class="our_port_containe">
										<div class="our_portfolio_title" >
											<?php if(get_theme_mod('our_portfolio_title_' .$i,$portfolios['portfolio']['title'][$i-1])){ ?>
												<h3><?php echo esc_html(get_theme_mod('our_portfolio_title_' .$i,$portfolios['portfolio']['title'][$i-1]));?></h3>
											<?php } ?>
											<?php if(get_theme_mod('our_portfolio_subheading_' .$i,$portfolios['portfolio']['sub_heading'][$i-1])){ ?>
												<p><?php echo esc_html(get_theme_mod('our_portfolio_subheading_' .$i,$portfolios['portfolio']['sub_heading'][$i-1]));?></p>
											<?php } ?>
										</div>
									</div>
									<div class="our_portfolio_btn">
										<a href="<?php echo esc_attr(get_theme_mod('our_portfolio_buttonlink_' .$i , '#')); ?>">
											<i class="<?php echo esc_attr(get_theme_mod('our_portfolio_button_' .$i,'fa fa-arrow-right')); ?>"></i> 
										</a>
									</div>
								</div>			
							</div>
						<?php } ?>
					</div>				
				</div>
			</div>
		<?php
	}
}