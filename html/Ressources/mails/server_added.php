<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmez Votre Adresse Mail sur Minebump.com</title>
</head>
<style type="text/css">@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');</style>
<body style="background-color:  white; font-family: 'Poppins', sans-serif;">
  <div class="content" align="center" style="
      width: 100%;
      max-width: 600px;
      margin:  0 auto 0 auto;
      overflow: hidden;">
    <div class="logo" style="
      max-width: 100%;">
      <img src="https://minebump.com/Ressources/minebump_logo.png" style="background-color: #1f1b32; padding: 30px 5%; width: 90%;">
    </div>
    
    <div class="welcome" style="
      max-width: 100%;
      font-size:  2em;">
      <h2 style="font-weight: normal; line-height: 1em;"><?=$user_data['username']?>,</h2>
      <h2 style="font-weight: normal; line-height: 1em;">Votre serveur est sur MineBump!</h2>
    </div>

    <hr style="
      width: 50%;">
    <div class="check_now" style="
      max-width: 100%;">
      <p style="
      margin: 20px 15% 50px 15%;
      font-size:  1.1em;
      ">Nous vous confirmons l'ajout de votre serveur <?=$serverName?> sur notre liste.</p>
      <a href="https://minebump.com/servers/view/<?=urlencode($serverId)?>" style="
      font-size:  0.9em;
      padding: 10px 15px;
      background-color: #e64c61;
      border: 1px solid #a73c4a;
      color: white;
      text-decoration: none;
      ">Votre fiche serveur</a>
    </div>
    <div class="then" style="
      max-width: 100%;
      padding: 50px 0px 50px 0px;
      margin-top: 50px;
      background-color: #1f1b32;
      color: white;">
      <h3 style="font-size: 1.2em">Et ensuite ?</h3>
      <ul style="
      list-style-type: none;
      margin: 5px 10px;
      padding: 0;
      font-size: 1.1em;
      line-height: 2.4em;">
        <li>1. Liez votre Discord et votre Serveur via API.</li>
        <li>2. Promouvez votre serveur Minecraft et Discord.</li>
        <li>3. Observez votre nombre de joueurs grimper.</li>
        <li>4. Recompensez votre joueurs qui votent pour vous.</li>
        <li>5. Besoin d'aide? Contactez-nous via Discord!</li>
      </ul>
      <br>
      <a href="https://minebump.com/support/discord" style="
      font-size:  0.9em;
      padding: 10px 15px;
      margin-top: 20px;
      background-color: #e64c61;
      border: 1px solid #a73c4a;
      color: white;
      text-decoration: none;
      ">Nous contacter</a>
    </div>
  </div>

</body>
</html>