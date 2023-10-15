<?php
  session_start();
  // seleziona il documento il cui id è passato come
  // parametro GET della richiesta
  $doc = $_SESSION["documenti"][(int)$_REQUEST["id"]];
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title><?php echo $doc[0]; ?></title>
</head>

<body>
<?php
  // stampa titolo e contenuto del docuumento
  echo "<b>$doc[0]</b><br />";
  echo "<em>$doc[1]</em><br />";
?>
</body>
</html>

