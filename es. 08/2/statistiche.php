<?php
  require "pazienti.inc";
  session_start();
  // timestamp attuale
  $now = time();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Statistiche pazienti</title>
</head>

<body>
<?php
  
  // si cicla per ogni paziente
  foreach($_SESSION["dati"] as $paziente => $dati) {
    // inizializza le variabile per trovare il
	// massimo di Pmax per le 12 e 24 ore.
	// Dato che le pressioni sono sicuramente positive
	// (manca comunque il controllo in inserimento per
	// vericare che i valori immessi dall'utente siano
	// effettivamente coerenti con questo vincolo...), le
	// variabili sono inizializzate a 0.
	$maxPmax12 = $maxPmax24 = 0;
	
	// inizializza le variabili per trovare la differenza
	// media fra la pressione massima e minima nelle 12
	// e 24 ore
	$mPdiff12 = $mPdiff24 = 0;
	$n12 = $n24 = 0;
	
	// determina la categoria del paziente e aggiorna
	// il numero di dati usati per la categoria corrispondente
	$categoria = $categorie[$paziente];
	$nCategoria[$categoria] += count($dati);
	
	// scorre i dati disponbili per il paziente
    foreach($dati as $dato) {
	  // accumula i dati per il calcolo delle
	  // medie sulla categoria. Sono usati due array
	  // associativi in cui la chiave è il nome
	  // della categoria
	  $mCategoriaMin[$categoria] += $dato[0];
	  $mCategoriaMax[$categoria] += $dato[1];
	  
	  // verifica se il dato cade nelle ultime
	  // 24 ore
	  if(now-$dato[2]<24*60*60) {
	    // aggiorna le variabili per il calcolo
		// della media di Pmax-Pmin nelle 24 ore
	    $n24++;
	    $mPdiff24 += $dato[1]-$dato[0];
		// calcolo del massimo per Pmax nelle 24 ore
		if($dato[1]>$maxPmax24) $maxPmax24 = $dato[1];
		
		// verifica se il dato cade nelle ultime 12 ore
	    if(now-$dato[2]<12*60*60) {
		  // aggorna le variabili per il calcolo della
		  // media delle 12 ore
	      $n12++;
	      $mPdiff12 += $dato[1]-$dato[0];
		  // calcolo del massimo per Pmax nelle 12 ore
		  if($dato[1]>$maxPmax12) $maxPmax12 = $dato[1];
		}
	  }
	}
	
	// stampa i dati delle statistiche per il paziente
	echo "<H2> Paziente $paziente</H1>\n";
	// dati sulle 24 ore
	if($n24>0) {
	  echo "<h3>24 ore</h3>\n";
	  echo "Pressione Massima più alta: $maxPmax24<br />\n";
	  echo "Differenza di Pressione Media: ". $mPdiff24/$n24."<br />\n";
	}
	// dati sulle 12 ore
	if($n12>0) {
	  echo "<h3>12 ore</h3>\n";
	  echo "Pressione Massima più alta: $maxPmax12<br />\n";
	  echo "Differenza di Pressione Media: ". $mPdiff12/$n12."<br />\n";
	}	  
  }
  // stampa i dati medi per categoria
  echo "<H2>Medie per categoria</h2>\n";
  foreach($nCategoria as $categoria => $nDati) {
    echo "$categoria: minima ".$mCategoriaMin[$categoria]/$nDati." massima ".$mCategoriaMax[$categoria]/$nDati."<br />\n";
  }
?>
</body>
</html>
