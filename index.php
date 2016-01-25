<?php
include 'libs/libreria.php';

$arrayProdotti = inizializzaListaProdotti();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Digi Corp</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'include/header.php'; ?>
    <main>
      <div class="container-fluid">
        <div class="row banner-home">
          <div class="col-md-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyA1L7UTneg8u4dNQfF3jLkvAeyZUfmt9MZPcCJ_iffdvRgxYc">
          </div>
          <div class="col-md-9">
            <h1>Il software migliore? Lo trovi da noi!</h1>
          </div>
        </div>
        <div class="row">
          <?php foreach($arrayProdotti as $prodotto) {?>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading"><a href="/prodotto.php?codice=<?= $prodotto['codice'] ?>"><?= $prodotto['nome'] ?></a></div>
              <div class="panel-body">
                <img src="<?= $prodotto['url_immagine'] ?>" />
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </main>
    <?php include 'include/footer.php'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
