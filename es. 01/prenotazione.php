<?php
  session_start();
  $_SESSION["prenotazioni"][$_REQUEST["evento"]] += $_REQUEST["num"]; 
?>
<html>
<head>
<title>Evento prenotato</title>
</head>
<body>
<?php
  echo "Inserito: ".$_REQUEST["evento"]." posti ".$_REQUEST["num"];
  echo " totale = ".$_SESSION["prenotazioni"][$_REQUEST["evento"]]."<br />";
?>
<a href="form1.html">Nuova prenotazione</a><br />
<a href="listaprenotazioni.php">Lista prenotazioni</a>
</body>
</html>
