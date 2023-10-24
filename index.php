<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $email = $_SESSION['email'] ?? null;

    $search = $_GET['search'] ?? $_SESSION['search'] ?? null;
    (!empty($_SESSION['search'])) ? $_SESSION['search'] = null : $_SESSION['search'] = $search;

    (!empty($_POST['minLength'])) ? $minLength = $_POST['minLength'] : $minLength = 0;
    (!empty($_POST['maxLength'])) ? $maxLength = $_POST['maxLength'] : $maxLength = 1_000_000_000;

    (!empty($_POST['minPrice'])) ? $minPrice = $_POST['minPrice'] : $minPrice = 0;
    (!empty($_POST['maxPrice'])) ? $maxPrice = $_POST['maxPrice'] : $maxPrice = 1_000_000_000;

    (!empty($_POST['minYear'])) ? $minYear = $_POST['minYear'] : $minYear = 0;
    (!empty($_POST['maxYear'])) ? $maxYear = $_POST['maxYear'] : $maxYear = 3_000_000_000;


    $stmt = $db -> query("  SELECT * FROM boats 
                            WHERE boats.model LIKE '%{$search}%'
                            AND boats.length BETWEEN '$minLength' AND '$maxLength'
                            AND boats.price BETWEEN '$minPrice' AND '$maxPrice'
                            AND boats.production_year BETWEEN '$minYear' AND '$maxYear'
                            ");
    $boats = $stmt -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sail">
    <link rel="stylesheet" href="style.css">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="./JS/boat_titles.js" defer></script>
</head>
<body>

    <img src="images/background_sea.png" alt="" class="background_sea">

    <div class="nav">
        <img src="images/anchor.png" alt="captain" class="logo">
        <a href="index.php" class="title">Boat Store</a>

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
                    <a href="./PHP/admin_panel.php" class="menu">Admin</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>



    <div class="content">
        
        <div class="side_bar">
            <div>
                <h4 class="filters_title">Filtry</h4>
            </div>
            <form action="./index.php" method="post" class="filters" autocomplete="off">
                <div>
                    <div>
                        <p class="filter_header">Cena</p>
                        <input type="text" name="minPrice" id="minPrice" placeholder="Min." pattern="\d*" class="filter_input">
                        <input type="text" name="maxPrice" id="maxPrice" placeholder="Maks." pattern="\d*" class="filter_input">
                    </div>
                    <div>
                        <p class="filter_header">Długość</p>
                        <input type="text" name="minLength" id="minLength" placeholder="Min." pattern="\d*" class="filter_input">
                        <input type="text" name="maxLength" id="maxLength" placeholder=" Maks." pattern="\d*" class="filter_input">
                    </div>
                    <div>
                        <p class="filter_header">Rocznik</p>
                        <input type="text" name="minYear" id="minYear" placeholder="Od" pattern="\d*" class="filter_input">
                        <input type="text" name="maxYear" id="maxYear" placeholder="Do" pattern="\d*" class="filter_input">
                    </div>
                    <div class="center">
                        <input type="submit" value="Zastosuj" class="filters_submit">
                    </div>
                </div>
            </form>
        </div>


        <div class="middle">
            
            <div class="boats">
                <?php foreach($boats as $index => $b): ?>
                    <a href="./PHP/boat.php?id=<?= $b['id'] ?>" class="boat_card">
                        <div>
                            <div class="test_div">
                                <h4><?= $b['model'] ?></h4>
                            </div>
                            <img src="<?= $b['main_img_path'] ?>" alt="łódź" class="boat_card_img">
                            <div class="boat_info_parent">
                                <span class="boat_info">Cena: </span><span class="boat_info"><?= $b['price'] ?> zł</span>
                                <span class="boat_info">Silnik: </span><span class="boat_info"><?= $b['engine'] ?></span>
                                <span class="boat_info">Moc Silnika: </span class="boat_info"><span class="boat_info"><?= $b['horse_power'] ?> KM</span>
                            </div>
                        </div>
                    </a>                
                <?php endforeach; ?>
            </div>


            <div class="about_us" id="about_us">
                <div class="main">
                    <h3>About us</h3>
                    <img src="images/about_us.png" alt="" class="about_us_boat">
                    <span class="about_us_description">1 Even though you're alone, value other people in your life. ...
                        2 Be in touch with your own power. ...
                        3 Be a silent leader. ...
                        4 Know how to adapt to new situations. ...
                        5 Treat everyone the same way. ...
                        6 Be yourself, even without a social circle. ...
                        7 Understand the importance of silence.</span>
                </div>
                <div class="olek">
                    <h3 class="name">Aleksander Michalski</h3>
                    <span class="description">1 Even though you're alone, value other people in your life. ...
                        2 Be in touch with your own power. ...
                        3 Be a silent leader. ...
                        4 Know how to adapt to new situations. ...
                        5 Treat everyone the same way. ...
                        6 Be yourself, even without a social circle. ...
                        7 Understand the importance of silence.</span>
                    <img src="images/rob2.png" alt="" class="rob">
                </div>
                <div class="szymon">
                    <h3 class="name">Szymon Kołbus</h3>
                    <img src="images/ryan2.png" alt="" class="ryan">
                    <span class="description">1 Even though you're alone, value other people in your life. ...
                        2 Be in touch with your own power. ...
                        3 Be a silent leader. ...
                        4 Know how to adapt to new situations. ...
                        5 Treat everyone the same way. ...
                        6 Be yourself, even without a social circle. ...
                        7 Understand the importance of silence.</span>
                </div>

                    
            </div>
            


            <div class="footer" id="contact">
                <h3>Kontakt</h3>
                <div class="kontakt">
                    <span class="b">E-mail: </span><span class="">contact@boat-store.com</span>
                </div>
                <div class="kontakt">
                    <span class="b">Numer Telefonu: </span><span class=""> +48 000 000 000</span>
                </div>
             
            </div>
        </div>
    </div>
</body>
</html>