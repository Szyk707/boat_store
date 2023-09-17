<?php
    session_start();

    // $isLoggedIn = $_SESSION['isLoggedIn'] ?? false;
    // if(!$isLoggedIn)
    // {
    //     header("Location: ./index.php");
    // }

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');
    
    $boatModel = $_POST['boatModel'] ?? null;
    $boatPrice = (float) $_POST['boatPrice'] ?? null;
    $boatLength = (float) $_POST['boatLength'] ?? null;
    $boatHeight = (float) $_POST['boatHeight'] ?? null;
    $boatWidth = (float) $_POST['boatWidth'] ?? null;
    $boatCategory = $_POST['boatCategory'] ?? null;

    var_dump( get_defined_vars() );
    // Wszystko ma być uzupełnione, żeby wstawić nową łódź
    if($boatModel !== null &&
        $boatPrice !== null && 
        $boatLength !== null && 
        $boatWidth !== null && 
        $boatHeight !== null &&
        $boatCategory !== null
     )
    {
        $db->query("INSERT INTO boats 
        VALUES(null, '$boatModel', '$boatPrice', '$boatLength', '$boatHeight', '$boatWidth', '$boatCategory')"
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