<?php 
function silver_hubs_pro_section_data($sections){
    $sections = array(
	    		'slider' =>	array(
						'title'       => array('Protect Your Own Business' , 'Simple, Intuitive & Expertly Crafted!', 'Protect Your Own Business' ,'Simple, Intuitive & Expertly Crafted!'),
						'description' => array('We are experienced professionals who understand that It services is charging, and are true partners who care about your success.', 'We are experienced professionals who understand that It services is charging, and are true partners who care about your success.', 'We are experienced professionals who understand that It services is charging, and are true partners who care about your success.', 'We are experienced professionals who understand that It services is charging, and are true partners who care about your success.'),
						'button'      => array('Read More','Read More','Read More','Read More'),
						'button_link' => array('#','#','#','#'),
						'video_title' => 'Worlds Leading Machine Learning Company',
						'video_disc' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possimmei ludus efficiendi ei sea summo mazim ex.',
						'video_btn'  => 'Read more',
						'video_btn_link' => '#',
					),
	    		'featured_section' => array(
	    				'icon' => array('fa fa-cloud', 'fa fa-signal', 'fa fa-shield', 'fa fa-mobile'),
	    				'title' => array('clouds','networking','Cybersecurity', 'Mobility'),
	    				'description' => array('Lorem ipsum dolor sit amet, consectetur.','Lorem ipsum dolor sit amet, consectetur.','Lorem ipsum dolor sit amet, consectetur.','Lorem ipsum dolor sit amet, consectetur.','Lorem ipsum dolor sit amet, consectetur.'),
	    			),
	    		'about' => array(
	    				'description' => 'Magnam Dolores Commodi Suscipit. Necessitatibus Eius Consequatur Ex Aliquid Fuga Eum Quidem. Sit Sint Consectetur Velit. Quisquam Quos Quisquam Cupiditate. Et Nemo Qui Impedit Suscipit Alias Ea.',
	    				'description1' => 'Yes, I Know My Stuff! And Throughout Our Coaching Time, You Will Develop The Tools And Confidence To Take Action. My Way Of Coaching Is To Empower You In Becoming The Leader You Want To Be. You Are Unique And So Your Coaching Should Be Too.',
	    			),
	    		'portfolio' => array(
	    				'description' => 'Magnam Dolores Commodi Suscipit. Necessitatibus Eius Consequatur Ex Aliquid Fuga Eum Quidem. Sit Sint Consectetur Velit. Quisquam Quos Quisquam Cupiditate. Et Nemo Qui Impedit Suscipit Alias Ea.',
	    				'title' => array('Free Consulting', 'Best Analysis', 'Successes Reports', 'Best Research', 'Development Strategy', 'Successes Reports'),
	    				'sub_heading' => array('Business Consulting', 'Financial Analysis', 'Project Reporting', 'Skill Research Management', 'Winning Work', 'Project Reporting'),
	    			),
	    		'service' => array(
	    				'description' => 'Magnam Dolores Commodi Suscipit. Necessitatibus Eius Consequatur Ex Aliquid Fuga Eum Quidem. Sit Sint Consectetur Velit. Quisquam Quos Quisquam Cupiditate. Et Nemo Qui Impedit Suscipit Alias Ea.',
	    				'icon' => array('fa fa-lightbulb-o', 'fa fa-search-plus', 'fa fa-desktop', 'fa fa-edit', 'fa fa-area-chart', 'fa fa-file-video-o'),
	    				'title' => array('Digital Branding', 'Seo Optimization', 'Wireframe Design', 'UI Design', 'Analytics Review','Video Marketing'),
	    				'subheading' =>  array('This Is Photoshops Version Of Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin.', 'This Is Photoshops Version Of Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin.', 'This Is Photoshops Version Of Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin.', 'This Is Photoshops Version Of Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin.', 'This Is Photoshops Version Of Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin.', 'This Is Photoshops Version Of Lorem Ipsum. Proin Gravida Nibh Vel Velit Auctor Aliquet. Aenean Sollicitudin.'),
	    			),
	    		'team' => array(
	    				'description' => 'Magnam Dolores Commodi Suscipit. Necessitatibus Eius Consequatur Ex Aliquid Fuga Eum Quidem. Sit Sint Consectetur Velit. Quisquam Quos Quisquam Cupiditate. Et Nemo Qui Impedit Suscipit Alias Ea.',
	    				'title'    => array('Steven Lucy','Glenn Maxwell','Aaron Finch', 'Christiana Ena'),
	    				'headline' => array('Executive','Project Manager','Manager And Director', 'Executive'),
	    			),
	    		'testimonial' => array(
	    			'description' => 'Magnam Dolores Commodi Suscipit. Necessitatibus Eius Consequatur Ex Aliquid Fuga Eum Quidem. Sit Sint Consectetur Velit. Quisquam Quos Quisquam Cupiditate. Et Nemo Qui Impedit Suscipit Alias Ea.',
	    			'title'       => array('Glen Maxwell', 'Mikel Stark', 'Rizon Pet', 'Mikel Stark'),
	    			'sub_heading' => array('Project Manager', 'Project Manager', 'Project Manager', 'Project Manager'),
	    			'deacription1' => array('This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin.', 'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin.', 'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin.', 'This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin.'),
	    			),
	    		'sponsor' => array(
	    			'description' => 'Magnam Dolores Commodi Suscipit. Necessitatibus Eius Consequatur Ex Aliquid Fuga Eum Quidem. Sit Sint Consectetur Velit. Quisquam Quos Quisquam Cupiditate. Et Nemo Qui Impedit Suscipit Alias Ea.',
	    			'image_link' => array('#','#','#','#','#','#','#','#','#','#'),
	    			),
				);
    return $sections;
}
add_filter( 'silver_hubs_pro_section', 'silver_hubs_pro_section_data');

?>