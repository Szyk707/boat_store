<?php
    session_start();

    $boat_id = $_GET['id'] ?? null;

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $stmt = $db -> query("SELECT DISTINCT * FROM boats WHERE boats.id = {$boat_id}");
    $boat = $stmt -> fetch();

    $stmt2 = $db -> query("SELECT file_path FROM images WHERE boat_id = '$boat_id'");
    $img = $stmt2 -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $boat['model'] ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sail">
    <link rel="stylesheet" href="../boat_view.css">
    <script src="../JS/images.js" defer></script>
</head>
<body>
    <img src="../images/background_sea.png" alt="" class="background_sea">

    <div class="nav">
        <img src="../images/captain.png" alt="captain" class="logo">
        <a href="../index.php" class="title">Boat Store</a>

        <div class="navbar">
            <form action="../index.php" method="get" class="search">
                <input type="text" name="search" id="search" class="search_input" placeholder="Wyszukaj...">
                <button type="submit" class="search_icon"><img src="../images/search_icon.svg" alt="search"></button>
            </form>
            <a href="../index.php#about_us" class="menu">O nas</a>
            <a href="" class="menu">Kontakt</a>
            <a href="" class="menu">Zaloguj</a>
        </div>

    </div>

    <div class="middle">

        <h4><?= $boat['model'] ?></h4>
        <div class="middle margin0">
            <img src="<?= $img[0]['file_path'] ?>" class="boat_img margin0" id="boat_img" alt="">
            <ul>
                <?php foreach($img as $i): ?>
                    <li id="small_img">
                        <button data-src="<?= $i['file_path']?>" class="small_btn">
                            <img src="<?= $i['file_path'] ?>" alt="obrazek" class="small_img">
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <a href="#description" class="quick_scroll">Opis</a>
            <a href="#specification" class="quick_scroll">Specyfikacja</a>
        </div>
        <div class="description">
            <h3  id="description">OPIS</h3>
            <p class="desc"><?= $boat['description'] ?></p>
        </div>
        <div class="stats" id="specification">
            <h3 id="specification">SPECYFIKACJA</h3>
            <div class="boat_info_seg">
                <span class="boat_info b">Cena: </span>
                <span class="boat_info"><?= $boat['price'] ?> zł</span>
            </div>
            <div class="boat_info_seg">
                <span class="boat_info b">Silnik: </span>
                <span class="boat_info"><?= $boat['engine'] ?></span>
            </div>
            <div class="boat_info_seg">
                <span class="boat_info b">Moc Silnika: </span>
                <span class="boat_info"><?= $boat['horse_power'] ?> KM</span>
            </div> 
            <div class="boat_info_seg">
                <span class="boat_info b">Długość: </span>
                <span class="boat_info"><?= $boat['length'] ?>m</span>
            </div> 
            <div class="boat_info_seg">
                <span class="boat_info b">Szerokość: </span>
                <span class="boat_info"><?= $boat['width'] ?>m</span>
            </div>
            <div class="boat_info_seg">
                <span class="boat_info b">Wysokość: </span>
                <span class="boat_info"><?= $boat['height'] ?>m</span>
            </div>
        </div>
                
        <div class="footer">
            <p>Skontaktuj się z nami</p>
        </div>
    </div>  
</body>
</html>