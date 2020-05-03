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

	<div class="projects content-area">
		<main id="main" class="projects-main">
			<h1>Projects</h1>

			<h2 class="project-category-title">Commercial</h2>
				<?php
				$args = array('post_type' => 'projects',
											'posts_per_page' => -1,
											'tax_query' => array( 
												 	array(
													'taxonomy' => 'project_types',
													'field'    => 'slug',
													'terms'    => 'commercial'

														)
													)
												);


				$works = new WP_Query( $args );

					if ($works->have_posts() ){
						while($works->have_posts() ){
							$works->the_post();

							echo '<a class="project-link" href="';
							the_permalink();
							echo '">';
							the_title();
							echo '</a>';

						}
						wp_reset_postdata();
					}

			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

