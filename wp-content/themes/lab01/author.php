<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

        <section id="primary">
            <div id="content" role="main">
                <?php echo "TEMPLATE AUTHOR" ?>

            <?php if ( have_posts() ) : ?>

                <?php
                    /* Queue the first post, that way we know
                     * what author we're dealing with (if that is the case).
                     *
                     * We reset this later so we can run the loop
                     * properly with a call to rewind_posts().
                     */
                    the_post();



                ?>

                <header class="page-header">
                    <h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'twentyeleven' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
                </header>

                <?php
                    /* Since we called the_post() above, we need to
                     * rewind the loop back to the beginning that way
                     * we can run the loop properly, in full.
                     */
                    rewind_posts();
                ?>

                <?php previous_posts_link(); ?>

                <?php
                // If a user has filled out their description, show a bio on their entries.
                if ( get_the_author_meta( 'description' ) ) :
                    $user_id = get_the_author_meta( 'ID' );
                    ?>


                <div id="author-info">
                    <div id="author-avatar">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                    </div><!-- #author-avatar -->

                    <div class="immagineCopertina" style="background: url('<?php the_field('immagine-copertina', "user_$user_id") ?> no-repeat top center') ">
                        <div class="immagineProfilo">

                            <img width="145" height="145" src="<?php the_field('immagine_profilo', "user_$user_id");?>" alt="profilo">
                            <h1><?php the_author_meta( 'first_name' ); ?> <?php the_author_meta( 'last_name' ); ?></h1>
                            <h2><?php $ruolo = get_field_object('ruolo', "user_$user_id"); echo implode(", ",$ruolo['value']); ?></h2>
                        </div>


                    </div>


                    <div id="author-description">

                        <?php
                            echo '<br/>';
                        /*
                            echo '<ul>'
                                $fields = get_fields("user_{$user_id}");
                                //echo "GET FIELDS";

                                if( $fields )
                                {
                                    //echo "ENTRATO SU IF";
                                    foreach( $fields as $field_name => $value)
                                    {
                                        // get_field_object( $field_name, $post_id, $options )
                                        // - $value has already been loaded for us, no point to load it again in the get_field_object function
                                        $field = get_field_object($field_name, "user_$user_id");

                                        echo '<li>';

                                        //echo 'LABEL: ' . $field['label'] . ' VALORE: ' . $field['value'];
                                        //echo json_encode($field);

                                        if(is_array($field['value'])){
                                            echo $field['label']. ': ' . implode(", ",$field['value']);
                                        }

                                        else{
                                            echo $field['label']. ': ' . $field['value'];
                                        }

                                        echo '</li>';
                                    }
                                }

                                echo '</ul>'
                                */?>

                            <li><span class="label">Cognome:</span> <?php the_author_meta( 'last_name' ); ?></li>
                            <li><span class="label">Nome:</span> <?php the_author_meta( 'first_name' ); ?></li>
                            <li><span class="label">Bio:</span> <?php the_author_meta( 'description' ); ?></li>
                            <li><span class="label">E-mail:</span> <?php the_author_meta( 'user_email' ); ?></li>
                            <li>
                                <?php
                                    $ruolo = get_field_object('ruolo', "user_$user_id");
                                    echo '<span class="label">' .$ruolo['label']. ':</span> ' . implode(", ",$ruolo['value']);
                                ?>
                            </li>
                            <li>
                                <?php
                                    $competenze = get_field_object('competenze', "user_$user_id");
                                    echo '<span class="label">' .$competenze['label']. ':</span> ' . implode(", ",$competenze['value']);
                                ?>
                            </li>
                            <?php

                                foreach ($ruolo['value'] as $value) {
                                    if(preg_match("/\bdesigner\b/i",$value)) { $tools = get_field_object('tools', "user_$user_id"); ?>
                                        <li>
                                            <?php echo '<span class="label">' .$tools['label']. ':</span> ' . implode(", ",$tools['value']); ?>
                                        </li>
                                <?php
                                    }
                                    elseif(preg_match("/\bprogrammatore\b/i",$value)) { $linguaggi_framework = get_field_object('linguaggi-framework', "user_$user_id");?>
                                        <li>
                                            <?php echo '<span class="label">' .$linguaggi_framework['label']. ':</span> ' . implode(", ", $linguaggi_framework['value']); ?>
                                        </li>
                                <?php
                                    }
                                }?>

                        </ul>

                        <h3>Social</h3>
                        <ul>
                            <?php if(get_field('facebook', "user_$user_id")) : ?>
                                <li><a href="<?php the_field('facebook', "user_$user_id"); ?>">Facebook</a></li>
                            <?php endif; ?>
                            <?php if(get_field('twitter', "user_$user_id")) :?>
                                <li><a href="<?php the_field('twitter', "user_$user_id");?>">Twitter</a></li>
                            <?php endif; ?>
                            <?php if(get_field('linkedin', "user_$user_id")) : ?>
                                <li><a href="<?php the_field('linkedin', "user_$user_id"); ?>">Linkedin</a></li>
                            <?php endif; ?>
                        </ul>
                        <br>


                    </div><!-- #author-description -->
                </div><!-- #entry-author-info -->
                <?php endif; ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                    ?>

                <?php endwhile; ?>

                <?php next_posts_link(); ?>

            <?php else : ?>

                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
                        <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-0 -->

            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
