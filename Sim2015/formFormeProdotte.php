<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forme prodotte</title>
</head>
<body>
    <h1>Scegli due date:</h1>
    <form action="fetchFormeProdotte.php" method="POST">
        <label>Data inizio:</label>
        <input type="date" name="data_inizio"><br>
        <label>Data fine:</label>
        <input type="date" name="data_fine"><br>
        <input type="submit" value="visualizza">
    </form>
</body>
</html>