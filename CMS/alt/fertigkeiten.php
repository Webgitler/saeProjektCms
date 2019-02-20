<?php
require_once __DIR__ . '/db.php';

$connector = new MysqlConnector('localhost','sae','drogenverwalter', 'penandpapercms');
$characters = $connector->get_characters();
?><!DOCTYPE HTML>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/fertigkeiten.css">

<title>Fertigkeiten</title>
</head>

<body>





    <section class="uk-grid">
      <div class="uk-width-1-3 uk-width-3-4@s profielhead"><img src="img/email.png" alt="" class="brand"/></div>
      <div class="uk-width-1-3 uk-hidden@s profielhead"><div class="">Spielername</div></div>
      <div class="uk-width-1-3 uk-width-1-4@s profielhead"><div class="mobielmenubutton"></div><div class="mobielmenubutton"></div><div class="mobielmenubutton"></div></div>
    </section>



      <!-- modul mobiele anzeige kontakt (css codemarker 000002) -->



<?php //for ($i = 0; $i < count($characters); $i++) { ?>
      <section class="uk-grid headergrid">


          <div class="uk-width-1 uk-width-2-3@s uk-width-1-2@m uk-visible@s ukNorm">
            <div class="namen headfeld"><div class="namen"><?php echo $characters[$i]['name'];?>Spielername</div></div>

              <div class="leben headfeld uk-visible@s">
                <div class="lebensbalken"></div>
                  <div class="insertfeld_balkendescrep"><?php echo $characters[$i]['lebendenergie'];?>Lebendsenergie</div>
                    <div class="insertfeld_balkenvalue">60</div>
                      <div class="insertfeld_balkenfeld">/</div>
                        <div class="insertfeld_balkenvalue">100</div>
                          </div>

                          <div class="leben headfeld uk-visible@s">
                            <div class="enrgiebalken"></div>
                              <div class="insertfeld_balkendescrep">Lebendsenergie</div>
                                <div class="insertfeld_balkenvalue">90</div>
                                  <div class="insertfeld_balkenfeld">/</div>
                                    <div class="insertfeld_balkenvalue">100</div>
                                      </div>

                                      <div class="geld headfeld uk-visible@s">
                                    <div class="insertfeld_balkendescrep">Geld</div>
                                  <div class="insertfeld_balkenvalue">2190</div>
                                </div>

                            <div class="tragekaft headfeld uk-visible@s">
                          <div class="insertfeld_balkendescrep">Tragekraft</div>
                        <div class="insertfeld_balkenvalue">90</div>
                      </div>

                  </div>



            <div class="uk-width-1 uk-width-1-3@s uk-width-1-4@m ukNorm">
              <div class="profielimg"><img src="img/profielimg.png" alt="" class="profielimgposition"/></div>
                <div class="dicefeld">
                  <div class="dicefeldview"><img src="img/wicon.png" alt="" class="dimgposition"/></div>
                    </div>
                      </div>


                        <div class="uk-width-1 uk-width-1-2@s uk-width-1-4@m uk-grid-collapseb uk-visible@m ukNorm">
                      <div class="neme headfeld"><div class="insertfeld_balkendescrep"><a href="#">Fertigkeiten</a></div></div>
                    <div class="leben headfeld"><div class="insertfeld_balkendescrep"><a href="#">Inventar</a></div></div>
                  <div class="energie headfeld"><div class="insertfeld_balkendescrep"><a href="#">Waffen</a></div></div>
                <div class="geld headfeld"><div class="insertfeld_balkendescrep"><a href="#">Profiel</a></div></div>
              <div class="tragekaft headfeld"><div class="insertfeld_balkendescrep"><a href="#">Notiezen</a></div></div>
            </div>

          </section>
<?php //} ?>




<section class="uk-grid ukNorm">
  <div class="uk-width-1-2 downhead ukNorm">
    <div class="leben headfeld uk-hidden@s">
      <div class="lebensbalken cange_position"></div>
        <div class="insertfeld_balkendescrep uk-visible@m ">Lebendsenergie</div>
          <div class="insertfeld_balkenvalue livepos">60</div>
            <div class="insertfeld_balkenfeld">/</div>
              <div class="insertfeld_balkenvalue">100</div>
                </div>
                  </div>

                <div class="uk-width-1-2 downhead ukNorm">
                  <div class="leben headfeld uk-hidden@s">
                    <div class="enrgiebalken"></div>
                      <div class="insertfeld_balkendescrep uk-visible@m ">Lebendsenergie</div>
                        <div class="insertfeld_balkenvalue livepos">90</div>
                          <div class="insertfeld_balkenfeld">/</div>
                            <div class="insertfeld_balkenvalue">100</div>
                              </div>
                                </div>
                                  </section>

                                      <section class="uk-grid ukNorm">
                                    <div class="uk-width-1-2 uk-hidden@m ukNorm">
                                  <div class="mobielmenu">Fertigkeiten 400 / 400</div>
                                </div>

                            <div class="uk-width-1-2 uk-hidden@m ukNorm">
                          <div class="mobielmenu"><div class="mobielmenubuttonnanav"></div><div class="mobielmenubuttonnanav"></div><div class="mobielmenubuttonnanav"></div></div>
                        </div>
                      </section>




                              <section class="uk-grid ukNorm">
                            <div class="uk-width-1-3 uk-hidden@m abstandnav ukNorm">
                          <div class="fertikeitennav"></div>
                        </div>

                    <div class="uk-width-1-3 uk-hidden@m abstandnav ukNorm">
                  <div class="fertikeitennav"></div>
                </div>


            <div class="uk-width-1-3 uk-hidden@m abstandnav ukNorm">
          <div class="fertikeitennav"></div>
        </div>
      </section>


              <section class="uk-grid ukNorm">

                  <div class="uk-width-1 uk-width-1-3@m uk-grid-collapseb handelnmobiel ukNorm">
                    <div class="algemeinwert color_handeln_head">Handeln<div class="algemeinwertint">22</div></div>
                      <div class="blitzpunkte color_handeln_blitzpunkte">2</div>
                        <div class="fertigkeitenname color_handeln_fertigkeit">Extremes Wegtreten</div>
                          <div class="fertigkeitenpukte color_handeln_head">46</div>
                            <div class="fertigkeitenname color_handeln_fertigkeit" id="opennew">Neue Fehrtikeit hinzufuhgen</div>
                              <div class="fertigkeitenpukte color_handeln_head" id="opennwefeldfertigkeit">+</div>
                                </div>


                                  <div class="uk-width-1 uk-width-1-3@m uk-grid-collapseb wissenmobiel line ukNorm">
                                    <div class="algemeinwert color_wissen_head">Wissen<div class="algemeinwertint">22</div></div>
                                      <div class="blitzpunkte color_wissen_blitzpunkte">2</div>
                                        <div class="fertigkeitenname color_wissen_fertigkeit">Extremes Wegtreten</div>
                                      <div class="fertigkeitenpukte color_wissen_head">46</div>
                                    <div class="fertigkeitenname color_wissen_fertigkeit">Neue Fehrtikeit hinzufuhgen</div>
                                  <div class="fertigkeitenpukte color_wissen_head">+</div>
                                </div>

                              <div class="uk-width-1 uk-width-1-3@m uk-grid-collapseb sozialesmobiele line ukNorm">
                            <div class="algemeinwert color_soziales_head">Soziales<div class="algemeinwertint">22</div></div>
                          <div class="blitzpunkte color_soziales_blitzpunkte">2</div>
                        <div class="fertigkeitenname color_soziales_fertigkeit">Extremes Wegtreten</div>
                      <div class="fertigkeitenpukte color_soziales_head">46</div>
                    <div class="fertigkeitenname color_soziales_fertigkeit">Neue Fehrtikeit hinzufuhgen</div>
                  <div class="fertigkeitenpukte color_soziales_head">+</div>
                </div>

            </section>

      <!-- modul desktop menu oben (css codemarker 000003) -->

	<nav class="uk-grid menuportModulrahmen">

                  </nav>








<!-- modul produckte presentieren 100prozent (css codemarker 000006) -->




<div class="downfeld" id="openfeld">
  <div class="downfeldbg" id="close"></div>
    <div class="userlogin"> <p class="overlayheader">Login</p>

  <form id="mein_formular">

    <p class="overlayloginabsatz">
    <input type="email" form="mein_formular" value="Email" class="formlayerlogin"/>
</p>

<p class="overlayloginabsatz">
<input type="email" form="mein_formular" value="Passwort" class="formlayerlogin"/>
</p>

    <button class="loginbutton">Neuer Account erstellen</button>
    <button class="loginbutton">Einlogen</button>
</form></div></div>



<script language="javascript" type="text/javascript" src="js/papcms.js"></script>
</body>
</html>
