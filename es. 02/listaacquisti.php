<?php
  session_start();
?>
<html>
<head>
<title>Lista acquisti</title>
</head>
<body>
<h3>Acquisti nel carrello</h3>
<?php
  foreach($_SESSION["acquisti"] as $prod => $qty) {
    echo $prod." ".$qty." pezzi<br />";
    $totpezzi += $qty;
    if($qty>$maxpezzi) {
       $maxpezzi = $qty;
       $prodmax = $prod;
    }
  }
  echo "<br /><b>Totale pezzi:</b> ".$totpezzi."<br />";
  echo "<b>Max pezzi:</b> ".$prodmax." ".$maxpezzi." pezzi<br />";
?>
</body>
</html>

