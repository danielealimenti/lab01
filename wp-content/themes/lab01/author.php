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
    $user_id = get_the_author_meta( 'ID' );
    ?>




   <div class="topmenu">
       <div class="logo"></div>
       <div class="nav">
           <ul class="container">
               <li>
                   <a href="#">news</a>
               </li>
               <li>
                   <a href="#">attivita</a>
               </li>
               <li>
                   <a href="#">team</a>
               </li>
               <li>
                   <a href="#">about us</a>
               </li>
           </ul>
       </div>
   </div>
  <div class="abouthead">
      <div class="imgabout">
          <img src="<?php

          $image = get_field_object('immagine_profilo',"user_$user_id");
          //echo print_r($image);
          $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)

          echo $image['value']; ?>" alt="profilo">
      </div>
      <h2><?php the_author_meta( 'first_name' ); echo ' '; the_author_meta( 'last_name' ); ?> </h2>
      <h4><?php $ruolo = get_field_object('ruolo', "user_$user_id"); echo implode(", ",$ruolo['value']); ?></h4>
  </div>
  <div class="aboutcenter">
      <div class="motto">
        <h2><?php the_field('motto',"user_$user_id"); ?></h2>
      </div>
        <div class="abouttext">
              <p>
                  <?php the_author_meta( 'description' );?>
              </p>
              <div class="about-tags">
                  <p><?php the_field('tags',"user_$user_id"); ?></p>
              </div>
        </div>

          <div class="aboutul">

              <ul>
                  <!-- <li> <img src="" alt="" />Text</li>
                  <li> <img src="" alt="" />Text</li>
                  <li> <img src="" alt="" />Text</li>
                  <li> <img src="" alt="" />Text</li>
                  <li> <img src="" alt="" />Text</li>
                  <li> <img src="" alt="" />Text</li> -->

                  <?php
                      $competenze = get_field_object('competenze', "user_$user_id");
                      echo '<span class="profilo-label">' .$competenze['label']. '</span>';

                      foreach ($competenze['value'] as $competenza => $value) {
                          echo '<li>' .$value. '</li>';
                      }
                      //echo '<span class="label">' .$competenze['label']. ':</span> ' . implode(", ",$competenze['value']);

                  ?>
              </ul>


              <?php foreach ($ruolo['value'] as $value) {
                   if(preg_match("/\bdesigner\b/i",$value)) { $tools = get_field_object('tools', "user_$user_id"); ?>
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
                   elseif(preg_match("/\bprogrammatore\b/i",$value)) { $linguaggi_framework = get_field_object('linguaggi-framework', "user_$user_id");?>
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
                        <?php if(get_field('curriculum_vitae', "user_$user_id")) : ?>
                            <li><a class="about-cv" target="_blank" href="<?php the_field('curriculum_vitae', "user_$user_id"); ?>">CV</a></li>
                        <?php endif; ?>
                        <?php if(get_the_author_meta( 'email' )) : ?>
                            <li><a class="about-email" href="mailto:<?php the_author_meta( 'email' ); ?>">E-mail</a></li>
                        <?php endif; ?>
                        <?php if(get_field('facebook', "user_$user_id")) :?>
                            <li><a class="about-facebook" target="_blank" href="<?php the_field('facebook', "user_$user_id");?>">Twitter</a></li>
                        <?php endif; ?>
                        <?php if(get_field('twitter', "user_$user_id")) :?>
                            <li><a class="about-twitter" target="_blank" href="<?php the_field('twitter', "user_$user_id");?>">Twitter</a></li>
                        <?php endif; ?>
                        <?php if(get_field('linkedin', "user_$user_id")) : ?>
                            <li><a class="about-linkedin" target="_blank" href="<?php the_field('linkedin', "user_$user_id"); ?>">Linkedin</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
          </div>
  </div>

  <?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
