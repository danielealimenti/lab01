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

<!-- Second Section -->
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
                <!-- <img src=
                /> -->
                <?php
                    $fields = get_field('skill_image');
                    echo $fields;
                ?>
                <div class="wrap_text--tag">

                    <h4><?php echo $termine->name; // questa chiamata stampa il name di ogni termine ?></h4>
                    <p><?php echo $termine->description; ?></p>
                </div>
            </div>
        <?php
        }

        //Restore original Post Data
        wp_reset_postdata();
        ?>
        <!-- <div class="container--tag">
            <img src="./ritagli/ico_webdevelopment.png" />
            <div class="wrap_text--tag">
                <h4>web development</h4>
                <p>
                    Codici HTML5, CSS 3, XXXXXX, Codici HTML5, CSS3, XXXXXX
                </p>
            </div>
            <a href="#" class="btn_more">scopri di più ></a>
        </div>
        <div class="container--tag">
            <img src="./ritagli/ico_webdevelopment.png" />
            <div class="wrap_text--tag">
                <h4>web development</h4>
                <p>
                    Codici HTML5, CSS 3, XXXXXX, Codici HTML5, CSS3, XXXXXX
                </p>
            </div>
            <a href="#" class="btn_more">scopri di più ></a>
        </div>
        <div class="container--tag">
            <img src="./ritagli/ico_webdevelopment.png" />
            <div class="wrap_text--tag">
                <h4>web development</h4>
                <p>
                    Codici HTML5, CSS 3, XXXXXX, Codici HTML5, CSS3, XXXXXX
                </p>
            </div>
            <a href="#" class="btn_more">scopri di più ></a>
        </div>
        <div class="container--tag">
            <img src="./ritagli/ico_webdevelopment.png" />
            <div class="wrap_text--tag">
                <h4>web development</h4>
                <p>
                    Codici HTML5, CSS 3, XXXXXX, Codici HTML5, CSS3, XXXXXX
                </p>
            </div>
            <a href="#" class="btn_more">scopri di più ></a>
        </div>
        <div class="container--tag">
            <img src="./ritagli/ico_webdevelopment.png" />
            <div class="wrap_text--tag">
                <h4>web development</h4>
                <p>
                    Codici HTML5, CSS 3, XXXXXX, Codici HTML5, CSS3, XXXXXX
                </p>
            </div>
            <a href="#" class="btn_more">scopri di più ></a>
        </div> -->
    </div>
    <div class="btn_all">
        <a href="#" class="btn">About us</a>
    </div>
</div><!-- END Second Section -->

<!-- Third Section -->
<div class="wrapper_page">
    <h2 class="title">diario</h2>
        <div class="wrap_box">
        <div class="box box--activity first">
            <p class="titolo">Titolo attività</p>
            <img src="ritagli/activity_02.jpg" alt="">
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#" class="btn--more btn_more--black">leggi di più ></a>
        </div>
        <div class="box box--activity">
            <p class="titolo">Titolo attività</p>
            <img src="ritagli/activity_02.jpg" alt="">
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#" class="btn--more btn_more--black">leggi di più ></a>
        </div>

        <div class="box box--activity last">
            <p class="titolo">Titolo attività</p>
            <img src="ritagli/activity_02.jpg" alt="">
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <a href="#" class="btn--more btn_more--black">leggi di più ></a>
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
        <div class="box box--users first">
            <div class="bio">
                <p class="nome">Brunella</p>
                <p class="cognome">Ricci</p>
                <p class="cosa"> web designer</p>
                <p class="tag">#tag #tag #tag #tag #tag</p>
                <a href="#">scopri ></a>
            </div>
            <img src="./ritagli/team_member01.jpg" alt="">
        </div>
        <div class="box box--users">
            <div class="bio">
                <p class="nome">Brunella</p>
                <p class="cognome">Ricci</p>
                <p class="cosa"> web designer</p>
                <p class="tag">#tag #tag #tag #tag #tag</p>
                <a href="#">scopri ></a>
            </div>
            <img src="./ritagli/team_member01.jpg" alt="">
        </div>
        <div class="box box--users last">
            <div class="bio">
                <p class="nome">Brunella</p>
                <p class="cognome">Ricci</p>
                <p class="cosa"> web designer</p>
                <p class="tag">#tag #tag #tag #tag #tag</p>
                <a href="#">scopri ></a>
            </div>
            <img src="./ritagli/team_member01.jpg" alt="">
        </div>
    </div><!--END Wrap Box -->
    <div class="btn_all">
        <a href="#" class="btn">visualizza team</a>
    </div>
</div><!-- END Fourth Section -->

<footer>
    <p class="float--sx">lab01 by <a href="#" class="link_med">med innovations</p>
    <p class="float--dx">Med Computer s.r.l., via CLuentina, 35/B 62100 Macerata (Loc. Piediripa) Italia</p>
</footer>
