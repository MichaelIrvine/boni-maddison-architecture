<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Boni•Maddison_Architects
 */

get_header();
?>

	<div class="projects projects-archive content-area">
		<main id="main-projects" class="projects-main">
			<section class="project-archive-list">

				<div class="projects-main-gallery-container">
					<?php 

					$images = get_field('project_page_gallery', 'option');
					$size = 'full';

					if( $images ): ?>
						<ul class="projects-gallery slick-gallery__projects-main">
							<?php foreach( $images as $image ): ?>
								<li>
									<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
						
				</div>


				<?php
				$tax_terms = get_terms('project_types');
				?>
				<div class="project-list-container">
				<?php
				foreach($tax_terms as $tax_term) : 
				?>
				<div class="accordion">
				
				<div class="accordion-toggle">
				<h3 class="project-list-title"><?php echo $tax_term->name; ?></h3>
				<i class="fas fa-caret-down "></i>
				</div>
				<?php
				$args = array('post_type' => 'projects',
											'posts_per_page' => -1,
											'hide_empty' => true,
											'orderby' => 'term_order',											
											'tax_query' => array( 
												 	array(
													'taxonomy' => 'project_types',
													'field'    => 'slug',
													'terms'    => $tax_term->name,
											)
										)
									);

				$projects = new WP_Query( $args ); 
				
					if ($projects->have_posts() ){
						echo '<ul class="accordion-content">';
						while($projects->have_posts() ){
							$projects->the_post();
							echo '<li>';
							echo '<a href="';
							the_permalink();
							echo '">';
							the_title();
							echo '</a>';
							echo '</li>';
						}
						// wp_reset_postdata();
						echo '</ul>';
					} ?>
					</div>
				<?php
				endforeach;?>
				</div> <!-- End Project List Container -->
				
			</section>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
