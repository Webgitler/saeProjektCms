<!DOCTYPE HTML>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/profiel.css">
<title>Fertigkeiten</title>
</head>

<body>





    <div class="uk-grid">
      <div class="uk-width-1-2 profielhead"><img src="img/email.png" alt="" class="brand"/></div>
      <div class="uk-width-1-2 profielhead"><div class="menu">Menu</div></div>
        </div>



      <!-- modul mobiele anzeige kontakt (css codemarker 000002) -->




      <div class="uk-grid headergrid">


          <div class="uk-width-1 uk-width-1-2@s uk-width-1-2@m ukNorm">
            <div class="name headfeld">Spielername</div>


<?php for ($i = 0; $i < count($characters); $i++) { ?>

              <div class="leben headfeld">
                <div class="lebensbalken"></div>
                  <div class="insertfeld_balkendescrep"><?php echo $characters[$i]['name'];?></div>
                    <div class="insertfeld_balkenvalue" id="<?php echo $characters[$i]['id']; ?>"><?php echo $characters[$i]['wert'];?></div>
                      <div class="insertfeld_balkenfeld">/</div>
                        <div class="insertfeld_balkenvalue">100</div>
                          </div>
<?php } ?>
                          <div class="leben headfeld">
                            <div class="enrgiebalken"></div>
                              <div class="insertfeld_balkendescrep">Lebendsenergie</div>
                                <div class="insertfeld_balkenvalue">90</div>
                                  <div class="insertfeld_balkenfeld">/</div>
                                    <div class="insertfeld_balkenvalue">100</div>
                                      </div>

                                      <div class="geld headfeld">
                                    <div class="insertfeld_balkendescrep">Wehrungseinheit</div>
                                  <div class="insertfeld_balkenvalue">90</div>
                                </div>

                            <div class="tragekaft headfeld">
                          <div class="insertfeld_balkendescrep">Wehrungseinheit</div>
                        <div class="insertfeld_balkenvalue">90</div>
                      </div>

                  </div>



            <div class="uk-width-1 uk-width-1-2@s uk-width-1-4@m ukNorm"><div class="profielimg"></div></div>
              <div class="uk-width-1 uk-width-1-2@s uk-width-1-4@m ukNorm"><div class="neme headfeld"></div><div class="leben headfeld"></div><div class="energie headfeld"></div><div class="geld headfeld"></div><div class="tragekaft headfeld"></div></div>

                    </div>




      <!-- modul desktop menu oben (css codemarker 000003) -->

	<nav class="uk-grid menuportModulrahmen">

                  </nav>








<!-- modul produckte presentieren 100prozent (css codemarker 000006) -->



<!--
<div class="downfeld">
  <div class="downfeldbg"></div>
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
</form></div></div>-->
</body>
</html>
