<?php

function inizializzaListaProdotti() {
  // lettura file esterno

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

function estraiProdottoCodiceDaLista(array $listaProdotti, $codice) {

  foreach($listaProdotti as $chiave => $elemento) {
    if ($elemento['codice'] == $codice) {
      return $chiave;
    }
  }

  return null;

}
