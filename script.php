<?php
session_start();

if (!isset($_SESSION['numero_invii'])) {
    $_SESSION['numero_invii'] = 0;
}
if (!isset($_SESSION['voti'])) {
    $_SESSION['voti'] = [];
}
if (!isset($_SESSION['ultima_data'])) {
    $_SESSION['ultima_data'] = '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $voto = (int)$_POST['voto'];

    $_SESSION['numero_invii']++;
    $_SESSION['voti'][] = $voto;
    $_SESSION['ultima_data'] = $data;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli Recensione</title>
</head>
<body>
    <h1>Dati ricevuti</h1>
    <p><strong>Numero invii:</strong> <?php echo $_SESSION['numero_invii']; ?></p>
    <p><strong>Ultima data inviata:</strong> <?php echo $_SESSION['ultima_data']; ?></p>
    <p><strong>Voti inviati finora:</strong> <?php echo implode(", ", $_SESSION['voti']); ?></p>

    <br><br>
    <a href="presentazione.html">Torna alla pagina di inserimento</a>
</body>
</html>
