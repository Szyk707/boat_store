<?php
    session_start();

    $boat_id = $_GET['id'] ?? null;

    $email = $_SESSION['email'] ?? null;

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
        <form action="./index.php" method="get" class="search" autocomplete="off">
                <input type="text" name="search" id="search" class="search_input" placeholder="Wyszukaj...">
                <button type="submit" class="search_icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" height="45" width="50"><path d="M796-121 533-384q-30 26-69.959 40.5T378-329q-108.162 0-183.081-75Q120-479 120-585t75-181q75-75 181.5-75t181 75Q632-691 632-584.85 632-542 618-502q-14 40-42 75l264 262-44 44ZM377-389q81.25 0 138.125-57.5T572-585q0-81-56.875-138.5T377-781q-82.083 0-139.542 57.5Q180-666 180-585t57.458 138.5Q294.917-389 377-389Z"/></svg></button>
            </form>
            <a href="#about_us" class="menu">O nas</a>
            <a href="#contact" class="menu">Kontakt</a>
            <?php if($email == null): ?>
                <a href="./PHP/login.php" class="menu">Zaloguj</a>
            <?php elseif($email != null): ?>
                <a href="./PHP/logout.php" class="menu">Wyloguj</a>
                <?php if($_SESSION['permission'] == 1): ?>
                    <a href="./admin_panel.php" class="menu">Admin</a>
                <?php endif; ?>
            <?php endif; ?>
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
        <div class="description" id="description">
            <h3>OPIS</h3>
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
            <h3 id="contact">Kontakt</h3>
                <div class="kontakt">
                    <span class="b">E-mail: </span><span class="">contact@boat-store.com</span>
                </div>
                <div class="kontakt">
                    <span class="b">Numer Telefonu: </span><span class=""> +48 000 000 000</span>
                </div>
        </div>
    </div>  
</body>
</html>