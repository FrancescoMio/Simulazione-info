<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php require_once('config.php') ?>
</head>
<body>
    <?php
        $data_inizio = $_POST['data_inizio'];
        $data_fine = $_POST['data_fine'];
        echo "<h1>Numero delle forme prodotte dei vari caseifici tra ".
        $data_inizio." e ".$data_fine."</h1>";
        $sql = "SELECT forme_prodotte,nome_caseificio,data_giornaliera FROM Produzione,Caseificio 
        WHERE (Caseificio.ID = Produzione.id_caseificio and :data_inizio <= data_giornaliera 
        and :data_fine >= data_giornaliera)";
        $stmt = $pdo ->prepare($sql);
        $stmt->execute(
            [
                "data_inizio" => $data_inizio,
                "data_fine" => $data_fine
            ]
        );
        echo '<table class="table">';
        echo "<tr><td><strong>Nome caseificio</strong></td><td><strong>Forme prodotte</strong></td>
        <td><strong>Data</strong></td></tr>";
        foreach($stmt as $row){
            echo "<tr><td>".$row['nome_caseificio']."</td><td>".$row['forme_prodotte']."</td>".
            "<td>".$row['data_giornaliera']."</td><tr>";
        }
    ?>
</body>
</html>