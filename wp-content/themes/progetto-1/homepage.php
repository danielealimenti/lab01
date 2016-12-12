<?php
/* Template name: Homepage
*/
//il commento sopra per creare modelli di pagina. Homepage è il nome che diamo al modello
 ?>

 <?php
//bisogna ricordarsi di importare l'<head> in ogni modello di pagina o articolo
 get_header();
 ?>

 <!-- Wrapper -->
 <div id="wrapper">
     <!-- Main -->
         <div id="main">
             <div class="inner">

                 <?php
                    //per includere file con parti di html, esempio top.php
                    get_template_part('top')
                 ?>

                 <!-- carico il contenuto della pagine Homepage -->
                      <section id="banner">
                          <div class="content">
                              <?php
                              //controllo se c'è il post della Homepage
                              while ( have_posts() ) : the_post(); ?>
                            <header>
                                <?php
                                //inserisco il titolo della Homepage
                                the_title('<header><h1>','</h1></header>'); ?>
                            </header>

                              <div class="entry-content-page">
                                  <?php the_content(); ?> <!-- Inserisco il contenuto della Homepage -->
                              </div>
                              <ul class="actions">
                                  <li><a href="<?php get_permalink() //inserisco il link della Homepage ?>" class="button big">Learn More</a></li>
                              </ul>
                              <?php
                               endwhile;
                               wp_reset_query();
                               ?>
                          </div>
                          <span class="image object">
                              <img src="<?php the_post_thumbnail_url(); //metto l'immagine della Homepage ?>" alt="" />
                          </span>
                      </section>

                 <!-- Section -->
                     <section>
                         <header class="major">
                             <h2>Recent Articles</h2>
                         </header>
                         <div class="posts">
                            <?php


                            // WP_Query arguments, metto categoria con ID 1 (Senza Categoria)
                            $args = array(
                            	'cat'                    => '1',
                            );
                            //Aggiungo gli articoli più recenti
                            // The Query
                            $query = new WP_Query( $args );

                            // The Loop
                            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                                <!-- QUESTA SOLUZIONE FUNZIONA SENZA PROBLEMI
                                <!-- <article style="color:<?php // the_field('colore'); ?>"> -->

                                <?php
                                $color = get_field('colore');

                                //se dentro l'echo metto il the_field('colore') dà problemi, lo stampa fuori da <article>
                                echo "<article style=color:" . $color . ">";

                                // echo the_field('colore');
                                the_title('<h3>','</h3>');
                                the_post_thumbnail();
                                //the_content();
                                the_excerpt();
                                echo "<ul class=\"actions\"><li><a href=\"".get_permalink()."\" class=\"button\">More</a></li>
                                </ul></article>";
                                /*

                                Per ottenere il valore di un campo in Advanced Custom Field
                                <?php the_field('nomecampo'); ?>

                                */
                                //echo "</article>";
                            endwhile; endif;

                            // Restore original Post Data
                            wp_reset_postdata();

                            ?>

                         </div>
                     </section>
                     <section>
                         <header class="major">
                             <h2>Tasks</h2>
                         </header>
                         <div class="posts">
                            <?php


                            // WP_Query arguments, metto categoria con ID 1 (Senza Categoria)
                            // WP_Query arguments
                            $args = array(
                            	'post_type' => array( 'attivita' ),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'tipologia',
                                        'field' => 'slug',
                                        'terms' => 'coding'
                                    )
                                )
                            );

                            // The Query
                            $query = new WP_Query( $args );
                            //Aggiungo gli articoli più recenti

                            // The Loop
                            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                                <!-- QUESTA SOLUZIONE FUNZIONA SENZA PROBLEMI
                                <!-- <article style="color:<?php // the_field('colore'); ?>"> -->

                                <?php
                                $color = get_field('colore');

                                //se dentro l'echo metto il the_field('colore') dà problemi, lo stampa fuori da <article>
                                echo "<article style=color:" . $color . ">";

                                // echo the_field('colore');
                                the_title('<h3>','</h3>');
                                the_post_thumbnail();
                                //the_content();
                                the_excerpt();
                                echo "<ul class=\"actions\"><li><a href=\"".get_permalink()."\" class=\"button\">More</a></li>
                                </ul></article>";
                                /*

                                Per ottenere il valore di un campo in Advanced Custom Field
                                <?php the_field('nomecampo'); ?>

                                */
                                //echo "</article>";
                            endwhile; endif;

                            // Restore original Post Data
                            wp_reset_postdata();

                            ?>

                         </div>
                     </section>
            </div>
        </div>
        <div id="sidebar">
            <?php
               //per includere file con parti di html, esempio sidebar.php
               get_template_part('sidebar')
            ?>
        </div>

    </div>


        <?php
        //carico il footer
        get_footer();
        ?>
