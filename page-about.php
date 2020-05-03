<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Boni•Maddison_Architects
 */

get_header();
?>

<div class="about content-area">
  <main id="main-about" class="about-main">
    <section class="about-intro">
      <!-- About Section Row 1 -->
      <div class="about-container_column-1">
        <div class="about-history-text_row-1 hidden-up">
          <h1 class="about-title">History of Boni•Maddison Architects</h1>
          <?php the_field('history_text'); ?>
        </div>

        <div class="about-history-text_row-2 hidden-up">
          <?php the_field('history_text_2'); ?>
          <div class="awards-recognition__container">
            <?php the_field('awards_recognition'); ?>
          </div>
        </div>
      </div>

      <!-- About div Row 2 -->
      <div class="about-container_column-2">

        <div class="about-image-02 ">

          <?php

          $imagesHistory = get_field('history_image_gallery');
          $size = 'full';

          if ($imagesHistory) : ?>
          <ul class="projects-gallery slick-gallery__about">
            <?php foreach ($imagesHistory as $imageHistory) : ?>
            <li>
              <?php echo wp_get_attachment_image($imageHistory['ID'], $size); ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>

          <div class="history-image-caption">
            <?php the_field('history_image_caption'); ?>
          </div>
        </div>

        <div class="about-intro-image">
          <?php
          $image = get_field('history_image');
          if (!empty($image)) : ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
        </div>
        <div class="history-image-caption">
          <?php the_field('history_image_2_caption'); ?>
        </div>
      </div>

    </section>
    <section class="team">
      <div class="team-title_container">
        <h2 class="team-title">Our Team</h2>
      </div>

      <div class="team-members-container">
        <?php if (have_rows('team_members')) : ?>
        <?php while (have_rows('team_members')) : the_row();
            // vars
            $teamMemberImage = get_sub_field('team_member_image');
            $teamMemberInfo = get_sub_field('team_member_info');
          ?>
        <div class="team-members">

          <div class="team-member-image">
            <img src="<?php echo $teamMemberImage['url']; ?>" alt="<?php echo $teamMemberImage['alt'] ?>" />
          </div>
          <div class="team-member-info">
            <?php echo $teamMemberInfo; ?>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </section>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();