<!-- First section -->
    <div class="wrap_header">
        <div class="bg1">
            <div class="webdev">
                <h1> Hello, we are </h1>
                <div class="normalText">
                  <span id="changeText"></span>
                </div>
            </div>
        </div>
    </div>

<!-- Second Section OK -->
<div class="wrapper_page">
    <h2 class="title">
        cosa facciamo
    </h2>
    <div class="wrap_box">

        <?php
        $termini = get_terms(array(
            'taxonomy' => 'tipologia',
            'hide_empty' => false
        ));

        foreach ($termini as $termine) {
            ?>
            <div class="container--tag">
                <img src="
                <?php
                    $img = get_field('skillimage', $termine->taxonomy.'_'.$termine->term_id);
                    echo $img["url"];
                ?>" alt="">
                <div class="wrap_text--tag">

                    <h4><?php echo $termine->name; // questa chiamata stampa il name di ogni termine ?></h4>
                    <p><?php echo $termine->description; //stampa la descrizione del termine ?></p>
                </div>
                <a href="<?php echo get_term_link($termine, "tipologia"); ?>" class="btn_more">scopri di più ></a>
            </div>
        <?php
        }

        //Restore original Post Data
        wp_reset_postdata();
        ?>
    </div>
    <div class="btn_all">
        <!-- manca il link alla pagina degli user -->
        <!-- <a href="#" class="btn">About us</a> -->
    </div>
</div><!-- END Second Section -->

<!-- Third Section -->
<div class="wrapper_page">
    <h2 class="title">diario</h2>
        <div class="wrap_box diary">
            <?php
                // WP_Query arguments
                $args = array(
                       'post_type'  => array( 'attivita' ),
                );

                $index = 0; //indice che conta fino a 3 per uscire dal ciclo while

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                	while ( $query->have_posts() && $index < 3) {
                		$query->the_post();
                        $index ++;
                        ?>
                        <div class="box box--activity">
                        <p class="titolo"><?php the_title(); ?></p>
                        <?php the_post_thumbnail(); ?>
                        <?php
                            //mi ritorno il contenuto dell'attivita
                            $phrase = get_the_content();
                            // This is where wordpress filters the content text and adds paragraphs
                            $phrase = apply_filters('the_content', $phrase);
                            //mi preparo la prima parte della p html
                            $replace = '<p class="text">';
                            //stampo la stringa sostituita
                            echo str_replace('<p>', $replace, $phrase);
                        ?>

                        <a href="<?php echo get_permalink(); ?>" class="btn--more btn_more--black">leggi di più</a>
                        </div>
                        <?php
                	}
                }
                // Restore original Post Data
                wp_reset_postdata();
            ?>
        </div><!-- END Riquadri -->
    <div class="btn_all">
        <!-- manca link alla pagina delle attivita -->
        <a href="#" class="btn">visualizza tutto</a>
    </div>
</div><!-- END Third Section -->

<!-- Fourth Section -->
<div class="wrapper_page">
    <h2 class="title">
        Chi siamo
    </h2>
    <div class="wrap_box diary">

        <?php

        $utenti = get_users();

        $array = array();

        for ($i=0; $i < 3; $i++) {

            $randval = mt_rand(0, count($utenti)-1);

            // while per controllo se utente gia stampato
            while(in_array($randval,$array)){
                $randval = mt_rand(0, count($utenti)-1);
            }

            array_push($array, $randval);

            $singoloUtente = $utenti[$randval];
            ?>

            <div class="box box--users">
                <img src="
                <?php
                $profilo = get_field_object("immagine_profilo","user_$singoloUtente->ID");
                echo $profilo['value']['sizes']['profilo-home'];
                ?>
                " alt="">
                <div class="bio">
                    <p class="nome"><?php echo $singoloUtente->first_name; ?></p>
                    <p class="cognome"><?php echo $singoloUtente->last_name; ?></p>
                    <p class="cosa">
                    <?php
                        $ruolo = get_field_object('ruolo', "user_".$singoloUtente->ID);
                        echo implode(", ",$ruolo['value']); ?>
                    </p>
                    <p class="tag">
                    <?php
                        $tags = get_field_object('tag', "user_".$singoloUtente->ID);
                        echo $tags['value'];
                    ?>
                    </p>
                    <a href="<?php echo get_author_posts_url($singoloUtente->ID); ?>"> scopri ></a>
                </div>

            </div>
        <?php
        }
        ?>
        </div>
    <div class="btn_all">
        <!-- manca da aggiungere il link -->
        <a href="<?php echo get_page_link(94) ?>" class="btn">visualizza team</a>
    </div>
</div>
<!--END Wrap Box -->
</div>
<!-- END Fourth Section -->
