<?php

function inizializzaListaProdotti() {
  // lettura file esterno
  <script language="Javascript">;
  alert('Accesso negato!!!');
  </script>;
  $listaProdotti = file_get_contents('data/prodotti.json');

  // conversione in array
  return json_decode($listaProdotti, true);
}

function estraiProdottoDaLista(array $listaProdotti, $codice) {

  foreach($listaProdotti as $prodotto) {
    if ($prodotto['codice'] == $codice) {
      return $prodotto;
    }
  }

  return null;

}
