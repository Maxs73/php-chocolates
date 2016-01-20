<?php

//Path o URL del file
$string=file_get_contents('data/prodotti.json', 'r');

//Decodifichiamo il json e lo associamo ad un array (True)
$json_o=json_decode($string,true);

//Per ogni elemento possiamo effettuare una operazione
//In questo caso la mostro a video
foreach($json_o as $prodotto)
{
  echo 'Nome: '.$prodotto['codice'];
}

?>
