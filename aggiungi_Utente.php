<?php
// inizializziamo le sessioni
session_start();
include 'libs/Utente.php';
//chiamata funzione aggiunta dati in sessione

AggiungiUtente($_POST);

// rimando a pagina di riepilogo di iscrizione
header ('location: DatiUtente.php');
?>
