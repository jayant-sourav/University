



<?php
        get_header();

        pageBaner(array(

          'title'=> 'All Events',
          'subtitle'=> 'See Whats Going in Our World'

        ));

?>


  
   <div class="container container--narrow page-section">


<?php
    // This function will override default and call all custom post type with given value.

   //  query_posts(array('posts_per_page' => -1,'post_type' => 'event'));

    while(have_posts()){

      the_post();  

       get_template_part('template-parts/content','event');

       }   
  echo paginate_links();
?>
<hr class="section-break">

<p>Looking for past Event? <a href="<?php echo site_url('/past-events') ?>">Click Here</a></p>

</div>
  <?php get_footer();?>