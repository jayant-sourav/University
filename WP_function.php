

1.
//Gives the name of Website, parameter can be diffrent.

 <?php bloginfo('name'); ?>   


2.
 //Gives the name of tagline of website

 <?php bloginfo('description'); ?>


 3.
 // Wp function, keeps track of which post you are currently working on, Each time
 	while loop run it will tell WP to get all relevent information about next post ready for us to use.

 			while(have_posts()){

 			the_post();


 		}

 4.
// Slug of the page with the link refering to individual POST/PAGE.

 		<a href= "<?php the_permalink(); ?>">


 5. 

 //Show the title of the blog post.


 		<?php the_title(); ?>



 6.
 // Show the content of the blog post.

 	<?php the_content(); ?>



7.
// Get the content of the header.php

		<?php get_header(); ?>


8.  Get the content of the footer.php


		<?php get_footer(); ?>

9.	Load all the CSS, JS from the function.php, included in head section.


		<?php wp_head(); ?>

10.  Show the admin bar at the top label of screen, included in footer.php


		<?php wp_footer(); ?>




11.
//Load CSS file from style.css

	wp_enqueue_style('user-defined-name', get_stylesheet_uri());



	add_action('wp_enqueue_scripts', 'userdefined-function-name');



12. Putting font link in function.php

	wp_enqueue_style('user-defined-name', '//maxcdn.......    .css');



13. Putting font link in function.php

	wp_enqueue_style('user-defined-name', '//font.......    700i');



14.  Givning url to image folder


	<div class="page-banner_bg_image"  style= "backgroung-image: 
	url(<?php echo get_theme_file_uri('/images/banner.jpg') ?>);"></div>

15.

//Loading JS file


	wp_enqueue_script('user-defined-name', get_theme_file_uri('/js/script-buldled.js'), NULL, 1.0, true);



16.
 //Avoiding JS, CSS file from Caching


 			wp_enqueue_script('user-defined-name', get_theme_file_uri('/js/script-buldled.js'), NULL, microtime(), true);



			wp_enqueue_style('user-defined-name', get_stylesheet_uri(),NULL,mocrotime());



17.

//Generating Current Title tag on browser tab

			
			add_theme_support('title-tag');


			add_action('after_setup_theme', 'userdefined-function-name')


18. 
//Adding link to the menu eg. About Us Page.


	<a href="<?php echo site_url('/about-us') ?>">About US</a>

19.
// Adding link to logo or any content to home page


	<a href="<?php echo site_url() ?>"> Home </a>


20.
// Get the ID of current page

		<?php echo get_the_ID(); ?>


21.

//Give the Id of parent page while we are on child page & display 0(zero) we don't have
parent page of current page.

			<?php echo wp_get_post_parent_id(get_the_ID)); ?>


22.

//Display content of div tag only in child page not in parent page.


	<?php 

		if(wp_get_post_parent_id(get_the_ID()){

			<div>
			............
			</div>

		<?php }  ?>


23.

//Get the title of the parent page on child page

	
	$theParent= wp_get_post_parent_id(get_the_ID());

	Back to <?php echo get_the_title($theParent); ?>    //it allows ur to pass the parameter.



24.
// Pont to the url of Parent page of current page.


	<?php echo get_permalink($theParent);  ?>




25. Setting permalink to Custom URL: eg. http://localhost/university/movie-page/

	//the index.php by default in permalink is removed by creating .htaccess file in root of directory.

	WP-Dashboard->Setting->permalink->SELECT Post name option for permalink and save it.


26. Menu of child page link:

		    <?php 


      $testArray= get_pages(array(

        'child_of'=> get_the_ID()
      ));

    if($theParentpage or $testArray){ ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($theParentPage); ?>">

        <?php echo get_the_title($theParentPage); ?></a></h2>
      <ul class="min-list">
        
        <?php 

              if($theParentPage) {

                $findChildrenOf = $theParentPage;
              }
              else{
                $findChildrenOf= get_the_ID();
              }

              wp_list_pages(array(

                'title_li'=>NULL,
                'child_of'=>$findChildrenOf,
                'sort_column'=> 'menu_order'
              ));

          ?>

      </ul>
    </div>
    <?php } ?>



  27.<!-- Setting up language for the site an be changed through WP setting -->



  		<html <?php language_attributes(); ?>>
  		  <head>



28. <!-- Gives the CHARSET using like UTF-8 -->

        <meta charset="<?php bloginfo(); ?>">



29.<!-- Gives the Website mobile friendly view -->

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
   		 </head>



30.  <!-- Gives body tag a class used in CSS   -->


    	<body <?php body_class(); ?>>


31.  //  Registering Menu in WP Dashboard. The 1st argument is user defined name, 2nd argument is Name that will diplay in WP admin screen is display location while creating menu.

			register_nav_menu('headerMenuLocation', 'Header Menu Location');

			register_nav_menu('footerMenuOne', 'Footer Menu One');

			register_nav_menu('footerMenuTwo', 'Footer Menu Two');


	    <!-- Theme Location points to name where assign name in fucntion.php -->

          <?php 

              wp_nav_menu(array(

                'theme_location'=> 'headerMenuLocation'
              ));
        ?>



         <!-- In footer.php we are pointig to footer menu One name as we given in Function.php -->
              <?php
              wp_nav_menu(array(

                'theme_location'=> 'footerMenuOne'
              ));

              ?>

 32. <ul>

          //Glow Custom menu and is_page is a WP function and about-us argument is slug of the page.
          and 
            Glow menu while we are on child page.wp_get_post_parent_id(0)== 12

            <li <?php if(is_page('about-us') or wp_get_post_parent_id(0)== 12) echo 'class="current-menu-item" ' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li><a href="#">Programs</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Campuses</a></li>
            <li><a href="#">Blog</a></li>



33.Chapter 6

  // front/Home page is powerde by front-page.php
  // blog page is powered by index.php  WP->dashboard->Settings-> static ->Home page  Posts page->blog


    Copy all content to front-page.php

Index.php for blog with designs

<?php 
    while(have_posts()){

      the_post();  ?>

      <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href= "<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
 


        <div class="metabox">
          <p>Posted By <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
        </div>



//the_excerpt() is used instead of the_content() bcz it shows little content not whole content of blog POST.
        <div class="generic-content">
          <?php the_excerpt(); ?>
          <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue Reading &raquo;</a></p>
        </div>
      </div>
<?php

// Generate pagination link


  echo paginate_links();

 } get_footer();?>

            
34.    Setting up metabox with link:

<div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog') ?>"><i class="fa fa-home" aria-hidden="true"></i>Blog Home</a> <span class="metabox__main">Posted By <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></span></p>
    </div>


35. Create new file archive.php as individual post aurthor or category is powered by archive.php

// copy all content of index.php to archive.php

// for Custom setting archive screen name we can go for if loop like:

   <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php if(is_category(){

        single_cat_title(); 
      }
      if(is_author()){

        echo 'Posts By'; the_author();

      }?>


        </h1>

//or WP single function for all acrieve .

        <h1><?php the_archive_title(); ?></h1>


// To show archive description WP->user profile description and post-> category->description


        <?php the_archive_description(); ?>


36. // Creating Custom Queries
<!-- Creating Custom Queries... Means Displaying content of Blog Page in Home Page though The object -->


        <?php 
          $homePagePosts = new WP_Query(array(

            'posts_per_page' => 2
          ));

          while ($homePagePosts->have_posts()){
                 $homePagePosts->the_post(); 
          ?>

          <div class="event-summary">
          <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month"><?php the_time('M'); ?></span>
            <span class="event-summary__day"><?php the_time('d'); ?></span>  
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

      <!-- wp_trim_words() function is used instead of the_content() and the_excerpt() bcz to give user defined number of words. -->
            
            <p><?php echo wp_trim_words(get_the_content(),18); ?><a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
          </div>
        </div>

<!-- Cleaning our custom queries , Reset global varibale data back to the state it visit.

        <?php } wp_reset_postdata(); ?>

37.   To get Individual blog page glow means as long as we have post i.e. POST it will glow.


     <li <?php if(get_post_type() == 'post') echo 'class="current-menu-item"'?>><a href="<?php echo site_url('blog'); ?>">Blog</a></li>


38. Automation usinf Node.js
 Install node.js and gulp 

  //curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -

 1. //Google for node.js download and install it.

  //check version

2. node --version

sudo apt-get install -y nodejs


sudo apt-get install -y build-essential

Install Gulp:- 

3. sudo npm install gulp-cli -g


Version Check :

node --version

Copy All Four file to Root directory.

//Change directory in CMD or terminal and run 4. command

4. sudo npm install

gulp watch


To stop automation Ctrl+Ctrl
To Start again gulp watch


39. Custom post type:  Google: Wordpress Dashicons to get icon.
//Custom Post type Name Event Having User Icon and POST Type. Wordpress Dashicons to get icon

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


  However it is not good to keep custom post type in fucntion.php as bcz theme chnages we will lost the data.So it is better to keep our Custom Post type in Must Use Plugin, Name it mu-plungin folder in WP wp-content folder just aside of plugin folder.


  40. How to add Custom Post type in Home Page.

  single-event.php controls the custom post type istead of single.php & achieve-event.php (The name is single as for post and event is the keyword)

You have to update the permalink and save it.

Copy all content from single.php to single-event.php

Copy all content from archieve.php to achieve-event.php

//Link for all archive event

<a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i>Event Home</a>


//Not Able to Show all events to arhive-event.php page



41. Hand crafted excerpt() function. WP-Dashboard-> post->edit->screen option->click excerpt and enter the content.


<!-- wp_trim_words() function is used instead of the_content() and the_excerpt() bcz to give user defined number of words.   Hand crafted excerpt() function. WP-Dashboard-> post->edit->screen option->click excerpt and enter the content. is used with if and else condition-->
            
         
//For blog it is visible in screen option but not for events as it is custom post type.
            <p><?php if(has_excerpt()){

              echo get_the_excerpt();
            }
            else{

              echo wp_trim_words(get_the_content(),18);
            }
             ?><a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
          </div>
        </div>


// For events

<?php

function university_post_type(){

  register_post_type('event', array(

    'supports' => array('title','editor','excerpt'),

    'rewrite'=> array('slug' => 'events'),
    
    'has_archive'=> true,

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

//Adding Menu glow and link to all custom event type
          <li <?php if(get_post_type()== 'event') echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>



42.   Custom field 

// 1. ACF - advance Custom Field
2. CMB2 (Custom metaboxes 2)

  
  	function university_post_type(){

	register_post_type('event', array(

		'supports' => array('title','editor','excerpt','custom-fields'),


We can make custom filed like this but it better to go for Plugins (ACF)

installing plugin gives ftp error wordpress linux

1. give permission 
2. wp-config add line     define('FS_METHOD', 'direct');


//Making date resposive and picking date from custom field

   <span class="event-summary__month"><?php 

                      $eventDate = new DateTime(get_field('event_date'));
                      echo $eventDate->format('M')
                   ?></span>
                    <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>  

43. Sorting date on Event

	
//Function for acrieve-event page to control post sorted by date and and hide old post.
//Changes are made only on function.php and date are made dynamic.

	function university_adjust_queries($query){

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



44. Creating brand new page for past events. name it page-past-event.php   ... past-event is slug for for the page.

	Copy all content from archive-event.php to page-past-event.php  cgnage >= to <

	Pagination link will not work


 echo paginate_links(array(

      'total'=> $pastEvents->max_num_pages
));
  

and to show no of pages :

  $pastEvents = new WP_Query(array(
                'paged' => get_query_var('paged', 1),

                'post_type' => 'event',
                'posts_per_page'=>1,


Glow link for past pages too condition

 <li <?php if(get_post_type()== 'event' OR is_page('past-events')) echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>

Giving url to new Page:
 <p>Looking for past Event? <a href="<?php echo site_url('/past-events') ?>">Click Here</a></p>



45. Create new Custom Program
  
  1. register new in mu-plug-ins
  2. copy all content from single.php to single-program.php for sigle post
  3. copy all content from archive.php(which uses code of index.php) to archive-program.php for all post
  4. Sort/order/set page per post in function.php

  create New Custom field (relayed program) select type relationship and post of Program and 
  POST per page = event(the page you want to disply) programs.



  Creating link from program to event or can be called dislaying content of program to event page

archive-program.php:
  <ul class="link-list min-list">
<?php
    // This function will override default and call all custom post type with given value.

   //  query_posts(array('posts_per_page' => -1,'post_type' => 'event'));

    while(have_posts()){

      the_post();  ?>

        <li><a href= "<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

<?php }   
  echo paginate_links();
?>

</ul>

function.php:
function university_adjust_queries($query){

    if(!is_admin() AND is_post_type_archive('program') AND $query-> is_main_query()){

          $query->set('orderby','title');
          $query->set('order','ASC');
          $query->set('posts_per_page', -1);
  }



  sigle-event.php:
 <?php

          $relatedPrograms = get_field('related_program');


          if($relatedPrograms){

             echo '<hr class="section-break">';
          echo '<h2 class="headline headline--medium"> Related Programs </h2>';
          echo '<ul class="link-list min-list">';

          foreach($relatedPrograms as $program){  ?>

              <li><a href="<?php echo get_the_permalink($program) ?>"><?php echo get_the_title($program); ?></a></li>

            <?php 

          }

           echo '</ul>';

          }
         

     ?>

single-program.php:  
//Code uses database for realting two posts.



    <?php
              $today = date('Ymd');
              $homepageEvents = new WP_Query(array(

                'posts_per_page' => 2,
                'post_type' => 'event',

                //By default it is ordered by post_date.i.e. ( 'orderby' => 'post_date') 
                // For Random 'orderby' => 'rand',
                // 'posts_per_page' => -1 gives all post that meets Post_type condition,

                'meta_key'=>'event_date',
                'orderby' => 'meta_value_num',
                'order'=> 'ASC',
                'meta_query'=> array(

                      array(
                            'key'=>'event_date',
                            'compare'=> '>=',
                            'value'=> $today,
                            'type'=>'numeric'
                      ),
                      array(
                       'key'=>'related_program',
                        'compare'=> 'LIKE',
                        'value'=> '"' .get_the_ID() .'"'
                    )

                  )
              ));


              while($homepageEvents->have_posts()){

                  $homepageEvents->the_post();
                ?>  

               <div class="event-summary">
                  <a class="event-summary__date t-center" href="#">

      <!-- Format date User Defined  new DateTime(); is PHP defined function not WP-->
                   <span class="event-summary__month"><?php 

                      $eventDate = new DateTime(get_field('event_date'));
                      echo $eventDate->format('M')
                   ?></span>
                    <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>  
                   </a>
                  <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                      <p><?php if(has_excerpt()){

              echo get_the_excerpt();
            }
            else{

              echo wp_trim_words(get_the_content(),18);
            }
             ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
              </div>
             
             <?php }

        ?>


//Adding php inside html

         echo '<hr class="section-break">';
              echo '<h2 class="headline headline--medium">Upcoming ' .get_the_title(). ' Events</h2>';



46.  We are relaying on funtion get_the_ID(); and it returns diffrent for same page with diffrent custom queries. This function reset global POST data back to feault url based query.


Whenever we run multiple custom query we must use 

      wp_reset_postdata();

  beacause query gets broken.

47. Adding featured thumbnails image section to Wp dashboard

  function.php

  add_theme_support('post-thumbnails');


  add_action('after_setup_theme', 'titleTag');


For Custom Post type add lines to mu-plugins file


'supports' => array('title','editor','excerpt',thumbnail),

Now features image tab appears in WP-Dashboard for particilar page.


Echo out featured Image in page: 

<?php the_post_thumbnail(); ?>


//Use image through source in anchor tag.

<a href="<?php the_permalink(); ?>">
  <img src="<?php the_post_thumbnail_url() ?>">
  </a>


Add plugin regenerate thumbnails for resize of previous uploaded images that an be found in wp-content/uploads, However Wp will automatically generate the thumbnails of difrrent sizes.

 
To resize the thumbnail : function.php:

add_theme_support('post-thumbnails');
add_image_size('professorPortrait', 600, 400, true);
add_image_size('professorLandscape', 400, 600, true);



//To call custom Image into page:

<?php the_post_thumbnail('professorPortrait'); ?>
<img src="<?php the_post_thumbnail_url('professorLandscape') ?>">


Plugin name: Regenerate thumbnail (Comes in Tools WP-Dashboard)
Cropping Image user defined : plugin name: manual image crop .
This will eable croping option below featured image in WP-Dashboard.
Select Portarint or professorLandscape image and crop that named image.



48. How to make page banner image dynamic and image subtitle dynamic.

create two custom filed for Page Banner Field group 

    subtitle and bgimage 

    Location Set:

    1. POST type = POST 

    (and add)

    2. POST type is not equal = POST.

upload and write subtitle  and set size 

add_image_size('bannerImage', 1500, 300, true);

How to show loaded image on frontend:

<div class ="page-banner" style="background-image: url(<?php $pagebannerImage = get_field('bgimage'); echo $pagebannerImage['sizes']['bannerImage'] ?>);">
</div>


<?php the_field('subtitle'); ?>


However it not right thing to do it again and again on every page, better to go for function.php and add code so that it will global for all pages.


49. Create new function pageBaner() in function.php and paste all code of <div> having image and subtitle.

call the function in individual page 

<?php 

  while(have_posts){
    the_post();

    pageBanner();
  }

?>


50. To have control like custom page Bannner Image Where we can go for default banner if the main banner Image is not found or not specified. image we can write code with condition:


//function pageBaner($args=NULL )

// $args=NULL makes the argument optional so that it will not give error even if argument is not provided.



function.php:

<?php

function pageBaner($args){


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


page.php:


<?php
        get_header();

    while(have_posts()){

      the_post();  

      pageBaner(array(

        'title' => 'Hello this is Title',
        'photo' => 'https://images.unsplash.com/photo-1493246507139-91e8fad9978e?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop='
      ));

      ?>
<div class="container container--narrow page-section">


51. Edit every theme  and use pageBanner() function.



//For Static TEXT
Replace :

  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">All Events</h1>
      <div class="page-banner__intro">
        <p></p>
      </div>
    </div>  
  </div>


With: 

<?php
        get_header();

        pageBaner(array(

          'title'=> 'All Events',
          'subtitle'=> 'See Whats Going in Our World'

        ));

?>



//For Dynamic Code:

Replace:

  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_archive_title(); ?></h1>
      <div class="page-banner__intro">
        <p><?php the_archive_description(); ?></p>
      </div>
    </div>  
  </div>

With:

  <?php
        get_header();

        pageBaner(array(

          'title'=> get_the_archive_title(),
          'subtitle'=> get_the_archive_description()

        ));

?>

//For all blog post we can diretly delete all div and just call pageBaner() function. as it is default active for all blog post. files like sinlge & single-...php


52. Use of get_template_part()

Calling same event on four page, we can go for creating seperate file.

Under mytheme folder create another folder name it template-parts and create file event.php inside it.
eg. for front-page.php:

Replace :

<div class="event-summary">
                  <a class="event-summary__date t-center" href="#">

      <!-- Format date User Defined  new DateTime(); is PHP defined function not WP-->
                   <span class="event-summary__month"><?php 

                      $eventDate = new DateTime(get_field('event_date'));
                      echo $eventDate->format('M')
                   ?></span>
                    <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>  
                   </a>
                  <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                      <p><?php if(has_excerpt()){

              echo get_the_excerpt();
            }
            else{

              echo wp_trim_words(get_the_content(),18);
            }
             ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
              </div>


With:
       get_template_part('template-parts/event');


  Second argument to this function means that it has -event file in that so we can rewrite above code as:
            get_template_part('template-parts/content', event); 

            -- it means that template-parts folder has content-event file in it.

For dynamic file name:

get_template_part('template-parts/content', get_post_type()); 



53. Google Map Integration in diffrent locaton. can creating new post type Campus.

  1. registre new post type in mu-plugins folder.
  2. create new Campusespost type .
  3. Create new Custom field with type Google Map.
  4. For localhost it is ok to show the map but it will not disply in live site so we have to register new Google API for the project.
  5. Go to google API caeate new project copy new API.  AIzaSyDTWVoOYpKR4Mfczf72H4-S2Xplsz9krDg 

6.  Open function.php

    function UniversityMapKey($api){

    $api['key'] = ' AIzaSyDTWVoOYpKR4Mfczf72H4-S2Xplsz9krDg';
    return $api;
}

  add_filter('acf/fields/google_map/api' , 'UniversityMapKey');

  //Now map will show on individual page with live url


7.  //Campuse on front-end

  header.php:

   <li <?php if(get_post_type()== 'campus') echo 'class="current-menu-item" ' ?>><a href="<?php echo get_post_type_archive_link('campus'); ?>">Campuses</a></li>

8. Create new file archive-campus.php   paste all content from archive-program.php into it.

<div class="acf-map">
<?php
   
    while(have_posts()){

      the_post();  

      $mapLocation = get_field('map_location');
      ?>

       <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>"></div>

<?php }   
  
?>

</div>


function.php:

wp_enqueue_script('googleMap','//maps.googleapis.com/maps/api/js?key= AIzaSyDTWVoOYpKR4Mfczf72H4-S2Xplsz9krDg ', NULL,'1.0', true);


ACF documention where GoogleMap.js is written... find in modules inside js folder.


script.js file --- include in the gogle Map modules :

import GoogleMap from './modules/GoogleMap';

var googleMap = new GoogleMap();


Open cmd/terminal  ......... gulp watch or gulp scripts

Now Map is Visible in front end of Website.


9. Creating address on marker and link to individual post.


<div class="acf-map">
<?php
   
    while(have_posts()){

      the_post();  

      $mapLocation = get_field('map_location');
      ?>

       <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">
        <h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
         <?php echo $mapLocation['address']; ?>
      </div>

<?php }   
  
?>

</div>


10. Create new file single-campus.php  Copy all content from single-program.php into it.


       <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>">
        <h3><?php the_title(); ?></h3>
         <?php echo $mapLocation['address']; ?>
      </div>
  </div>


    <?php

            $relatedPrograms = new WP_Query(array(

                'posts_per_page' => -1,
                'post_type' => 'program',

                //By default it is ordered by post_date.i.e. ( 'orderby' => 'post_date') 
                // For Random 'orderby' => 'rand',
                // 'posts_per_page' => -1 gives all post that meets Post_type condition,

                'orderby' => 'title',
                'order'=> 'ASC',
                'meta_query'=> array(

                     array(
                       'key'=>'related_campus',
                        'compare'=> 'LIKE',
                        'value'=> '"' .get_the_ID() .'"'
                    )

                  )
              ));


              if($relatedPrograms->have_posts()){

                
              echo '<hr class="section-break">';
              echo '<h2 class="headline headline--medium">Programs Availabe at this Campus.</h2>';


              echo '<ul class="min-list link-list">';

              while($relatedPrograms->have_posts()){

                  $relatedPrograms->the_post();
                ?>  

                  <li>
                    <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>

             <?php }

              echo '</ul>';


              }

11.   single-program.php for dislpaying link:



          wp_reset_postdata();


        $relatedCampuses = get_field('related_campus');

        if($relatedCampuses){

          echo '<hr class="section-break"';

          echo '<h2 class="headline headline--medium"> ' .get_the_title(). ' campuses</h2>';


          echo '<ul class="min-list link-list">';

            foreach($relatedCampuses as $campus){
              ?>

                <li><a href="<?php echo get_the_permalink($campus); ?>"><?php echo get_the_title($campus) ?></a></li>

            <?php

            }
          echo '</ul>';
        }



// Display all location not only default 10 posts or map.


  function university_adjust_queries($query){


    if(!is_admin() AND is_post_type_archive('campus') AND $query-> is_main_query()){

        $query->set('posts_per_page', -1);
  }

  

54.

































































