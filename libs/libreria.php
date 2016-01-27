<?php

function inizializzaListaProdotti() {
  // lettura file esterno

  $listaProdotti = file_get_contents('data/prodotti.json');

  // conversione in array
  return json_decode($listaProdotti, true);
}

function estraiProdottoDaLista(array $listaProdotti, $codice) {


  foreach($listaProdotti as $prodotto) {
    if ($prodotto['codice'] == $codice and is_null($codice)==false) {
      $prodotti[]=$prodotto;
      return $prodotti;
    }
    else {
      if (is_null($codice)) {
        $prodotti[]=$prodotto;
      }

    }
  }
  return $prodotti;
}

/*function estraiProdottoCodiceDaLista(array $listaProdotti, $codice) {

  foreach($listaProdotti as $chiave => $elemento) {
    if ($elemento['codice'] == $codice) {
      return $chiave;
    }
  }

  return null;

}
*/
