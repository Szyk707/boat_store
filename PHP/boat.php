<?php
    session_start();

    $boat_id = $_GET['id'] ?? null;

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $stmt = $db -> query("SELECT * FROM boats WHERE id = '$boat_id'");
    $boat = $stmt -> fetchAll();

    var_dump(get_defined_vars());

    $stmt2 = $db -> query("SELECT file_path FROM images WHERE boat_id = '$boat_id'");
    $img = $stmt2 -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h4><?= $boat[0]['model'] ?></h4>
        <img src="<?= $img[0]['file_path'] ?>" alt="lodz">
        <p><?= $boat[0]['price'] ?></p>
    </div>
</body>
</html>