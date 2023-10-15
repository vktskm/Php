<?php
  session_start();

  // estrae la lista delle parole della query
  $keywords = explode(" ",$_REQUEST["query"]);
  
  // calcola la correlazione fra la query e i
  // documenti usando i pesi TF-IDF
  foreach($keywords as $keyword) {
    // la keyword della query non è nel dizionario
	if(empty($_SESSION["dizionario"][$keyword]))
	  continue;
	// calcola l'IDF della query 
    $idf = log($_SESSION["numdocs"]/$_SESSION["docfreq"][$keyword]);

    // aggiorna lo score dei documenti che contengono
	// la keyword
  	foreach($_SESSION["indice"][$keyword] as $post) {
	  $docid = $post[0];
      $wfreq = $post[1];
      $wcount = $_SESSION["documenti"][(int)$docid][2];
      $results["$docid"] += $wfreq/$wcount*$idf;
	}
  }
?>

<html>
<body>
<h1> Risultati della ricerca</h1>
<?php
  // stampa la lista dei risultati
  // i documenti sono visualizzabili clickando il link
  // che corrisponde ad una richiesta di tipo GET
  // il link apre una nuova pagina (target="_blank")
  
  arsort($results);
  foreach($results as $docid => $score) {
  	echo "<A href=\"showdoc.php?id=$docid\" target=\"_blank\">".$_SESSION["documenti"][(int)$docid][0]."</A> ($score)<br />\n";
  }
?>

<br />
<A href="inputtext.html">Inserisci un altro testo</A><br />
<A href="search.html>Effettua una ricerca</A>
</body>
</html>
