<?php
if ( ! function_exists( 'bizemla_testimonial_activate' ) ) :
	function bizemla_testimonial_activate(){
		$sections = array();
		$testimonials = apply_filters('bizemla_section', $sections);
   		$our_testimonial_number = get_theme_mod( 'our_testimonial_number', 3 );
		?>
			<div class="our_testimonial_section">
				<div class="our_testimonial_info">
					<div class="our_testimonial_main_title">
						<div class="testimonial_title">
							<h2><?php echo esc_html(get_theme_mod( 'our_testimonial_main_title', 'Our Testimonial' )); ?></h2>
							<span class="separator"><span><span></span></span></span>
						</div>
						<div class="our_testimonial_main_disc">
							<p><?php echo esc_html(get_theme_mod( 'our_testimonial_main_discription', $testimonials['testimonial']['description']));?></p>
						</div>
					</div>
					<div class="owl-carousel owl-theme testinomial_owl_slider" id="testinomial_owl_slider">
						<?php
						for ( $i = 1; $i <= $our_testimonial_number ; $i++ ) {
							?>
							<div class="our_testimonial_data" >
								<div class="our_testimonial_data_info">
									<div class="testimonials_image">
										<?php
										if(get_theme_mod( 'our_testimonial_image_'.$i )){
											?>
											<img src="<?php echo esc_attr(get_theme_mod( 'our_testimonial_image_'.$i )); ?>" alt="">
											<?php
										}else{
											?>
											<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg"" alt="">								
											<?php
										}
										?>
									</div>	
									<div class="testimonials_disc">
										<div class="our_testimonials_container">
											<p><?php echo esc_html(get_theme_mod( 'our_testimonial_description_'.$i , $testimonials['testimonial']['deacription1'][$i-1])); ?></p>
											<div class="testimonials_title">
												<h3><?php echo esc_html(get_theme_mod( 'our_testimonial_title_'.$i, $testimonials['testimonial']['title'][$i-1] )); ?></h3>
												<h4><?php echo esc_html(get_theme_mod( 'our_testimonial_subheadline_'.$i, $testimonials['testimonial']['sub_heading'][$i-1] )); ?></h4>
											</div>
										</div>
									</div>					
								</div>						
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		<?php
	}
endif;

?>