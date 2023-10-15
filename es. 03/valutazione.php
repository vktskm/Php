<?php
  session_start();
  if($_SESSION["valutazioni"][$_REQUEST["film"]]<$_REQUEST["voto"])
    $_SESSION["valutazioni"][$_REQUEST["film"]] = $_REQUEST["voto"]; 
?>
<html>
<head>
<title>Valutazione inserita</title>
</head>
<body>
<?php
  echo "Inserita: ".$_REQUEST["film"]." voto ".$_REQUEST["voto"]."<br />";
?>
<a href="form1.html">Nuova valutazione</a><br />
<a href="listavalutazioni.php">Lista valutazioni</a>
</body>
</html>
