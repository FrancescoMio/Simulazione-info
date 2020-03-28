<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <title>Forme vendute</title>
</head>
<body>
    <h1>Specifica la tipologia delle forme vendute</h1>
    <form action="invia.php" method="POST">
        <?php
            require_once("config.php");
            $forme_vendute = $_POST["forme_vendute"];
            setcookie("latte_lavorato",$_POST["latte_lavorato"]);
            setcookie("latte_utilizzato",$_POST["latte_utilizzato"]);
            setcookie("forme_prodotte",$_POST["forme_prodotte"]);
            setcookie("forme_vendute",$forme_vendute);
            setcookie("data_giornaliera",$_POST["data_giornaliera"]);
            for($i = 1; $i <= $forme_vendute; $i++){
                $sql = "SELECT nome FROM acquirente";
                $stmt = $pdo->query($sql);
                echo "<h3>$i)</h3>";
                echo '<p>Stagionatura: <input type="text" name="stagionatura' . $i . '" required> </p>';
                echo "<p>Acquirente:".' <select name="acquirente' . $i .'">"';
                foreach($stmt as $row){
                    echo "<option>".$row['nome']."</option>";
                }
                echo "</select></p>";
                echo '<p>scelta: <select name="scelta' . $i .'"> <option>prima</option> <option>seconda</option>  </select></p>';
                echo '<br>';
            }
        ?>
        <input type="submit" value="invia">
    </form>
</body>
</html>