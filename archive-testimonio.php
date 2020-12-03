<?php
/**
 * Tristán Llop.
 *
 * This file adds the front template to the Tristán Llop Theme.
 *
 * @package Tristán Llop
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

 // Display Testimonios Archive Sections
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bs_display_testimonios_archive_content');
function bs_display_testimonios_archive_content() { ?>
    <section class="testimonials">
		<div class="wrap">
			<div class="posts-wrapper testimonios"> <?php
				
			global $post;

			$args = array(
				'posts_per_page' 	=> -1,
				'post_type' 		=> 'testimonio',
				'order' 			=> 'DESC',
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
				setup_postdata($post); ?>
					<article class="testimonio">
						<div class="entry-content">
							<?php the_excerpt() ?>
							<h3><?php the_title(); ?><h3>
						</div>
					</article>
				<?php
			endforeach;

			wp_reset_postdata(); ?>
					
			</div>
		</div>
    </section> <?php
    
}

genesis();