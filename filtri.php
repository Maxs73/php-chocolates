<?php
// inizializziamo le sessioni
session_start();

// recuperiamo il prodotto da aggiungere al carrello
// lettura parametro da URL
$categoria = $_GET['id'];

$_SESSION['categoria']=$categoria;

// rimando a pagina carrello
header ('location: prodotti.php');
