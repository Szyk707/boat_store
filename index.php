<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $email = $_SESSION['email'] ?? null;

    $search = $_GET['search'] ?? null;

    (!empty($_POST['minLength'])) ? $minLength = $_POST['minLength'] : $minLength = 0;
    (!empty($_POST['maxLength'])) ? $maxLength = $_POST['maxLength'] : $maxLength = 1_000;

    (!empty($_POST['minPrice'])) ? $minPrice = $_POST['minPrice'] : $minPrice = 0;
    (!empty($_POST['maxPrice'])) ? $maxPrice = $_POST['maxPrice'] : $maxPrice = 1_000_000_000;

    (!empty($_POST['minYear'])) ? $minYear = $_POST['minYear'] : $minYear = 0;
    (!empty($_POST['maxYear'])) ? $maxYear = $_POST['maxYear'] : $maxYear = 3000;

    if($search !== null) 
    {
        $stmt = $db -> query("  SELECT * FROM boats 
                                WHERE boats.model LIKE '%{$search}%'
                                AND boats.length BETWEEN '$minLength' AND '$maxLength'
                                AND boats.price BETWEEN '$minPrice' AND '$maxPrice'
                                AND boats.production_year BETWEEN '$minYear' AND '$maxYear'");
        $boats = $stmt -> fetchAll();
    }
    else 
    {
        $stmt = $db -> query("  SELECT * FROM boats
                                WHERE boats.length BETWEEN '$minLength' AND '$maxLength'
                                AND boats.price BETWEEN '$minPrice' AND '$maxPrice'
                                AND boats.production_year BETWEEN '$minYear' AND '$maxYear'");
        $boats = $stmt -> fetchAll();
    }
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

</head>
<body>

    <img src="images/background_sea.png" alt="" class="background_sea">

    <div class="nav">
        <img src="images/captain.png" alt="captain" class="logo">
        <a href="index.php" class="title">Boat Store</a>

        <div class="navbar">
            <form action="" method="get" class="search">
                <input type="text" name="search" id="search" class="search_input" placeholder="Wyszukaj...">
                <button type="submit" class="search_icon"><img src="./images/search_icon.svg" alt="search"></button>
            </form>
            <a href="#about_us" class="menu">O nas</a>
            <a href="#contact" class="menu">Kontakt</a>
            <?php if($email == null): ?>
                <a href="./PHP/login.php" class="menu">Zaloguj</a>
            <?php elseif($email != null): ?>
                <a href="./PHP/logout.php" class="menu">Wyloguj</a>
            <?php endif; ?>
        </div>
    </div>



    <div class="content">
        
        <div class="side_bar">
            <h4>Filters</h4>
            <form action="" method="post" class="">
                <div>
                    <div>
                        <p>Cena</p>
                        <input type="text" name="minPrice" id="minPrice" placeholder="Min." pattern="\d*">
                        <input type="text" name="maxPrice" id="maxPrice" placeholder="Maks." pattern="\d*">
                    </div>
                    <div>
                        <p>Długość</p>
                        <input type="text" name="minLength" id="minLength" placeholder="Min." pattern="\d*">
                        <input type="text" name="maxLength" id="maxLength" placeholder="Maks." pattern="\d*">
                    </div>
                    <div>
                        <p>Rocznik</p>
                        <input type="text" name="minYear" id="minYear" placeholder="Min." pattern="\d*">
                        <input type="text" name="maxYear" id="maxYear" placeholder="Maks." pattern="\d*">
                    </div>
                    <div>
                        <p>Rodzaj łodzi</p>
                        <input type="radio" name="boatType" id="engineBoat" value="engine_boat">
                        <label for="engineBoat">Łódź motorowa</label>
                        <input type="radio" name="boatType" id="sailingBoat" value="sailing_boat">
                        <label for="sailingBoat">Łódź żaglowa</label>
                        <input type="radio" name="boatType" id="rowingBoat" value="rowing_boat">
                        <label for="rowingBoat">Łódź wiosłowa</label>
                    </div>
                    <div>
                        <input type="submit" value="Zastosuj">
                    </div>
                </div>
            </form>
        </div>


        <div class="middle">
            
            <div class="boats">
                <?php foreach($boats as $index => $b): ?>
                    <a href="./PHP/boat.php?id=<?= $b['id'] ?>" class="boat_card">
                        <div>
                            <h4><?= $b['model'] ?></h4>
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
                    <h3 class="full_name_right">Aleksander Michalski</h3>
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
                    <h3 class="full_name_left">Szymon Kołbus</h3>
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
                <div>
                    <span>E-mail: contact@boat-store.com</span>
                </div>
                <div>
                    <span>Numer Telefonu: +48 000 000 000</span>
                </div>
                <!-- Dałem, żeby nie wpisywać za każdym razem -->
                <a href="./PHP/admin_panel.php">ADMIN</a>
            </div>
            <?= var_dump($minLength, $maxLength, $minPrice, $maxPrice); ?>
        </div>
    </div>
</body>
</html>