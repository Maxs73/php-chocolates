<?php
// inizializziamo le sessioni
session_start();

include 'libs/db.php';
include 'libs/carrello.php';

// recuperiamo il prodotto da aggiungere al carrello
// lettura parametro da URL
$codiceProdotto = $_GET['codice'];

$prodotto = recuperaProdottoDaCodice($codiceProdotto);

aggiungiProdottoCarrello($prodotto, 1);

// rimando a pagina carrello
header ('location: carrello.php');
