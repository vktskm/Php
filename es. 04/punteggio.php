<?php
  session_start();
  if($_SESSION["punteggi"][$_REQUEST["game"]]<$_REQUEST["score"])
    $_SESSION["punteggi"][$_REQUEST["game"]] = $_REQUEST["score"]; 
?>
<html>
<head>
<title>Punteggio inserito</title>
</head>
<body>
<?php
  echo "Inserito: ".$_REQUEST["game"]." punti ".$_REQUEST["score"]."<br />";
?>
<a href="form1.html">Nuovo punteggio</a><br />
<a href="listapunteggi.php">Lista punteggi</a>
</body>
</html>
