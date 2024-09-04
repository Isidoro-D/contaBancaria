<?php

include_once 'ContaPoupanca.php';

$contaPoupanca = new ContaPoupanca();

if (isset($_POST['depositar'])) {
    $quantia = floatval($_POST['quantia']);
    $contaPoupanca->depositar($quantia);
}
if (isset($_POST['aplicarJuros'])) {
    $contaPoupanca->aplicarJuros();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Conta Poupança</title>
</head>

<body>
    <header>
        <h1>Detalhes da conta poupança</h1>
    </header>
    <nav>
        <a href="index.php">Início</a>
        <a href="conta_corrente.php">Corrente</a>
    </nav>
    <div class="container">
        <?php

        $contaPoupanca->getSaldo();

        echo"<br>O saldo atual da conta é R$: ".number_format($contaPoupanca->getSaldo(),2,",",".")."<br>";
        ?>
        <form action="" method="post">
            <label for="quantia">Depósito</label>
            <input type="number" name="quantia" id="quantia" required>
            <input type="submit" name="depositar" id="depositar" value="Depositar" required>
        </form>

        <form action="" method="post">
            <input type="submit" name="aplicarJuros" value="Aplicar Juros">
        </form>
    </div>
</body>

</html>