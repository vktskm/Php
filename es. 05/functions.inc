<?php
  // lista delle squadre - è memorizzata in un array
  $lista_squadre = array(
     "Bologna","Inter","Fiorentina","Roma","Juventus",
      "Lazio","Napoli","Catania","Palermo","Bari",
      "Cagliari","Lecce","Parma","Udinese","Genoa",
      "Sampdoria","Milan");

  // funzione per generare un combobox (select)
  // - $varname è il nome della variabile associata
  //   al combobox
  // - $squadre è l'array che contiene la lista delle
  //   squadre (occorre passarlo come parametro perché
  //   nel PHP le variabili definite al di fuori del
  //   corpo della funzione non sono visibili)
   
  function generate_combobox($varname,$squadre) {
    // ordina il vettore delle squadre
    sort($squadre);
	// genera il combobox
    echo "<SELECT name=\"$varname\">\n";
	
	// genera le opzioni del combobox
	// il valore associato all'opzione è il nome 
	// della squadra
    foreach($squadre as $nome)
      echo "<OPTION value=\"$nome\">$nome</OPTION>\n";
	  
    echo "</SELECT>\n";
  }
?>

