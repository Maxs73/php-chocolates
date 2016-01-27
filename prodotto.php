<?php
include 'libs/libreria.php';

// lettura parametro da URL
$codiceProdotto = $_GET['codice'];
//var_dump(isset($codiceProdotto));
$arrayProdotti = inizializzaListaProdotti();

if (is_null($codiceProdotto)) {
  $prodotti = estraiProdottoDaLista($arrayProdotti, $codiceProdotto); //se la richiesta non  passa alcun parametro allora visualizzo tutti i prodotti
} else {
  $prodotti = estraiProdottoDaLista($arrayProdotti, $codiceProdotto);//viene cercato il prodotto codificato nella $_GET
}

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
      <?php foreach($prodotti as $prodotto) {?>
      <div class="row">
          <div class="col-md-12">
            <h1><?=$prodotto['nome']?></h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="<?=$prodotto['url_immagine']?>">
          </div>
          <div class="col-md-6">
            <h2><?=$prodotto['nome']?></h2>
            <h3><?=$prodotto['descrizione']?></h3>
            <br>
            <div>
              <a href="aggiungi_prodotto_carrello.php?codice=<?= $prodotto['codice'] ?>" class="btn btn-success">Acquista</a>
            </div>
          </div>
          <?php } ?>
      </div>
    </main>
    <?php include 'include/footer.php'; ?>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</html>
