<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <title>Inserimentot</title>
</head>
<body>
    <?php setcookie("id_caseificio", $_POST["caseificio"])?>
    <h1>Inserisci i dati della produzione giornaliera </h1>
    <form method="POST" action="forme_vendute.php">
        data di produzione: <input type="date" name="data_giornaliera" required><br>
        latte lavorato: <input type="text" name="latte_lavorato" required> l<br>
        latte impiegato: <input type="text" name="latte_utilizzato" required> l<br>
        forme prodotte: <input type="text" name="forme_prodotte" required><br>
        forme vendute: <input type="text" name="forme_vendute" required><br>
        <input type="submit" value="invia">
    </form>
</body>
</html>