<?php
    $username='root';
    $password='';
    try {
        $conn = new PDO('mysql:host=localhost;dbname=viagem_carro', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    $sql ="SELECT * FROM viagem ORDER BY id";
    $consulta = $conn->prepare($sql);
    $consulta->execute();
    $texto = "";
    foreach($consulta as $linha){
        echo "<hr><br>";
        echo "Viagem ".$linha['ID'].":<br><br>";
        echo "Carro: ".$linha['Modelo_Carro']."<br>";
        echo "Motorista: ".$linha['Motorista']."<br>";
        echo "Origem: ".$linha['Origem']."<br>";
        echo "Destino: ".$linha['Destino']."<br>";
        echo "Quilometragem ".$linha['KM_Percorrido']." Quilômetros<br>";
        echo "Combustível gasto: ".$linha['Litros_Combustivel']." Litros<br>";
        echo "Preço combustível: ".$linha['Valor_Combustivel']." Reais<br>";
        echo "Autonomia: ".($linha['KM_Percorrido']/$linha['Litros_Combustivel'])." Quilometros por litro.<br>";
        echo "Preço total: ".($linha['Litros_Combustivel']*$linha['Valor_Combustivel'])." Reais<br>";
        echo "Preço por quilômetro: ".(($linha['Litros_Combustivel']*$linha['Valor_Combustivel'])/$linha['KM_Percorrido'])." Reais<br>";
    }
?>
