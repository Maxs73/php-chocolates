<?php

function aggiungiUtente($utente) {
  // costruzione array che rappresenta riga carrello
  $rigautente = [
    'prodotto' => $prodotto,
    'quantita' => $quantita
  ];

  // inizializzazione carrello
  if (isset($_SESSION['carrello'])) {
    $carrello = $_SESSION['carrello'];

    // carrello già inizializzato?
    // verifica che lo stesso prodotto non sia già presente nel carrello
    // in caso affermativo, aggiornarne la quantità

  } else {
    $carrello = [];
  }

  // aggiunta riga a carrello
  $carrello[] = $rigaCarrello;

  // aggiornamento sessione
  $_SESSION['carrello'] = $carrello;
}

function getProdottiCarrello() {
  if (isset($_SESSION['carrello'])) {
    return $_SESSION['carrello'];
  } else {
    return [];
  }
}

function getTotaliCarrello() {
  $prodottiCarrello = getProdottiCarrello();

  $totale = 0;
  $quantita = 0;

  foreach($prodottiCarrello as $rigaCarrello) {
    $totale += $rigaCarrello['prodotto']['prezzo'];
    $quantita += $rigaCarrello['quantita'];
  }

  return [
    'totale' => $totale,
    'pezzi' => $quantita
  ];

}
