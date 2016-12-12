<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Progetto_1
 */

 get_header(); ?>

 	<div id="wrapper" class="content-area">
 		<div id="main" class="site-main" role="main">

 			<div class="inner">

 				<?php get_template_part('top') ?>

 				<?php
 				while ( have_posts() ) : the_post(); ?>

 					<h1><?php the_title() ?></h1>


 					<?php
 					if(has_post_thumbnail()){
 						the_post_thumbnail();
 					}

 					the_content();

 					// If comments are open or we have at least one comment, load up the comment template.
 					if ( comments_open() || get_comments_number() ) :
 						comments_template();
 					endif;

 				endwhile; // End of the loop.
 				?>

 			</div>



 		</div><!-- #main -->

 	<div id="sidebar">
 		<?php
 		   //per includere file con parti di html, esempio sidebar.php
 		   get_template_part('sidebar')
 		?>
 	</div>

 </div>


 <?php
 get_footer();
