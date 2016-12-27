<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lab01
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Repeater
			// check if the repeater field has rows of data
			if( have_rows('contenuto_aggiuntivo') ):

			 	// loop through the rows of data
			    while ( have_rows('contenuto_aggiuntivo') ) : the_row();

			        // display a sub field value
			        the_sub_field('titolo');
					the_sub_field('descrizione');
					the_sub_field('js_fiddle');

			    endwhile;

			else :

			    // no rows found

			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
