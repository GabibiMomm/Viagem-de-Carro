<?php
    $username='root';
    $password='';
    try {
        $conn = new PDO('mysql:host=localhost;dbname=viagem_carro', $username, $password);
            //$conn->setAttribute(PDO::ATR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    
   try {
        $dados = array(
            "Modelo_Carro" => $_POST['Modelo_Carro'],
            "Motorista" => $_POST['Motorista'],
            "Origem" => $_POST['Origem'],
            "Destino" => $_POST['Destino'],
            "KM_Percorrido" => $_POST['KM_Percorrido'],
            "Litros_Combustivel" => $_POST['Litros_Combustivel'],
            "Valor_Combustivel" => $_POST['Valor_Combustivel']
        );
    
        $sql = "INSERT INTO viagem (Modelo_Carro, Motorista, Origem, Destino, KM_Percorrido, Litros_Combustivel, Valor_Combustivel)
        VALUES ('%s', '%s', '%s', '%s', %d, %d, %d)";

        $sql = sprintf($sql,$dados[ "Modelo_Carro"],$dados[ "Motorista"],$dados[ "Origem"],$dados[ "Destino"],$dados[ "KM_Percorrido"],$dados[ "Litros_Combustivel"],$dados[ "Valor_Combustivel"]);
    
        $consulta = $conn->prepare($sql);
        
        $consulta->execute();
    } catch (PDOException $e) {
        echo ("Exceção capturada: ".$e->getMessage()."\n");
    }

?>