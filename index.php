



<?php
        get_header();

          pageBaner(array(

          'title'=> 'Get in Touch with Latest Blog',
          'subtitle'=> 'Latest News...!'

        ));


?>



   <div class="container container--narrow page-section">


<?php 
    while(have_posts()){

      the_post();  ?>

      <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href= "<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
 


        <div class="metabox">
          <p>Posted By <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
        </div>

        <div class="generic-content">
          <?php the_excerpt(); ?>
          <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue Reading &raquo;</a></p>
        </div>
      </div>
<?php 


// Generate pagination link... Commented it for time being.

//   echo paginate_links();

} get_footer();?>