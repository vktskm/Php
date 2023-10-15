<?php
 // attiva la sessione e definisce
 // il tipo MIME del contenuto generato
 header("Content-Type: text/html");
 session_start();
?>
<HTML>
<BODY>
<?php
  // verifica se sono stati riempiti i campi del form
  // relativi ai gol fatti
  if($_REQUEST["gol1"]=="" || $_REQUEST["gol2"]=="") {
    // manca almeno uno dei dati
    echo "Errore: form incompleto<BR />";
  } else {
   // si memorizza il risultato nella variabile di
   // sessione "risultati" che è un array associativo
   // multidimensionale i cui indici sono
   // - la squadra di casa
   // - la squadra ospite
   // - un indice 0 o 1 che permette di memorizzare i
   //   gol della squadra di casa (0) e ospite (1)
   $sq1 = $_REQUEST["sq1"];
   $sq2 = $_REQUEST["sq2"];
   $g1 = $_REQUEST["gol1"];
   $g2 = $_REQUEST["gol2"];
   $_SESSION["risultati"][$sq1][$sq2][0] = $g1;
   $_SESSION["risultati"][$sq1][$sq2][1] = $g2;
?>

<H2>Risultati Inseriti</H2>
<!--
  Lista dei risultati inseriti
-->
<TABLE>
<?php
   // stampa gli elmenti della variabile "risultati"
   // in una tabella (un risultato per riga)
   
   // scorre le squadre di casa (primo indice)
   foreach($_SESSION["risultati"] as $sq1 => $partite)
     // scorre le squadre ospiti (secondo indice)
     foreach($partite as $sq2 => $gol)
       echo "<TR><TD>$sq1</TD><TD>$sq2</TD><TD>$gol[0]</TD><TD>$gol[1]</TD></TR>\n";
}
?>
</TABLE><BR /><BR />
 <!--
    collegamenti alla pagina di inserimento e calcolo classifica
 -->
 <A href="form.php">Nuovo Inserimento</A><BR />
 <A href="classifica.php">Classifica</A>
</BODY>
</HTML>
