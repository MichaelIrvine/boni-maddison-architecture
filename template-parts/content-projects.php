<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Boni•Maddison_Architects
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
    if ('post' === get_post_type()) :
    ?>
    <?php endif; ?>
  </header><!-- .entry-header -->
  <a href="<?php echo home_url('/projects'); ?>" class="back-button"> &#x2190; Back To All Projects</a>
  <div class="project entry-content">
    <section class="project-singular">
      <div class="project-info">
        <?php
        the_field('project_info')
        ?>
      </div>
      <div class="project-singular-gallery">
        <?php

        $projectSingleImages = get_field('project_gallery');
        $size = 'full';

        if ($projectSingleImages) : ?>
        <ul class="single-project-gallery slick-gallery__projects">
          <?php foreach ($projectSingleImages as $projectSingleImage) : ?>
          <li>
            <?php echo wp_get_attachment_image($projectSingleImage['ID'], $size); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>


      </div>
    </section>
    <?php
    wp_link_pages(array(
      'before' => '<div class="page-links">' . esc_html__('Pages:', 'boni-maddison-architects'),
      'after'  => '</div>',
    ));
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php boni_maddison_architects_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->