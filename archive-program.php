



<?php
        get_header();

        pageBaner(array(

          'title'=> 'All Programs',
          'subtitle'=> 'There is Something for Everyone.'

        ));

?>


   <div class="container container--narrow page-section">

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

</div>
  <?php get_footer();?>