<?php
  require "stazioni.inc";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Document</title>
</head>
<form action="insert.php" method="GET">
  <label for="stazione">Stazione</label>
  <select name="stazione">
  <?php
    // genera le opzioni del combobox con gli elementi
	// dell'array stazioni definito in stazioni.inc
    foreach($stazioni as $stazione)
	  echo "<option value=\"$stazione\">$stazione</option>\n";
  ?>
  </select>
  <label for="Tmin">Minima</label>
  <input type="text" size="2" name="Tmin"/>
  <label for="Tmax">Massima</label>
  <input type="text" size="2" name="Tmax"/><br />
  <input type="submit" value="Invia" />
</form>
<body>
</body>
</html>
