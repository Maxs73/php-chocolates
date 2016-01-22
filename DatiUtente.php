<?php
session_start();;

foreach ($_SESSION['Utente'] as $ArrayUtente) {
  $DatiUtente=$ArrayUtente;
}

?>
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
    <?php
    foreach ($DatiUtente as $key => $value) {
        echo "<h2>" . $key . ": " . $value . "</h2>";
      }
      ?>
</body>
