<?php
        get_header();

          pageBaner(array(

          'title'=> 'Past Events',
          'subtitle'=> 'A recap of all our Past Events!'

        ));


?>


   <div class="container container--narrow page-section">


<?php
    // This function will override default and call all custom post type with given value.

   //  query_posts(array('posts_per_page' => -1,'post_type' => 'event'));

        
              $today = date('Ymd');
              $pastEvents = new WP_Query(array(
                'paged' => get_query_var('paged', 1),

                'post_type' => 'event',
                'posts_per_page' => -1 ,
                //By default it is ordered by post_date.i.e. ( 'orderby' => 'post_date') 
                // For Random 'orderby' => 'rand',
                // 'posts_per_page' => -1 gives all post that meets Post_type condition,

                'meta_key'=>'event_date',
                'orderby' => 'meta_value_num ',
                'order'=> 'ASC',
                'meta_query'=> array(

                      array(
                            'key'=>'event_date',
                            'compare'=> '<',
                            'value'=> $today,
                            'type'=>'numeric'
                      )
                    )

              ));



    while($pastEvents->have_posts()){

      $pastEvents->the_post();  


       get_template_part('template-parts/content','event');

}   echo paginate_links(array(

      'total'=> $pastEvents->max_num_pages
));
  
  get_footer();?>