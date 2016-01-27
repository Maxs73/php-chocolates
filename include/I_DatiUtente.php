<?php
session_start();
  if (isset($_SESSION['Utente'])==false) {
    //non restituisco nulla
  }
  else {
    //se la sessione esiste carico in un arrai i dati della sessione
    foreach ($_SESSION['Utente'] as $ArrayUtente) {
      $DatiUtente=$ArrayUtente;
    }
    //per ogni campo dell'array estraggo chiave e valore per aoutput dati utente
    foreach ($DatiUtente as $key => $value) {
        echo "<h2>" . $key . ": " . $value . "</h2>";
      }
  }?>
