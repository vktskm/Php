<?php
  require "defs.php";
  session_start();
?>

<html>
  <head>
  	<!-- stile per la tabella -->
  	<style>
  	    table {border: 2px solid gray; border-collapse: collapse}
  		td {border: 1px solid black;}
  		th {border: 1px solid black;}
  	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>	

  <body style="font-family: arial">
  	<h2>Schema disponibilità</h2>
  	<table >
    <?php
        // stampa la tabella e trova il massimo delle disponibilità
        // per giorno-fascia
        $max = 0;
		// stampa la riga di intestazioni per le colonne
		echo "<tr><th></th>";
		  foreach($fasce as $fascia)
		    echo "<th> $fascia </th>";
		echo "</tr>";
	
	    // stampa la tabella
    	foreach($giorni as $giorno) {
    	  // intestazione di riga (giorno)
    	  echo "<tr><th>$giorno</th>";
		  // scorre la riga
		  foreach($fasce as $fascia) {
		  	// conta il numero di disponibilità per la coppia giorno-fascia
		  	$n = count($_SESSION['disp'][$giorno][$fascia]);
			// aggiorna (eventualmente) il massimo
			if($n>$max)
				$max = $n;
			// stampa la casella
		    echo "<td>$n</td>";
		  }
		  echo "</tr>\n"; 
        }
    ?>
    </table>
    <h2>Fasce con massima disponibilità</h2>
    <?php
        // scorre le coppie giorno-fascia
    	foreach($giorni as $giorno) {
		  foreach($fasce as $fascia)
		    // verifica se per la coppia la disponibilità è quella massima
		  	if( $max == count($_SESSION['disp'][$giorno][$fascia])) {
		  	  // stampa l'opzione
			  echo "$giorno - $fascia Non disponibili: <br />";
			  // stampa la lista dei non disponibili
			  foreach($_SESSION['nomi'] as $nome => $val) 
			  	if(empty($_SESSION['disp'][$giorno][$fascia][$nome]))
			       echo "&nbsp;&nbsp;<em>$nome</em><br />";
			 echo "<br />";
			}
        }

   ?>
  <a href="form.php">Nuovo inserimento</a><br />
  <a href="process.php">Elabora</a>
  </body>
 </html>  
