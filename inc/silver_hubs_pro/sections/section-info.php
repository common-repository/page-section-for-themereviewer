<?php
if ( ! function_exists( 'silver_hubs_info_activate' ) ) {
	function silver_hubs_info_activate(){
		$sections = array();
		$featured_section = apply_filters('silver_hubs_pro_section', $sections);
		$quantity  = get_theme_mod( 'featured_section_number', 4 );
		?>
			<div class="featured-section_data">
			    <div id="featured-section" class="featured-section section">
					<div class="card-container featured_content">
					<?php for ( $i = 1; $i <= $quantity ; $i++ ) { 
							if($i <= 4){ ?>
								<?php if(!empty(get_theme_mod( 'features_one_icon'.$i, $featured_section['featured_section']['icon'][$i-1])) || !empty(get_theme_mod( 'featured_section_title_'.$i,$featured_section['featured_section']['title'][$i-1])) || !empty(get_theme_mod( 'featured_section_description_'.$i,$featured_section['featured_section']['description'][$i-1]))){
								?>
								<div class="card section-featured-wrep"> 
									<div class="side featured-thumbnail">
										<?php
										if(!empty(get_theme_mod( 'features_one_icon'.$i, $featured_section['featured_section']['icon'][$i-1]))){
											?>
											<div class="featured-icon"> 
												<i class="<?php echo esc_attr(get_theme_mod( 'features_one_icon'.$i, $featured_section['featured_section']['icon'][$i-1]))?>"></i>
											</div>
											<?php
										} 
										?>						
										<div class="featured-title"> 
											<?php if(!empty(get_theme_mod( 'featured_section_title_'.$i,$featured_section['featured_section']['title'][$i-1]))){ ?>
												<header class="entry-header">
													<h4>
														<?php echo esc_attr(get_theme_mod( 'featured_section_title_'.$i,$featured_section['featured_section']['title'][$i-1])); ?>
													</h4>
												</header>
											<?php } ?>
											<?php if(!empty(get_theme_mod( 'featured_section_description_'.$i,$featured_section['featured_section']['description'][$i-1]))){ ?>
												<div class="entry-content">
													<?php echo esc_attr(get_theme_mod( 'featured_section_description_'.$i,$featured_section['featured_section']['description'][$i-1] )); ?>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							<?php }else{
								if(!empty(get_theme_mod( 'features_one_icon'.$i)) || !empty(get_theme_mod( 'featured_section_title_'.$i)) || !empty(get_theme_mod( 'featured_section_description_'.$i))){
								?>
								<div class="card section-featured-wrep"> 
									<div class="side featured-thumbnail">
										<?php
										if(!empty(get_theme_mod( 'features_one_icon'.$i))){
											?>
											<div class="featured-icon"> 
												<i class="<?php echo esc_attr(get_theme_mod( 'features_one_icon'.$i))?>"></i>
											</div>
											<?php
										} 
										?>						
										<div class="featured-title"> 
											<?php if(!empty(get_theme_mod( 'featured_section_title_'.$i))){ ?>
												<header class="entry-header">
													<h4>
														<?php echo esc_attr(get_theme_mod( 'featured_section_title_'.$i)); ?>
													</h4>
												</header>
											<?php } ?>
											<?php if(!empty(get_theme_mod( 'featured_section_description_'.$i))){ ?>
												<div class="entry-content">
													<?php echo esc_attr(get_theme_mod( 'featured_section_description_'.$i )); ?>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php
								}
							} 
					} ?>
					</div>
				</div>
			</div>
			<?php
	}
}