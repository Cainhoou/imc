<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cálculo do IMC</title>
</head>
<body>

<h1>Cálculo do IMC</h1>
<form method="post" action="">
    <label for="peso">Peso (em kg):</label>
    <input type="number" id="peso" name="peso" step="0.1" required>
    <br> <br>
    <label for="altura">Altura (em metros):</label>
    <input type="number" id="altura" name="altura" step="0.01" required>
    <br> <br>
    <button type="submit">Calcular IMC</button>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        if ($peso > 0 && $altura > 0) {
            $imc = $peso / ($altura * $altura);

            if ($imc < 18.5) {
                $classificacao = "Cuidado! Você está magro!";
            } elseif ($imc >= 18.5 && $imc < 24.9) {
                $classificacao = "Ok! Seu peso está normal!";
            } elseif ($imc >= 25 && $imc < 29.9) {
                $classificacao = "Sobrepeso I";
            } elseif ($imc >= 30 && $imc < 39.9) {
                $classificacao = "Obesidade II";
            } else {
                $classificacao = "Obesidade Grave";
            }

            echo "<div class='resultado'>";
            echo "<h2>Resultado do IMC</h2>";
            echo "<p>Seu IMC é: " . number_format($imc, 2) . "</p>";
            echo "<p>Classificação: " . $classificacao . "</p>";
            echo "</div>";
        } else {
            echo "<div class='resultado'>";
            echo "<p>Por favor, insira valores válidos para peso e altura.</p>";
            echo "</div>";
        }
    }
    ?>
</form>
</body>
</html>