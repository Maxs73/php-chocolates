<?php
include 'libs/libreria.php';
$ArrayProdotti=inizializzaListaProdotti();
$Prodotto=estraiProdottoDaLista($ArrayProdotti,'Sicant');

  foreach($Prodotto as $Chiave =>$Elemento) {
    echo $Chiave  . ": " .  $Elemento . "<br>";
    //print_r(array_key($elemento));
  }

//echo array_keys($Prodotto) . "\n";
//print_r($Prodotto) . "\n";
//print_r($ArrayProdotti) . "\n";
?>
