<!-- First section -->
    <div class="wrap_header">
        <div class="bg1">
            <div class="webdev">
                <h1>
                  <span class="fermo">Hello, we are</span><br>
                  <a href="" class="typewrite" data-period="2000" data-type='[ "Web Developers", "Web Designer", "App Developer" ]'>
                    <span class="wrap"></span>
                  </a>
                </h1>
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
                <div class="wrap_text--tag">
                    <img src="
                    <?php
                        $img = get_field('skillimage', $termine->taxonomy.'_'.$termine->term_id);
                        echo $img["url"];
                    ?>" alt="">
                    <h4><?php echo $termine->name; // questa chiamata stampa il name di ogni termine ?></h4>
                    <p><?php echo $termine->description; ?></p>
                </div>
            </div>
        <?php
        }

        //Restore original Post Data
        wp_reset_postdata();
        ?>
    </div>
    <div class="btn_all">
        <a href="#" class="btn">About us</a>
    </div>
</div><!-- END Second Section -->

<!-- Third Section -->
<div class="wrapper_page">
    <h2 class="title">diario</h2>
        <div class="wrap_box">
            <div class="box box--activity">
            <?php
                // WP_Query arguments
                $args = array(
                       'post_type'  => array( 'attivita' ),
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                	while ( $query->have_posts() ) {
                		$query->the_post();
                        ?>
                        <p><?php the_title(); ?></p>
                        <?php the_post_thumbnail(); ?>
                        <p><?php  the_content();?></p>
                        <a href="#" class="btn--more btn_more--black">leggi di più</a>
                        <?php
                	}
                }
                // Restore original Post Data
                wp_reset_postdata();
            ?>
            </div>
        </div><!-- END Riquadri -->
    <div class="btn_all">
        <a href="#" class="btn">visualizza tutto</a>
    </div>
</div><!-- END Third Section -->

<!-- Fourth Section -->
<div class="wrapper_page">
    <h2 class="title">
        Chi siamo
    </h2>
    <div class="wrap_box">

        <?php

        $utenti = get_users();
        $array = array();

        for ($i=0; $i < 3; $i++) {

            $randval = mt_rand(0, count($utenti)-1);

            // while per controllo presenza utente
            while(in_array($randval,$array)){
                $randval = mt_rand(0, count($utenti)-1);
            }

            array_push($array, $randval);

            $singoloUtente = $utenti[$randval];
            ?>
            <div class="box box--users">
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
                    <a href="#"> scopri ></a>
                </div>
                <img src="" alt="">
            </div>
        <?php
        }
        ?>
        </div>
    </div>
    <!--END Wrap Box -->
    <div class="btn_all">
        <a href="#" class="btn">visualizza team</a>
    </div>
</div>
<!-- END Fourth Section -->

<footer>
    <p class="float--sx">lab01 by <a href="#" class="link_med">med innovations</p>
    <p class="float--dx">Med Computer s.r.l., via CLuentina, 35/B 62100 Macerata (Loc. Piediripa) Italia</p>
</footer>
