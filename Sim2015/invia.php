<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <title>Inserimento dati db</title>
</head>
<body>
    <?php
        require_once("config.php");
        $id_caseificio = $_COOKIE["id_caseificio"];
        $latte_lavorato = $_COOKIE["latte_lavorato"];
        $latte_utilizzato = $_COOKIE["latte_utilizzato"];
        $forme_vendute = $_COOKIE["forme_vendute"];
        $forme_prodotte = $_COOKIE["forme_prodotte"];
        $data_giornaliera = $_COOKIE["data_giornaliera"];

        $sqlProduzione = "INSERT INTO produzione (id_caseificio, latte_lavorato, latte_utilizzato, forme_vendute, forme_prodotte, data_giornaliera) VALUES (:id_caseificio, :latte_lavorato, :latte_utilizzato, :forme_vendute, :forme_prodotte, :data_giornaliera)";
        $sqlNome = "SELECT ID FROM acquirente WHERE nome = :nome";
        $sqlFormaVenduta = "INSERT INTO formavenduta (id_acquirente, scelta, stagionatura) VALUE (:id_acquirente, :scelta, :stagionatura)";
        
        //inserimento produzione caseificio
        $stmt = $pdo -> prepare($sqlProduzione);
        $stmt -> execute(['id_caseificio' => $id_caseificio, "latte_lavorato" => $latte_lavorato, "latte_utilizzato" => $latte_utilizzato, "forme_vendute" => $forme_vendute, "forme_prodotte" => $forme_prodotte, "data_giornaliera" => $data_giornaliera]);
        
        //inserimento delle forme vendute
        for($i = 1; $i <= $forme_vendute; $i++){
            $stmt = $pdo -> prepare($sqlNome);
            $stmt -> execute(['nome' => $_POST["acquirente$i"]]);
            foreach($stmt as $row){
                $stmt1 = $pdo -> prepare($sqlFormaVenduta);
                $stmt1 -> execute(['id_acquirente' => $row["ID"], 'scelta' => $_POST["scelta$i"], 'stagionatura' => $_POST["stagionatura$i"]]);
            }
        }

        //controllo inserimento andato a buon fine
        if($stmt1->rowCount() != 0){
            echo"<strong>Inserimento riuscito :) </strong>";
        }
    ?>
</body>
</html>