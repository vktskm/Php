<?php
  session_start();
  
  // estrae le variabili del form
  $giorni = $_REQUEST['giorni'];
  $fasce = $_REQUEST['fasce'];
  $nome = $_REQUEST['nome'];
?>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  </head>	

  <body>
    <?php
      // verifica se il form è stato riempito correttamente
      if(empty($giorni)||empty($fasce)||empty($nome)) {
  	  echo "<h2>Form incompleto</h2>";
      } else {
      	// aggiorna la lista dei nomi (chiavi della tabella nomi)
      	// col nome specificato nel form (se era già presente la
      	// tabella non cambia)
    	$_SESSION['nomi'][$nome] = true;
		// scorre tutte le opzioni selezionate nei due menu
    	foreach($giorni as $giorno)
		  foreach($fasce as $fascia)
		    // aggiunge la disponibilità (se già era presente
		    // la tabella non cambia)
		    $_SESSION['disp'][$giorno][$fascia][$nome] = true;
		echo "<h2>Disponibiltà di $nome inserite</h2>";
      }
   ?>
    
  <a href="form.php">Nuovo inserimento</a><br />
  <a href="process.php">Elabora</a>
  </body>
 </html>  
