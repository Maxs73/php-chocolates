<?php
// inizializziamo le sessioni
session_start();

include 'libs/libreria.php';
include 'libs/carrello.php';

// recuperiamo il prodotto da aggiungere al carrello
// lettura parametro da URL
$codiceProdotto = $_GET['codice'];

$arrayProdotti = inizializzaListaProdotti();

$prodotto = estraiProdottoDaLista($arrayProdotti, $codiceProdotto);

aggiungiProdottoCarrello($prodotto, 1);

// rimando a pagina carrello
header ('location: carrello.php');
?>
