<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lettra
 */

get_header();
?>


<main id="main" class="site-main">

  <?php if (have_posts()) : ?>

    <header class="page-header">
      <?php
        $data = explode(':', get_the_archive_title());
        $cat_title = trim($data[1]);
        ?>
      <h1 class="entry-title"><?php echo $cat_title; ?></h1>
      <?php
        the_archive_description('<div class="archive-description">', '</div>');
      ?>
    </header><!-- .page-header -->

  <?php
    /* Start the Loop */
    while (have_posts()) :
      the_post();

      /*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
      $foo = get_post_type();
      get_template_part('template-parts/content', get_post_type());

    endwhile;

    the_posts_navigation();

  else :

    get_template_part('template-parts/content', 'none');

  endif;
  ?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
