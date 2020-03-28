<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <title>Document</title>
</head>
<body>
    <h1>Inserisci i dati della produzione giornaliera </h1>
    <form method="POST" action="form.php">
        <select name="caseificio" >
            <?php
                require_once("config.php");
                $sql = "SELECT nome_caseificio, ID FROM caseificio";
                $stmt = $pdo -> query($sql);
                foreach($stmt as $row){
                    echo '<option value="'.$row["ID"].'">' . $row["nome_caseificio"] . '</option>';
                }
            ?>
        </select>
        <input type="submit" value="invia">
    </form>
    <h2>Visualizza le forme prodotte dai vari caseifici </h2>
    <form action = "formFormeProdotte.php">
        <input type = "submit" value="visualizza">
    </form>
</body>
</html>