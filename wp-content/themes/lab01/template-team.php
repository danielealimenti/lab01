<?php /* Template name: Team */ ?>
<?php get_header(); ?>

<div class="webdiary">
    <div class="webdiary2">
        <!-- <img id="img1" src="<?php bloginfo('template_url'); ?> . /uploads/to/image.png" /> -->
        <div id="img1"></div><!-- Div test -->
        <h2 class="title"><?php the_title() ?></h2>
        <div id="img2"></div><!-- Div test -->
        <!-- <img id="img2" src="<?php //bloginfo('template_url'); ?> . /path/to/image.png" /> -->
    </div>
</div>

<div id="team">
    <?php

    $utenti = get_users();

    foreach( $utenti as $utenteSingolo ) { ?>
        <div class="team1">
            <div class="teamsx">
                <h3><?php echo $utenteSingolo->first_name; ?></h3>
                <h4><?php echo $utenteSingolo->last_name; ?></h4>
                <h5><?php
                    $ruolo = get_field_object('ruolo', "user_".$utenteSingolo->ID);
                    echo implode(", ",$ruolo['value']); ?></h5>
                <p><?php
                    $tag = get_field_object('tag', "user_".$utenteSingolo->ID);
                    echo $tag['value'];
                ?></p>
                <a href="#">scopri ></a>
            </div>
            <?php
            $profilo = get_field_object("immagine_profilo","user_$utenteSingolo->ID");
            ?>

            <img src="<?php echo $profilo['value']['sizes']['profilo-home']; ?>" alt="Foto Profilo" title="Foto Profilo" />
        </div>
    <?php }
    ?>
</div>

<?php get_footer() ?>
