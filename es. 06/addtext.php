<?php
  session_start();

  // aggiorna il contatore di documenti
  $_SESSION["numdocs"]++;

  // caratteri separatori
  $sep=" .,\n\t()[]{}/&\"\\!;:\'";
  
  // definisce l'id del documento
  $docid = count($_SESSION["documenti"]);

  // scompone il documento in parole
  $word = strtok($_REQUEST["text"],$sep);
  while($word) {
  	$wordcount++;
    $word = strtolower($word);
    // aggiorna il conteggio totale per la parola
    $_SESSION["dizionario"][$word]++;
	// aggiorna il conteggio per il documento
	$docwords[$word]++;
	// cerca la parola successiva
    $word = strtok($sep);
  }
  
  // aggiorna il la document frequency
  // per le parole del documento e indicizza
  // in documento
  foreach($docwords as $word => $freq) {
    $_SESSION["docfreq"][$word]++;
	$_SESSION["indice"][$word][] = array($docid,$freq);
  }
  
  // memorizza il documento
  $_SESSION["documenti"][$docid] = array($_REQUEST["titolo"],$_REQUEST["text"],$wordcount);

?>
<html>
<body>
<?php
  echo "<H2>Documento numero $docid indicizzato</H2>\n";
  echo "Titolo: <em>".$_SESSION["documenti"][$docid][0]."</em><br />\n";
  echo "$wordcount parole totali<br />\n";
  echo count($docwords)." parole distinte<br />\n";
  arsort($docwords);
  foreach($docwords as $word => $freq) {
    echo "La parola più frequente è \"$word\" ($freq)<br \>\n";
	break;
  }
?>
<br />
<A href="inputtext.html">Inserisci un altro testo</A><br />
<A href="search.html>Effettua una ricerca</A>
</body>
</html>
  