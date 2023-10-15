<?php
  // Attiva la gestione della sessione
  session_start();
?>

<HTML>
<BODY>
<?php
  // calcola la classifica scorrendo i risultati
  // delle partite memorizzati nella variabile
  // di sessione "risultati". La variabile è
  // un array associativo multidimensionale
  // a 3 indici (sqaudra di casa, squadra ospite,
  // indice dell'elemento che memorizza i gol
  // - 0 -> squadra di casa - 1 -> squadra ospite
  
  // scorre le squadre di casa
  foreach($_SESSION["risultati"] as $sq1 => $partite)
   // scorre le partite in casa
   foreach($partite as $sq2 => $gol) {
   	 // assegna i punteggi in base al risultato
     if($gol[0]>$gol[1]) {
        $p1 = 3;
        $p2 = 0;
     } else if($gol[0]==$gol[1]) {
        $p1 = 1;
        $p2 = 1;
     } else {
        $p1=0;
        $p2=3;
     }
	// aggiorna la classifica delle due squadre 
    $punti[$sq1]+=$p1;
    $punti[$sq2]+=$p2;
   }
?>
<!--
  Classifica calcolata in base ai risultati memorizzati
-->
<H2>Classifica</H2>
<TABLE>
<?php
  // ordina il vettore in base ai punteggi
  // $punti è un array associativo in cui la
  // key è la stringa che rappresenta il nome
  // della squadra e il valore è un intero
  // che memorizza i punti
  arsort($punti);
  
  // stampa la classifica usando le righe di una
  // tabella per allineare gli elementi
  foreach($punti as $sq => $pt)
    echo "<TR><TD>$sq</TD><TD>$pt</TD></TR>\n";
?>
</TABLE><BR />
<!--
  collegamento alla pagina di inserimento
-->
<A href="form.php">Nuovo inserimento</A>
</BODY>
</HTML>   
