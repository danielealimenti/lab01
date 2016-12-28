<?php /* Template Name: diario */
get_header();
?>

<!-- TITLE -->


<div class="diary">
    <div class="diarybox">
        <div class="wave_box1">
        </div>
        <div class="diario">
            <h1>Diario</h1>
        </div>
        <div class="wave_box2">
        </div>
    </div>
</div>





<!-- Inizio Riquadri -->
<div class="left">
    <div class="wrap_box" id="grid">
        <div class="grid-sizer">
<?php
$args = array(
       'post_type'  => array( 'attivita' ),
);


// The Query
$query = new WP_Query( $args );

// The Loop
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        ?>
        <div id="grid-item" class="box box--activity box-diary">
            <div class="rigacolorata">

            </div>
            <p class="titolo"><?php the_title(); ?></p>
            <p class="author">Autore: <?php echo get_the_author(); ?></p>
            <div class="box-line"></div>
            <p class="text"><?php the_content(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn--more btn_more--black">leggi di più ></a>
        </div>
        <?php
    }
}
wp_reset_postdata();
        ?>

<!-- Fine Riquadri -->

<div class="solidline">

</div>

<!-- Right Menu  -->
<div class="right">


    <div class="right-box">

        <!-- <form action="">

            <input id="filter" type="text" name="filter" />

            <input class="btn-cerca" type="submit" value="Cerca >">
        </form> -->

        <div class="filter1">
            <h1>Filtra per attività</h1>

            <?php $termini = get_terms(array(
                'taxonomy' => 'tipologia',
                'hide_empty' => false
            ));

                foreach ($termini as $termine) {
             ?>

            <a href="<?php echo get_term_link($termine, "tipologia");?>"> > <?php echo $termine->name; ?></a>
        <?php  } ?>

            <!-- <a href="#"> > web development</a>
            <a href="#"> > app development</a>
            <a href="#"> > seo</a>
            <a href="#"> > social media marketing</a>
            <a href="#"> > no-404</a> -->

        </div>

        <!-- <div class="filter2">
            <h1>Filtra per autore</h1>

            <a href="#">Pippo</a>
            <a href="#">Pippo</a>
            <a href="#">Pippo</a>
            <a href="#">Pippo</a>
            <a href="#">Pippo</a>
            <a href="#">Pippo</a>

        </div> -->


    </div>
</div>


<?php
get_footer();
?>
