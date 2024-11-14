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

$media = 0;
if (count($_SESSION['voti']) > 0) {
    $media = array_sum($_SESSION['voti']) / count($_SESSION['voti']);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultati Recensioni</title>
</head>
<body>
    <h1>Riepilogo Recensioni</h1>
    
    <table border="1">
        <tr>
            <th>Numero invii</th>
            <th>Ultima data inviata</th>
        </tr>
        <tr>
            <td><?php echo $_SESSION['numero_invii']; ?></td>
            <td><?php echo $_SESSION['ultima_data']; ?></td>
        </tr>
    </table>

    <br><br>

    <h2>Voti inviati</h2>
    <ul>
        <?php foreach ($_SESSION['voti'] as $voto): ?>
            <li><?php echo $voto; ?></li>
        <?php endforeach; ?>
    </ul>

    <br><br>

    <h3>Media dei voti: <?php echo number_format($media, 2); ?></h3>

    <br><br>
    <a href="presentazione.html">Torna alla pagina di inserimento</a>
</body>
</html>
