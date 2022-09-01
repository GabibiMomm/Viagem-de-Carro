<?php 
    $username='root';
    $password='';
    try {
        $conn = new PDO('mysql:host=localhost;dbname=viagem_carro', $username, $password);
            //$conn->setAttribute(PDO::ATR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>