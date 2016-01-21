<?php

  // lettura file esterno
  $listaProdotti = file_get_contents('data/prodotti.json');

  // conversione in array
   $Prodotti=json_decode($listaProdotti, true);




  foreach($Prodotti as $prodotto) {

    print_r($prodotto) ;
  }

?>
