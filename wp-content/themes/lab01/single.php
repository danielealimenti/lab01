<?php /* Template name: Single Attivity */

    get_header();

      $ActualPost = get_post();
	//  print_r($ActualPost);
    //
    // $PostAuthor = get_userdata($ActualPost->post_author);
    // echo "stampo l'autore";
    // print_r( $PostAuthor);
    // $ruolo = get_field_object('ruolo', "user_".$PostAuthor->ID);
    // echo implode(", ",$ruolo['value']);
	//  $nomevar = the_author_meta('display_name', $ActualPost->post_author); ?>

	<link rel="stylesheet" href="../assets/css/styles.css" media="screen" title="no title">

<div class="attivitacontent">
    <h2><?php echo $ActualPost->post_title; ?></h2>
    <h4>Autore:<?php the_author_meta('display_name', $ActualPost->post_author);
	?></h4>
    <p>
		<?php echo $ActualPost->post_content;
        //  $ActualPost = get_post();
    	//  print_r($ActualPost);

         $PostAuthor = get_userdata($ActualPost->post_author);
        //  echo "stampo l'autore";
        // print_r( $PostAuthor); ?>
    </p>

</div>
<div class="attivitaright">
    <div class="attivitaprofilo">
        <div class="attivitaimg"> <img src="<?php
        $profilo = get_field_object('immagine_profilo', "user_".$PostAuthor->ID);
        echo $profilo['value']['sizes']['profilo-thumb'];
        ?>" alt="" /></div>

        <h2><?php the_author_meta('display_name', $ActualPost->post_author); ?></h2>
        <h3><?php $nomevar; $array = explode(".",the_author_meta('display_name', $ActualPost->post_author));
		//print_r($array);?></h3>
        <h4><?php $ruolo = get_field_object('ruolo', "user_".$PostAuthor->ID);
        echo implode(", ",$ruolo['value']); ?></h4>
        <h5> <?php
        $terms = get_terms( array(
            'taxonomy' => 'tags',
            'hide_empty' => false,
        ) );
            foreach ($terms as $tags) {
                echo $tags -> name;
                echo " ";
            }

        ?>
    </h5>

    </div>
    <div class="attivitapost">
        <h3>Related</h3>
        <?php
                    $args = array(
                    	'post_type'    => array( 'attivita' ),
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                    	while ( $query->have_posts() ) {
                    		$query->the_post();
                    		// do something
                            ?><ul><li><a href="<?php the_permalink(); ?>">
                            <?php
                            echo the_title(); ?>

                        </a></li></ul>
                    	<?php }
                    }
                    wp_reset_postdata();
                                //}
            ?>
    </div>

</div>

<?php
    get_footer();
 ?>
