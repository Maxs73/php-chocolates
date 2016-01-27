<?php session_start(); ?>


<?php
  if (isset($_SESSION['Utente'])==false) {
    include 'include/iscrizione.php';
  }
  else {
    include 'include/header.php';
    include 'include/I_DatiUtente.php';
  }
 ?>
