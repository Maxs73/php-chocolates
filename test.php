<?php
session_start();
unset($_SESSION['carrello']);
print_r($_SESSION['carrello']);
if (isset($_SESSION['carrello'])) {
  $carrello = $_SESSION['carrello'];
  var_dump(count($carrello));
  for ($i=0; $i < count($carrello) ; $i++) {
    var_dump($carrello[$i]['prodotto']['codice']);
    var_dump($carrello[$i]['quantita']);
  }


} else {
  $carrello = [];
}
