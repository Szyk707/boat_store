<?php
    session_start();

    $permission = $_SESSION['permission'] ?? null;

    if($permission == null || $permission == 0)
    {
        header("Location: ../index.php");
    }

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');
    
    $boatModel = $_POST['boatModel'] ?? "";
    $boatPrice = (float) $_POST['boatPrice'] ?? "";
    $boatLength = (float) $_POST['boatLength'] ?? "";
    $boatHeight = (float) $_POST['boatHeight'] ?? "";
    $boatWidth = (float) $_POST['boatWidth'] ?? "";
    $boatEngine = $_POST['boatEngine'] ?? "";
    $horsePower = (int) $_POST['horsePower'] ?? "";
    $fuel = $_POST['fuel'] ?? "";
    $mainImg = $_POST['mainImg'] ?? "";
    $description = $_POST['description'] ?? "";
    $boatCategory = $_POST['boatCategory'] ?? null;

    if($boatModel !== "" &&
        $boatPrice !== "" && 
        $boatLength !== "" && 
        $boatWidth !== "" && 
        $boatHeight !== "" &&
        $boatEngine !== "" &&
        $horsePower !== "" &&
        $fuel !== "" &&
        $mainImg !== "" &&
        $description !== "" &&
        $boatCategory !== null
     )
    {
        $db->query("INSERT INTO boats 
        VALUES(null, '$boatModel', '$boatPrice', '$boatLength', '$boatHeight', '$boatWidth', '$boatCategory', '$boatEngine', '$fuel', '$horsePower', '$mainImg', '$description')"
        );
        $_SESSION['submitError'] = null;
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