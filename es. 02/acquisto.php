<?php
  session_start();
  $_SESSION["acquisti"][$_REQUEST["prod"]]=$_REQUEST["qty"];
?>
<html>
<head>
<title>Articolo inserito</title>
</head>
<body>
<?php
  echo "Inserito: ".$_REQUEST["prod"]." ".$_REQUEST["qty"]." pezzi<br />";
?>
<a href="form1.html">Nuovo inserimento</a><br />
<a href="listaacquisti.php">Lista acquisti</a>
</body>
</html>
