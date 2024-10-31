<?php
if ( ! function_exists( 'silver_hubs_slider_activate' ) ) {
	function silver_hubs_slider_activate(){
		$sections = array();
		$sliders = apply_filters('silver_hubs_pro_section', $sections);
		$quantity  = get_theme_mod( 'featuredimage_slider_number', 4 );
		?>
		<div class="featured_slider_image">
			<?php
			$silver_hubs_video_post_title = get_theme_mod( 'featuredvideo_slider_title',$sliders['slider']['video_title'] );
			$silver_hubs_video_slider_description = get_theme_mod( 'featuredvideo_slider_description',$sliders['slider']['video_disc'] );

			if(get_theme_mod( 'featured_image_video_slider', 'image' )=='video'){
				?>
				<div class="featured_video_slider">
					<div class="featured_video_info">					
						<?php if(get_theme_mod( 'video_upload')){ ?>
							<video autoplay="" muted="" loop="" id="video_slider">
					            <source src="<?php echo wp_get_attachment_url( get_theme_mod( 'video_upload' ))?>" type="video/mp4">
					        </video>
					    <?php }else{ ?>
					    	<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
					    	<?php
					    } ?>
				        <div class="entry-container align_items_<?php echo esc_attr(get_theme_mod('featured_slider_aling_item','left'));?>">
					  		<?php if($silver_hubs_video_post_title){
					  			?>
					  			<header class=" featured_slider_title entry-header">					
								<h1 class="entry-title">
							  		<?php echo esc_attr($silver_hubs_video_post_title); ?>
							  	</h1>
							</header>
					  			<?php
					  		} ?>						
						  	<div class="featured_slider_disc entry-summary"><?php echo esc_html($silver_hubs_video_slider_description); ?></div>
						  	<?php if(get_theme_mod( 'featuredvideo_slider_button',$sliders['slider']['video_btn'])){ ?>
							  	<div class="image_btn button">
									<a href="<?php echo esc_attr(get_theme_mod( 'featuredvideo_slider_button_link',$sliders['slider']['video_btn_link'])); ?>" class="buttons"><?php echo esc_html(get_theme_mod( 'featuredvideo_slider_button',$sliders['slider']['video_btn'])); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
			    </div>
				<?php
			} 
			elseif(get_theme_mod( 'featured_image_video_slider', 'image' )=='image'){
			?>
				<div id="owl-demo" class="owl-carousel owl-theme featuredimage_slider">
					<?php
					for ( $i = 1; $i <= $quantity; $i++ ) {
						if($i <= 4){
							$silver_hubs_post_title = get_theme_mod( 'featuredimage_slider_title_' . $i,$sliders['slider']['title'][$i-1] );
							$silver_hubs_image_slider_description = get_theme_mod( 'featuredimage_slider_description_' . $i,$sliders['slider']['description'][$i-1]);
							$silver_hubs_image_sliders= get_theme_mod( 'featured_image_sliders_' . $i );
							?>	
							<div class="item">
							  	<div class="hentry-inner">
									<div class="post-thumbnail">
										<?php if(get_theme_mod( 'featured_image_sliders_' . $i )){ ?>
											<img src="<?php echo esc_attr($silver_hubs_image_sliders); ?>" alt="The Last of us">

										<?php }else{
											?>
											<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
											<?php
										} ?> 
									</div>				
								  	<div class="entry-container align_items_<?php echo esc_attr(get_theme_mod('featured_slider_aling_item','left'));?>">
								  		<?php if($silver_hubs_post_title){
								  			?>
								  			<header class=" featured_slider_title entry-header">					
											<h1 class="entry-title">
										  		<?php echo esc_attr($silver_hubs_post_title); ?>
										  	</h1>
										</header>
								  			<?php
								  		} ?>						
									  	<div class="featured_slider_disc entry-summary"><?php echo esc_html($silver_hubs_image_slider_description); ?></div>
									  	<?php if(get_theme_mod( 'featuredimage_slider_button_' . $i,$sliders['slider']['button'][$i-1])){ ?>
										  	<div class="image_btn button">
												<a href="<?php echo esc_attr(get_theme_mod( 'featuredimage_slider_button_link_'. $i,$sliders['slider']['button_link'][$i-1])); ?>" class="buttons"><?php echo esc_html(get_theme_mod( 'featuredimage_slider_button_' . $i,$sliders['slider']['button'][$i-1])); ?></a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php }else{							
							$silver_hubs_post_title = get_theme_mod( 'featuredimage_slider_title_' . $i );
							$silver_hubs_image_slider_description = get_theme_mod( 'featuredimage_slider_description_' . $i);
							$silver_hubs_image_sliders= get_theme_mod( 'featured_image_sliders_' . $i );
							?>	
							<div class="item">
							  	<div class="hentry-inner">
									<div class="post-thumbnail">
										<?php if(get_theme_mod( 'featured_image_sliders_' . $i )){ ?>
											<img src="<?php echo esc_attr($silver_hubs_image_sliders); ?>" alt="The Last of us">

										<?php }else{
											?>
											<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
											<?php
										} ?> 
									</div>				
								  	<div class="entry-container align_items_<?php echo esc_attr(get_theme_mod('featured_slider_aling_item','left'));?>">
								  		<?php if($silver_hubs_post_title){
								  			?>
								  			<header class=" featured_slider_title entry-header">					
											<h1 class="entry-title">
										  		<?php echo esc_attr($silver_hubs_post_title); ?>
										  	</h1>
										</header>
								  			<?php
								  		} ?>						
									  	<div class="featured_slider_disc entry-summary"><?php echo esc_html($silver_hubs_image_slider_description); ?></div>
									  	<?php if(get_theme_mod( 'featuredimage_slider_button_' . $i)){ ?>
										  	<div class="image_btn button">
												<a href="<?php echo esc_attr(get_theme_mod( 'featuredimage_slider_button_link_'. $i)); ?>" class="buttons"><?php echo esc_html(get_theme_mod( 'featuredimage_slider_button_' . $i)); ?></a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<?php
						} ?>
					<?php } ?>
				</div>	
			<?php } ?>		
		</div>
		<?php
	}
}
?>