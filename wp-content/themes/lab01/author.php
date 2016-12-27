<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();

if ( get_the_author_meta( 'description' ) ) :

    //id dell'autore
    $user_id = get_the_author_meta( 'ID' );

    /* NOMI SIZE DEFINITI SU FUNCTIONS.PHP PER I RITAGLI DELLE IMMAGINI */
    $profilo_thumb = 'profilo-thumb';
    $copertina_thumb = 'copertina-thumb';

    /* NOMI DEI CAMPI DEFINITI SU ACF E STANDARD DI WORDPRESS */
    $field_copertina = 'immagine_di_copertina';
    $field_profilo = 'immagine_profilo';
    $field_nome = 'first_name';
    $field_cognome = 'last_name';
    $field_ruolo = 'ruolo';
    $field_motto = 'motto';
    $field_bio = 'description';
    $field_tags = 'tags';
    $field_competenze = 'competenze';
    $field_tools = 'tools';
    $field_linguaggi_framework = 'linguaggi-framework';
    $field_curriculum_vitae = 'curriculum_vitae';
    $field_email = 'email';
    $field_facebook = 'facebook';
    $field_twitter = 'twitter';
    $field_linkedin = 'linkedin';
    ?>





  <div class="abouthead" style="background: url('<?php

      $copertina = get_field_object($field_copertina,"user_$user_id");
      echo $copertina['value']['sizes'][$copertina_thumb];

  ?>') no-repeat top center; background-size:cover; ">

      <div class="imgabout">
          <img src="<?php

              $profilo = get_field_object($field_profilo,"user_$user_id");
              echo $profilo['value']['sizes'][$profilo_thumb]; ?>" alt="profilo">
      </div>
      <h2><?php the_author_meta( $field_nome ); echo ' '; the_author_meta( $field_cognome ); ?> </h2>
      <h4><?php $ruolo = get_field_object($field_ruolo, "user_$user_id"); echo implode(", ",$ruolo['value']); ?></h4>
  </div>
  <div class="aboutcenter">
      <div class="motto">
        <h2><?php the_field($field_motto,"user_$user_id"); ?></h2>
      </div>
        <div class="abouttext">
              <p>
                  <?php the_author_meta($field_bio);?>
              </p>
              <div class="about-tags">
                  <p><?php the_field($field_tags,"user_$user_id"); ?></p>
              </div>
        </div>

          <div class="aboutul">

              <ul>

                  <?php
                      $competenze = get_field_object($field_competenze, "user_$user_id");

                      echo '<span class="profilo-label">' .$competenze['label']. '</span>';

                      foreach ($competenze['value'] as $competenza => $value) {
                          echo '<li>' .$value. '</li>';
                      }

                  ?>
              </ul>


              <?php
                // mostra determinate informazioni a seconda se sono un designer e/o un programmatore
                foreach ($ruolo['value'] as $value) {
                   if(preg_match("/\bdesigner\b/i",$value)) { $tools = get_field_object($field_tools, "user_$user_id"); ?>
                   <span><?php $tools['label']; ?></span>
                   <ul>
                       <?php
                       echo '<span class="profilo-label">' .$tools['label']. '</span>';
                       foreach ($tools['value'] as $tool => $value) {
                           echo '<li>' .$value. '</li>';
                       }
                        ?>

                   </ul>
               <?php
                   }
                   elseif(preg_match("/\bprogrammatore\b/i",$value)) { $linguaggi_framework = get_field_object($field_linguaggi_framework, "user_$user_id");?>
                   <ul>
                       <?php
                       echo '<span class="profilo-label">' .$linguaggi_framework['label']. '</span>';
                       foreach ($linguaggi_framework['value'] as $linguaggio_framework => $value) {
                           echo '<li>' .$value. '</li>';
                       }
                        ?>

                   </ul>
               <?php
                   }
               }?>

                <div class="aboutsocial">
                    <ul>
                        <?php if(get_field($field_curriculum_vitae, "user_$user_id")) : ?>
                            <li><a class="about-cv" target="_blank" href="<?php the_field($field_curriculum_vitae, "user_$user_id"); ?>">CV</a></li>
                        <?php endif; ?>
                        <?php if(get_the_author_meta($field_email)) : ?>
                            <li><a class="about-email" href="mailto:<?php the_author_meta($field_email); ?>">E-mail</a></li>
                        <?php endif; ?>
                        <?php if(get_field($field_facebook, "user_$user_id")) :?>
                            <li><a class="about-facebook" target="_blank" href="<?php the_field($field_facebook, "user_$user_id");?>">Facebook</a></li>
                        <?php endif; ?>
                        <?php if(get_field($field_twitter, "user_$user_id")) :?>
                            <li><a class="about-twitter" target="_blank" href="<?php the_field($field_twitter, "user_$user_id");?>">Twitter</a></li>
                        <?php endif; ?>
                        <?php if(get_field($field_linkedin, "user_$user_id")) : ?>
                            <li><a class="about-linkedin" target="_blank" href="<?php the_field($field_linkedin, "user_$user_id"); ?>">Linkedin</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
          </div>
  </div>

  <?php endif; ?>
<?php get_footer(); ?>
