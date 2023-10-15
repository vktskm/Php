<HTML>
<HEAD>
<TITLE>Inserimento risultati</TITLE>
</HEAD>
<BODY>
<!--
  Form per inserire i risultati di partite di calcio
 -->
 
<?php
  // include le funzioni di generazione del
  // menu a tendina per la scelta delle squadre
  require "functions.inc";
  ?>
  
<FORM action="insert.php" method="POST">
  Squadra Casa&nbsp;&nbsp;
  <?php 
    // genera il combobox per la scelta della
	// squadra di casa
     generate_combobox("sq1",$lista_squadre)
  ?>
  <!-- campo per l'inserimento dei gol --> 
  <INPUT type="text" size="2" name="gol1"/><BR />
  
  Squadra Ospite
  <?php
    // genera il combobox per la scelta della
	// squadra di ospite
     generate_combobox("sq2",$lista_squadre)
  ?>
  <!-- campo per l'inserimento dei gol --> 
  <INPUT type="text" size="2" name="gol2"/><BR />
  <INPUT type="submit" value="Inserisci"/>
</FORM><BR />
</BODY>
</HTML>
