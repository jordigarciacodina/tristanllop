
<?php
/**
 * Tristán Llop.
 *
 * This file adds the Directo page template to the Tristán Llop Genesis Child Theme.
 *
 * @package Tristán Llop
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Display Front Page Sections
add_action('genesis_loop', 'bs_display_front_page_sections');
function bs_display_front_page_sections() { ?>

	<section class="posts-loop directos">
		<div class="wrap" style="padding: 0">
			<div class="section-title">
				<h3><?php _e('Directos anteriores', 'bs'); ?></h3>
			</div>
			<div class="posts-wrapper"> 
			
			<?php global $post;

			$args = array(
				'posts_per_page' 	=> -1,
				'post_type' 		=> 'directo',
				'order' 			=> 'DESC'
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>">
					<article class="directo">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
						<div class="entry-content">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</div>
					</article>
				</a><?php

   			endforeach;
   			wp_reset_postdata();?>
				
			</div>
		</div>
	</section> <?php

}

genesis();