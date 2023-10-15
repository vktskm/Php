<?php
  require "stazioni.inc";
  session_start();
  // timestamp attuale
  $now = time();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Untitled Document</title>
</head>

<body>
<?php
  
  // si cicla per orni stazione
  foreach($_SESSION["dati"] as $stazione => $dati) {
    // inizializza le variabile per trovare il
	// massimo di Tmax per la settimana e il giorno.
	// Dato che le temperature possono essere anche
	// negative si usa il valore -300 che non si
	// può presentare (manca comunque il controllo in
	// inserimento per vericare che i valori immessi
	// dall'utente siano effettivamente coerenti con
	// questo vincolo...).
	$maxTmaxS = $maxTmaxG = -300;
	
	// inizializza le variabili per trovare la temperatura
	// minima media giornaliera e settimanale
	$mTminG = $mTminS = 0;
	$nS = $nG = 0;
	
	// determina la zona della stazione e aggiorna
	// il numero di dati usati per la zona corrispondente
	$zona = $zone[$stazione];
	$nZona[$zona] += count($dati);
	
	// scorre i dati disponbili per la stazione
    foreach($dati as $dato) {
	  // accumula i dati per il calcolo delle
	  // medie sulla zona. Sono usati due array
	  // associativi in cui la chiave è il nome
	  // della zona
	  $mZonaMin[$zona] += $dato[0];
	  $mZonaMax[$zona] += $dato[1];
	  
	  // verifica se il dato cade nell'ultima
	  // settimana
	  if(now-$dato[2]<7*24*60*60) {
	    // aggiorna le variabili per il calcolo
		// della media settimanale di Tmin
	    $nS++;
	    $mTminS += $dato[0];
		// calcolo del massimo per Tmax settimanale
		if($dato[1]>$maxTmaxS) $maxTmaxS = $dato[1];
		
		// verifica se il dato cade nell'ultimo giorno
	    if(now-$dato[2]<24*60*60) {
		  // aggorna le variabili per il calcolo della
		  // media giornaliera
	      $nG++;
	      $mTminG += $dato[0];
		  // calcolo del massimo per Tmax giornaliero
		  if($dato[1]>$maxTmaxG) $maxTmaxG = $dato[1];
		}
	  }
	}
	
	// stampa i dati delle statistiche per la stazione
	echo "<H2> Stazione $stazione</H1>\n";
	// dati sulle 24 ore
	if($nG>0) {
	  echo "<h3>24 ore</h3>\n";
	  echo "Temperatura Massima più alta: $maxTmaxG<br />\n";
	  echo "Temperatura Minima Media: ". $mTminG/$nG."<br />\n";
	}
	// dati sulla settimana
	if($nS>0) {
	  echo "<h3>7 giorni</h3>\n";
	  echo "Temperatura Massima più alta: $maxTmaxS<br />\n";
	  echo "Temperatura Minima Media: ". $mTminS/$nS."<br />\n";
	}	  
  }
  // stampa i dati medi per zona
  echo "<H2>Medie per zone</h2>\n";
  foreach($nZona as $zona => $nDati) {
    echo "$zona: minima ".$mZonaMin[$zona]/$nDati." massima ".$mZonaMax[$zona]/$nDati."<br />\n";
  }
?>
</body>
</html>
