<?php

function creaConnessionePDO() {
    // Nella realtà evitare di connettersi al db con l'utente "root".
    // E' preferibile creare un utente ad-hoc
    return new PDO('mysql:host=localhost;dbname=mvchocolates', 'root', 'mvlabs');
}

function inizializzaListaProdotti() {
    $db = creaConnessionePDO();
    return $db->query('SELECT * FROM prodotti');//CHIAMO UN METODO CON DB->METODO()
}

function inizializzaListaProdottiFiltrati($sqltext) {
    $db = creaConnessionePDO();
    $StringSql="SELECT * FROM prodotti where " . $sqltext;
    return $db->query($StringSql);//CHIAMO UN METODO CON DB->METODO()
}

function recuperaProdottoDaCodice($codice) {
    $db = creaConnessionePDO();

    // prepara la query da eseguire
    $stmt = $db->prepare('SELECT * FROM prodotti WHERE codice LIKE :codice'); //gli passo un parametro codice

    // filtra i dati ricevuti e si assicura che non contengano caratteri indesiderati
    $codice = filter_input(INPUT_GET, 'codice', FILTER_SANITIZE_STRING);//ripulisco la varabile $codice

    // sanitizza i dati per evitare SQL injections
    $stmt->bindParam(':codice', $codice, PDO::PARAM_STR);

    // esegue la query
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);//modo in cui voglio che i dati escano in un array associativo
  }

function salvaOrdine($prodotti, $utente) {

    $db = creaConnessionePDO();

    try {//provo ad eseguire una serie di comandi e se uno qualsiasi non funziona esce e fa un rollback (PDO CONTROLLA IL CODICE DELLA QUERY)
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//gestione degli errori

        $db->beginTransaction();//monitorizzo le transazioni

        // inserimento in tabella clienti
        $stmt = $db->prepare("INSERT INTO clienti (nome, cognome, email, indirizzo, citta, cap, provincia)
                              VALUES (:nome, :cognome, :email, :indirizzo, :citta, :cap, :provincia)");

        $stmt->bindParam(':nome', $utente['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':cognome', $utente['cognome'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $utente['email'], PDO::PARAM_STR);
        $stmt->bindParam(':indirizzo', $utente['indirizzo'], PDO::PARAM_STR);
        $stmt->bindParam(':citta', $utente['citta'], PDO::PARAM_STR);
        $stmt->bindParam(':cap', $utente['cap'], PDO::PARAM_STR);
        $stmt->bindParam(':provincia', $utente['provincia'], PDO::PARAM_STR);

        $stmt->execute();//HO INSERITO I DATI NELLA TABELLA

        $idCliente = $db->lastInsertId();//MI DA L'ULTIMO ID DEL CLIENTE DELLA QUERY PRECEDENTE

        // inserimento in tabella ordini
        $stmt = $db->prepare("INSERT INTO ordini (cliente_id, data, totale, note)
                              VALUES (:cliente_id, :data, :totale, :note)");

        $stmt->bindParam(':cliente_id', $idCliente, PDO::PARAM_INT);

        $date = date('Y-m-d H:i:s');
        $stmt->bindParam(':data', $date);

        $totale = 0;
        foreach($prodotti as $rigaProdotto) {
            $totale += $rigaProdotto['prodotto']['prezzo'] * $rigaProdotto['quantita'];
        }

        $stmt->bindParam(':totale', $totale, PDO::PARAM_INT);
        $stmt->bindParam(':note', $utente['note'], PDO::PARAM_STR);

        $stmt->execute();

        $idOrdine = $db->lastInsertId();

        // inserimento in tabella ordini_dettagli
        foreach($prodotti as $rigaProdotto) {

            $stmt = $db->prepare("INSERT INTO ordini_dettagli (ordine_id, codice_prodotto, prezzo, quantita, totale)
                                  VALUES (:ordine_id, :codice_prodotto, :prezzo, :quantita, :totale)");

            $stmt->bindParam(':ordine_id', $idOrdine, PDO::PARAM_INT);
            $stmt->bindParam(':codice_prodotto', $rigaProdotto['prodotto']['codice'], PDO::PARAM_STR);
            $stmt->bindParam(':prezzo', $rigaProdotto['prodotto']['prezzo'], PDO::PARAM_INT);
            $stmt->bindParam(':quantita', $rigaProdotto['quantita'], PDO::PARAM_INT);

            $totale = $rigaProdotto['prodotto']['prezzo'] * $rigaProdotto['quantita'];
            $stmt->bindParam(':totale', $totale, PDO::PARAM_INT);

            $stmt->execute();

        }

        $db->commit();

    } catch (Exception $e) {//
        $db->rollBack();//annulla la transazione
        echo "Si è verificato un errore: " . $e->getMessage();
    }

    // svuotamento variabili di sessione
    unset($_SESSION['utente']);
    unset($_SESSION['carrello']);
}
