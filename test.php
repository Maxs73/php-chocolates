<?php
session_start();
include 'libs/db.php';
$codiceProdotto = $_GET['codice'];
var_dump($codiceProdotto);
$Ordini = recuperaOrdineDaCodice($codiceProdotto);
//unset($_SESSION['carrello']);
var_dump($Ordini);
/*  $carrello = $_SESSION['carrello'];
  var_dump(count($carrello));
  foreach ($carrello as $rigacarrello){
    echo $rigacarrello['prodotto']['codice'];
    //var_dump($carrello[$i]['quantita']);
  }


} else {
  $carrello = [];
*/
//}
