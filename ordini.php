<?php
// inizializziamo le sessioni
session_start();

include 'libs/db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MV chocosite</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'include/header.php'; ?>
    <main>
      <div class="row">
        <div class="col-md-12">
          <h1>Carrello acquisti</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          $ListaOrdini = inizializzaListaOrdini();
          if (count($ListaOrdini) > 0) { ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>id</th>
                <th>cliente_id</th>
                <th>data</th>
                <th>Importo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($ListaOrdini as $Ordine) {
              ?>
              <tr>
                <th scope="row">1</th>
                <td><?=$Ordine['id']?></td>
                <td><?=$Ordine['nome']?></td>
                <td><?=$Ordine['data']?></td>
                <td><?=$Ordine['totale']?> &euro;</td>
                <td><a href="test.php?codice=<?= $ordine['id'] ?>"class="btn btn-link">dettagli</a></td>
              </tr>
              <?php }
              //$totaliCarrello = getTotaliCarrello();
              ?>
              <tr class="success" style="font-weight: bold">
                <th scope="row"></th>
                <td>Totale</td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <?php } else { ?>
            ERRORE CARICAMENTO RECORSET
          <?php } ?>
        </div>
      </div>
      <?php if (count($ListaOrdini) > 0) { ?>
      <div class="row">
        <div class="col-md-8">
        </div>
        <div class="col-md-4">
          <a href="iscrizione.php" class="btn btn-success btn-lg">ESCI</a>
        </div>
      </div>
      <?php } ?>
    </main>
    <?php include 'include/footer.php'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
