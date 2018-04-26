

<?php

function pageBaner($args=NULL){


	if(!$args['title']) {

		$args['title'] = get_the_title();
	}

	if(!$args['subtitle']) {

		$args['subtitle'] = get_field('page_banner_subtite');
	}
	if(!$args['photo']) {

		if(get_field('page_bannner_bg_image')){

			$args['photo'] = get_field('page_bannner_bg_image')['sizes']['pageBannerImage'];
		}
		else{

			$args['photo'] = get_theme_file_uri('images/ocean.jpg');
		}
	}

?>

<div class="page-banner">

    <div class="page-banner__bg-image" style="background-image: url(<?php 

    	echo $args['photo'];
    
     ?>);">
       
     </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>

<?php  }



function university_files(){

wp_enqueue_script('googleMap','//maps.googleapis.com/maps/api/js?key= AIzaSyDTWVoOYpKR4Mfczf72H4-S2Xplsz9krDg ', NULL,'1.0', true);


wp_enqueue_script('user-defined-name', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);

	
wp_enqueue_style('university-google','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

wp_enqueue_style('university-font','http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

wp_enqueue_style ('university_main_style', get_stylesheet_uri(), NULL, microtime());



	}

	add_action('wp_enqueue_scripts','university_files');

function titleTag(){



//  Registering Menu in WP Dashboard. The 1st argument is user defined name, 2nd argument is Name that will diplay in WP admin screen is display location while creating menu.

			register_nav_menu('headerMenuLocation', 'Header Menu Location');

			register_nav_menu('footerMenuOne', 'Footer Menu One');

			register_nav_menu('footerMenuTwo', 'Footer Menu Two');

// Title that appears on title bar of Browser.

			add_theme_support('title-tag');
			add_theme_support('post-thumbnails');

			add_image_size('professorLandscape', 400, 260, true);
			add_image_size('professorPortrait', 480, 650, true);
			add_image_size('pageBanner', 1500, 350, true);
			


	}

	add_action('after_setup_theme', 'titleTag');


	//Custom Post type Name Event Having User Icon and POST Type. Wordpress Dashicons to get icon
	//Revome all code from here and paste in mu-plugin folder file.
/*
function university_post_type(){

	register_post_type('event', array(

		'public' => true,
		
		'labels' => array(

			'name' => 'Events',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'all_items' => 'All Events',
			'singular_name' => 'Event'

		),

		'menu_icon'=> 'dashicons-calendar',
	));

}

	add_action('init', 'university_post_type');

*/

//Function for acrieve-event page to control post sorted by date and and hide old post.

	function university_adjust_queries($query){


		if(!is_admin() AND is_post_type_archive('campus') AND $query-> is_main_query()){

				$query->set('posts_per_page', -1);
	}

		if(!is_admin() AND is_post_type_archive('program') AND $query-> is_main_query()){

					$query->set('orderby','title');
					$query->set('order','ASC');
					$query->set('posts_per_page', -1);
	}

		if(!is_admin() AND is_post_type_archive('event') AND $query-> is_main_query()){


			 $today = date('Ymd');

			$query->set('meta_key','event_date');
			$query->set('orderby','meta_value_num');
			$query->set('order','ASC');
			$query->set('meta_query', array(

                      array(
                            'key'=>'event_date',
                            'compare'=> '>=',
                            'value'=> $today,
                            'type'=>'numeric'
                      )
                    ));
		}

	}


	add_action('pre_get_posts', 'university_adjust_queries');


function UniversityMapKey($api){

		$api['key'] = ' AIzaSyDTWVoOYpKR4Mfczf72H4-S2Xplsz9krDg';
		return $api;
}

	add_filter('acf/fields/google_map/api' , 'UniversityMapKey');

