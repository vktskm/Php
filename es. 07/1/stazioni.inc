<?php
  // elenco delle stazioni metereologiche
  $stazioni = array("Trento", "Milano", "Torino", "Firenze", "Bologna", "Roma", "Napoli", "Bari", "Messina");
  sort($stazioni);
  
  // associazione fra le stazioni e la zona
  $zone = array("Trento"=>"Nord", "Milano" =>"Nord", "Torino" =>"Nord", "Firenze" =>"Centro", "Bologna" =>"Centro", "Roma" =>"Centro", "Napoli"=>"Sud", "Bari" =>"Sud", "Messina" =>"Sud");
?>