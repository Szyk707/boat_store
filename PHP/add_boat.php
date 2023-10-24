<?php
    session_start();

    $permission = $_SESSION['permission'] ?? null;

    if($permission == null || $permission == 0)
    {
        header("Location: ../index.php");
    }

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');
    
    (!empty($_POST['boatModel'])) ? $boatModel = $_POST['boatModel'] : $boatModel = null ;
    (!empty($_POST['boatPrice'])) ? $boatPrice = (float) $_POST['boatPrice'] : $boatPrice = null ;
    (!empty($_POST['boatYear'])) ? $boatYear = (int) $_POST['boatYear'] : $boatYear = null ;
    (!empty($_POST['boatLength'])) ? $boatLength = (float) $_POST['boatLength'] : $boatLength = null ;
    (!empty($_POST['boatHeight'])) ?$boatHeight = (float) $_POST['boatHeight'] : $boatHeight = null ;
    (!empty($_POST['boatWidth'])) ? $boatWidth = (float) $_POST['boatWidth'] : $boatWidth = null ;
    (!empty($_POST['boatEngine'])) ? $boatEngine = $_POST['boatEngine'] : $boatEngine = null;
    (!empty($_POST['horsePower'])) ? $horsePower = (int) $_POST['horsePower'] : $horsePower = null;
    (!empty($_POST['fuel'])) ? $fuel = $_POST['fuel'] : $fuel = null;
    (!empty($_POST['description'])) ? $description = $_POST['description'] : $description = null;
    (!empty($_POST['boatCategory'])) ? $boatCategory = $_POST['boatCategory'] : $boatCategory = null;

    $targetDir = "./images/";
    (!empty($_FILES['mainImg'])) ? $mainImg = $targetDir . basename($_FILES['mainImg']['name']) : $mainImg = null;
    
    if($boatModel != null &&
        $boatPrice != null && 
        $boatYear != null &&
        $boatLength != null && 
        $boatWidth != null && 
        $boatHeight != null &&
        $boatEngine != null &&
        $horsePower != null &&
        $fuel != null &&
        $description != null &&
        $boatCategory != null
     )
    {
        $db->query("INSERT INTO boats (id, model, production_year, price, length, height, width, category, engine, fuel_type, horse_power, main_img_path, description)
        VALUES(null, 
        '$boatModel', 
        '$boatYear', 
        '$boatPrice', 
        '$boatLength', 
        '$boatHeight', 
        '$boatWidth', 
        '$boatCategory', 
        '$boatEngine', 
        '$fuel', 
        '$horsePower',
        '$mainImg', 
        '$description')"
        );
        $_SESSION['submitError'] = null;

        $stmt = $db ->query("SELECT id FROM boats WHERE model = '$boatModel'");
        $boat = $stmt->fetch();
        $id = $boat['id'];
        $path = "." . $mainImg;

        $db -> query("INSERT INTO images VALUES('$id', '$path', null)");

        if(!file_exists($mainImg))
        {
            move_uploaded_file($_FILES['mainImg']['tmp_name'], "." . $mainImg);
        }
        header("Location: ./admin_panel.php");
    } 
    else
    {
        header("Location: ./admin_panel.php");
        $_SESSION['submitError'] = "TRZEBA UZUPEŁNIĆ WSZYSTKIE POLA";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>