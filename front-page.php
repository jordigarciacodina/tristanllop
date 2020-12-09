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

// Add custom body classes
add_filter( 'body_class', 'bs_add_custom_body_classes');
function bs_add_custom_body_classes( $classes ) {
	$classes[] = 'super-full-width-page';
    if (bs_has_user_purchased_specific_product()):
		$classes[] = 'edd-active';
	endif;

	return $classes; 
	
}

// Display Front Page Sections
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bs_display_front_page_sections');
function bs_display_front_page_sections() {
    if (!bs_has_user_purchased_specific_product()): ?>

	<section class="hero">
		<div class="wrap">
			<div class="box">
				<h1><?php echo get_theme_mod('hero_title'); ?></h1>
				<p><?php echo get_theme_mod('hero_description'); ?></p>
				<div class="benefits">
					<div class="benefit">
						<i class=" <?php echo get_theme_mod('hero_benefit_1_icon'); ?>" aria-hidden="true"></i>
						<p><?php echo get_theme_mod('hero_benefit_1_text'); ?></p>
					</div>
					<div class="benefit">
						<i class=" <?php echo get_theme_mod('hero_benefit_1_icon'); ?>" aria-hidden="true"></i>
						<p><?php echo get_theme_mod('hero_benefit_2_text'); ?></p>
					</div>
					<div class="benefit">
						<i class=" <?php echo get_theme_mod('hero_benefit_1_icon'); ?>" aria-hidden="true"></i>
						<p><?php echo get_theme_mod('hero_benefit_3_text'); ?></p>
					</div>
					<div class="benefit">
						<i class=" <?php echo get_theme_mod('hero_benefit_1_icon'); ?>" aria-hidden="true"></i>
						<p><?php echo get_theme_mod('hero_benefit_4_text'); ?></p>
					</div>
				</div>
				<div class="cta">
					<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('hero_primary_cta_link'); ?>'"><?php echo get_theme_mod('hero_primary_cta_text'); ?></button>
				</div>
			</div>
		</div>
	</section>
	<section class="featureds">
		<div class="wrap">
			<div class="row">
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_1'); ?>">
					<h3><?php echo get_theme_mod('featured_title_1'); ?></h3>
					<p><?php echo get_theme_mod('featured_description_1'); ?></p>
				</div>
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_2'); ?>">
					<h3><?php echo get_theme_mod('featured_title_2'); ?></h3>
					<p><?php echo get_theme_mod('featured_description_2'); ?></p>
				</div>
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_3'); ?>">
					<h3><?php echo get_theme_mod('featured_title_3'); ?></h3>
					<p><?php echo get_theme_mod('featured_description_3'); ?></p>
				</div>
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_4'); ?>">
					<h3><?php echo get_theme_mod('featured_title_4'); ?></h3>
					<p><?php echo get_theme_mod('featured_description_4'); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php else: ?>

	<?php endif; ?>
	<section class="posts-loop">
		<div class="wrap">
		<div class="last-content">
			<h2><?php echo get_theme_mod('cursos_content_title'); ?></h2>
				<div class="posts-wrapper cursos"> <?php
				
				global $post;

				$args = array(
					'posts_per_page' 	=> 3,
					'post_type' 		=> 'course',
					'order' 			=> 'DESC',
				);

				$myposts = get_posts($args);

				foreach ($myposts as $post):
					setup_postdata($post); ?>
						<a href="<?php the_permalink(); ?>">
							<article class="curso">
								<header class="entry-header">
									<?php the_post_thumbnail(); ?>
								</header>
								<div class="entry-content">
									<h2 class="entry-title"><?php the_title(); ?></h2>
								</div>
							</article>
						</a>
					<?php
				endforeach;

				wp_reset_postdata(); ?>
					
				</div>
				<div class="more-content">
					<a href="<?php echo get_theme_mod( 'cursos_content_cta_link'); ?>">VER MÁS CURSOS</a>
				</div>
			</div>
			<!-- <div class="last-content">
			<h2><?php echo get_theme_mod('directos_content_title'); ?></h2>
				<div class="posts-wrapper directos"> <?php
				
				global $post;

				$args = array(
					'posts_per_page' 	=> 3,
					'post_type' 		=> 'directo',
					'order' 			=> 'DESC',
					'category_name' 	=> 'portada'
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
						</a>
					<?php
				endforeach;

				wp_reset_postdata(); ?>
					
				</div> -->
				<!-- <div class="more-content">
					<a href="<?php echo get_theme_mod( 'directos_content_cta_link'); ?>"><?php echo get_theme_mod('directos_content_cta_text'); ?></a>
				</div>
			</div>
			<div class="last-content">
			<h2><?php echo get_theme_mod('extras_content_title'); ?></h2>
				<div class="posts-wrapper extras"> <?php
				
				global $post;

				$args = array(
					'posts_per_page' 	=> 3,
					'post_type' 		=> 'extra',
					'order' 			=> 'DESC',
					'category_name' 	=> 'portada'
				);

				$myposts = get_posts($args);

				foreach ($myposts as $post):
					setup_postdata($post); ?>
						<a href="<?php the_permalink(); ?>">
							<article class="extra">
								<header class="entry-header">
									<?php the_post_thumbnail(); ?>
								</header>
								<div class="entry-content">
									<h2 class="entry-title"><?php the_title(); ?></h2>
								</div>
							</article>
						</a>
					<?php
				endforeach;

				wp_reset_postdata(); ?>
					
				</div>
				<div class="more-content">
					<a href="<?php echo get_theme_mod( 'extras_content_cta_link'); ?>"><?php echo get_theme_mod('extras_content_cta_text'); ?></a>
				</div>
			</div> -->
		</div>
	</section>
	<?php if (!bs_has_user_purchased_specific_product()): ?>
	<section class="testimonials">
		<div class="wrap">
			<h2><?php echo get_theme_mod('testimonios_content_title'); ?></h2>
				<div class="posts-wrapper testimonios"> <?php
				
				global $post;

				$args = array(
					'posts_per_page' 	=> 3,
					'post_type' 		=> 'testimonio',
					'order' 			=> 'DESC',
					'category_name' 	=> 'portada'
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
				<div class="more-content">
					<a href="<?php echo get_theme_mod( 'testimonios_content_cta_link'); ?>"><?php echo get_theme_mod('testimonios_content_cta_text'); ?></a>
				</div>
			</div>
		</div>
	</section>
	<?php else: ?>

	<?php endif; ?>

<?php }

genesis();
