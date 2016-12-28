<?php /* Template name: Team */ ?>
<?php get_header(); ?>

<div class="webdiary">
    <h2><?php the_title() ?></h2>
</div>

<div id="team">
    <?php

    $utenti = get_users();

    foreach( $utenti as $singoloUtente ) { ?>
        <div class="team1">
            <div class="teamsx">
                <h3><?php echo $singoloUtente->first_name; ?></h3>
                <h4><?php echo $singoloUtente->last_name; ?></h4>
                <h5><?php
                    $ruolo = get_field_object('ruolo', "user_".$singoloUtente->ID);
                    echo implode(", ",$ruolo['value']); ?></h5>
                <p><?php
                    $tag = get_field_object('tags', "user_".$singoloUtente->ID);
                    echo $tag['value'];
                ?></p>
                <a href="<?php echo get_author_posts_url($singoloUtente->ID)?>">scopri ></a>
            </div>
            <?php
                $profilo = get_field_object("immagine_profilo", "user_".$singoloUtente->ID);
            ?>
            <img src="<?php echo $profilo['value']['sizes']['profilo-team']; ?>" alt="Foto Profilo" title="Foto Profilo" />
        </div>
    <?php }
    ?><!-- END foreach -->
</div>

<?php get_footer() ?>
