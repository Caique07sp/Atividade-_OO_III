<?php

require_once 'Bebidas.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
</head>
<body>
  

    <form action="" method="post">
        <h3>Selecione o tipo de bebida:</h3>
        <select name="tipo_bebida" required>
            <option value="">Selecione</option>
            <option value="vinho">Vinho</option>
            <option value="suco">Suco</option>
            <option value="refrigerante">Refrigerante</option>
        </select><br><br>

      
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" required><br><br>

      
        <div id="vinho_fields">
            <label for="safra">Safra:</label>
            <input type="number" name="safra"><br><br>

            <label for="tipo_vinho">Tipo de Vinho:</label>
            <input type="text" name="tipo_vinho"><br><br>
        </div>


        <div id="suco_fields">
            <label for="sabor">Sabor:</label>
            <input type="text" name="sabor"><br><br>
        </div>

 
        <div id="refrigerante_fields">
            <label for="retornavel">É retornável?</label>
            <select name="retornavel">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select><br><br>
        </div>

     
    </form>
</body>
</html>
