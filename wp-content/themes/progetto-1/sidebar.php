<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Progetto_1
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php
/*<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->*/

 ?>

		 <div class="inner">

			 <!-- Search -->
				 <section id="search" class="alt">
					 <form method="post" action="#">
						 <input type="text" name="query" id="query" placeholder="Search" />
					 </form>
				 </section>

			 <!-- Menu -->
				 <nav id="menu">
					 <header class="major">
						 <h2>Menu</h2>
					 </header>
					 <?php
					 	//metodo per stampare le voci di un determinato. Ci sono vari parametri, tra cui quale menù e quale tag contenitore, esempio <nav> o <div>
						 wp_nav_menu(
							array(
								'menu' => 'Menu 1',
								'container' => 'div'
						  	)
						 );
					?>
				</nav>


			 <!-- Section -->
				 <section>
					 <header class="major">
						 <h2>Get in touch</h2>
					 </header>
					 <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
					 <ul class="contact">
						 <li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
						 <li class="fa-phone">(000) 000-0000</li>
						 <li class="fa-home">1234 Somewhere Road #8254<br />
						 Nashville, TN 00000-0000</li>
					 </ul>
				 </section>
		 </div>
