<?php

function aggiungiProdottoCarrello($prodotto, $quantita) {
  // costruzione array che rappresenta riga carrello
  $rigaCarrello = [
    'prodotto' => $prodotto,
    'quantita' => $quantita
  ];

  // inizializzazione carrello
  if (isset($_SESSION['carrello'])) {
    $carrello = $_SESSION['carrello'];
    var_dump(count($carrello));
    for ($i=0; $i < count($carrello) ; $i++) {
      if ($carrello[$i]['prodotto']['codice']==$prodotto['codice']) {
        $_SESSION['carrello'][$i]['quantita']+=$quantita;
        $aggiorna='true';
      }

    }
    if ($aggiorna!='true') {
      $carrello[] = $rigaCarrello;
      $_SESSION['carrello'] = $carrello;
    }

  } else {
    $carrello = [];
    // aggiunta riga a carrello
    $carrello[] = $rigaCarrello;
    $_SESSION['carrello'] = $carrello;
  }

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
