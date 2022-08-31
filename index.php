<?php 
    session_start();

    include_once "conexao.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Java Script Moderno - Ajax e JQuery</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="fundo">
    <center>
        <br>
        <h1>Viagem de Carro</h1>
        <div class="corpo">
            <form class="row g-3">

                <div class="col-md-6">
                <label for="Modelo_Carro" class="form-label">Modelo do Carro/Placa</label>
                <input type="text" class="form-control" id="Modelo_Carro" required>
                </div>

                <div class="col-md-6">
                <label for="Motorista" class="form-label">Motorista</label>
                <input type="text" class="form-control" id="Motorista" required>
                </div>

                <div class="col-12">
                <label for="Origem" class="form-label">Local de Origem</label>
                <input type="text" class="form-control" id="Origem" placeholder="Exemplo: Jardim América, Rio do Sul - SC" required>
                </div>

                <div class="col-12">
                <label for="Destino" class="form-label">Destino</label>
                <input type="text" class="form-control" id="Destino" placeholder="Exemplo: Vaticano, Rio do Sul - SC" required>
                </div>

                <div class="col-md-6">
                <label for="KM_Percorrido" class="form-label">Quilometragem Percorrida</label>
                <input type="text" class="form-control" id="KM_Percorrido" required>
                </div>

                <div class="col-md-6">
                <label for="Litros_Combustivel" class="form-label">Litros de Combustível Gasto</label>
                <input type="text" class="form-control" id="Litros_Combustivel" required>
                </div>

                <div class="col-md-12">
                <label for="Valor_Combustivel" class="form-label">Valor do Combustível Atual</label>
                <input type="text" class="form-control" id="Valor_Combustivel" placeholder="Digite em valor Real" required>
                </div>
                
                <div class="col-12">
                <button type="button" class="btn btn-primary" id="confirmar">Confirmar</button>
                </div>

            </form>
        </div>

        <div class="col-12">
        <button type="button" class="btn btn-primary" id="listar">Listagem</button>
        </div>
        <div id="resultado" class="resultado"></div>


    </center>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $("#confirmar").click(function(){
                $.post("confirmar.php", 
                {Modelo_Carro : $("#Modelo_Carro").val(),
                Motorista : $("#Motorista").val(),
                Origem : $("#Origem").val(),
                Destino : $("#Destino").val(),
                KM_Percorrido : $("#KM_Percorrido").val(),
                Litros_Combustivel : $("#Litros_Combustivel").val(),
                Valor_Combustivel : $("#Valor_Combustivel").val(),
                }, function(resultado){
                    alert("Dados Cadastrados");
                })
            })
            $("#listar").click(function(){
                $.get("listagem.php", function(texto){
                    $("#resultado").html(texto);
                })
            })
        })
    </script>
</html>