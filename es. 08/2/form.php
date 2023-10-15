<?php
  require "pazienti.inc";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Document</title>
</head>
<form action="insert.php" method="GET">
  <label for="paziente">Paziente</label>
  <select name="paziente">
  <?php
    // genera le opzioni del combobox con gli elementi
	// dell'array pazienti definito in pazienti.inc
    foreach($pazienti as $paziente)
	  echo "<option value=\"$paziente\">$paziente</option>\n";
  ?>
  </select>
  <label for="Pmin">Minima</label>
  <input type="text" size="2" name="Pmin"/>
  <label for="Pmax">Massima</label>
  <input type="text" size="2" name="Pmax"/><br />
  <input type="submit" value="Invia" />
</form>
<body>
</body>
</html>
