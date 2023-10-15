<?php
  session_start();
  // definisce le variabili per la memorizzazione
  // della lettura
  $Tmin = $_REQUEST["Tmin"];
  $Tmax = $_REQUEST["Tmax"];
  $stazione = $_REQUEST["stazione"];
  $timestamp = time();
  
  // verifica se il form era completo
  if($Tmin=="" || $Tmax=="")
  	die("Form incompleto!");

  // memorizza la lettura nella sessione utilizzando
  // la variabile di sessione "dati". I dati sono
  // organizzati in un array associativo che associa ad
  // ogni stazione un array di letture (la nuova lettura
  // è aggiunta in coda alle precedenti), ciascuna delle quali
  // è un vettore di 3 elementi
  $_SESSION["dati"][$stazione][] = array($Tmin,$Tmax,$timestamp); 
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Document</title>
</head>
<?php
  // stampa il dato inserito verificando l'avvenuto
  // inserimento nell'array di sessione
  $iddato = count($_SESSION["dati"][$stazione])-1;
  $dato = $_SESSION["dati"][$stazione][$iddato];
  // definisce il fuso orario per la stampa della data
  date_default_timezone_set("Europe/Rome");
?>

<H2>Stazione <?php echo $stazione ?></H2>
Data: <?php echo date(DATE_RFC822,$dato[2]);?><br />
Minima: <?php echo $dato[0];?><br />
Massima: <?php echo $dato[1];?><br /><br />


Totale dati inseriti: <?php echo $iddato+1; ?><br />

<A href="form.php">Nuovo inserimento</A><BR />
<A href="statistiche.php">Calcola Statistiche</A><BR />
<body>
</body>
</html>
