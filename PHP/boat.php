<?php
    session_start();

    $boat_id = $_GET['id'] ?? null;

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $stmt = $db -> query("SELECT * FROM boats WHERE id = '$boat_id'");
    $boat = $stmt -> fetchAll();

    //var_dump(get_defined_vars());

    $stmt2 = $db -> query("SELECT file_path FROM images WHERE boat_id = '$boat_id'");
    $img = $stmt2 -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sail">
    <link rel="stylesheet" href="../boat_view.css">
</head>
<body>
    <img src="../images/background_sea.png" alt="" class="background_sea">

    <div class="nav">
        <img src="../images/captain.png" alt="captain" class="logo">
        <a href="../index.php" class="title">Boat store</a>

        <div class="navbar">
            <form action="post" class="search">
                <input type="text" name="search" class="search_input" placeholder="Search..">
            </form>
            <a href="#about_us" class="menu">About us</a>
            <a href="" class="menu">Contact</a>
            <a href="" class="menu">Log in</a>
        </div>

    </div>

    <div class="middle">

        <h4>Boat name</h4>
        <img src="../images/rand_boat.png" class="boat_img" alt="">
        <div class="stats">
            <p><span class="boat_info">Cena: </span><span class="boat_info">12344555</span></p>
            <p><span class="boat_info">Silnik: </span><span class="boat_info">Nice engine</span></p>
            <p><span class="boat_info">Moc Silnika: </span class="boat_info"><span class="boat_info">2345 KM</span></p>
        </div>
                
                
        <div class="footer">
            <p>Skontaktuj się z nami</p>
        </div>

    </div>  
</body>
</html>