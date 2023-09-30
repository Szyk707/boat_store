<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $search = $_GET['search'] ?? null;

    $length = $_POST['length'] ?? [0, 100];

    if($search !== null) 
    {
        $stmt = $db -> query("  SELECT * FROM boats 
                                WHERE boats.model LIKE '%".$search."%'");
        $boats = $stmt -> fetchAll();
    }
    else 
    {
        $stmt = $db -> query("SELECT * FROM boats");
        $boats = $stmt -> fetchAll();
    }

    $stmt2 = $db -> query("SELECT file_path FROM images, boats WHERE boat_id = boats.id");
    $images = $stmt2 -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        <span class="title">Boat store</span>

        <div class="navbar">
            <form action="" method="get" class="search">
                <input type="text" name="search" id="search" class="search_input" placeholder="Search..">
                <button type="submit" class="search_icon"><img src="./images/search_icon.svg" alt="search"></button>
            </form>
            <a href="#about_us" class="menu">About us</a>
            <a href="" class="menu">Contact</a>
            <a href="" class="menu">Log in</a>
        </div>

    </div>



    <div class="content">
        
        <div class="side_bar">
            <h4>Filters</h4>
            <form action="" method="post" class="">
                <div>
                    <label for="length">Długość</label>
                    <label>
                        Do 5m
                        <input type="checkbox" name="length[]" value=<?php [0, 5] ?>>
                    </label>
                    <label>
                        od 5m do 10m
                        <input type="checkbox" name="length[]" value=">= 5 <= 10">
                    </label>
                    <label>
                        od 10m do 15m
                        <input type="checkbox" name="length[]" value=">= 10 <= 15">
                    </label>
                    <label>
                        od 15m do 20m
                        <input type="checkbox" name="length[]" value="15 20">
                    </label>
                    <label>
                        Ponad 20m
                        <input type="checkbox" name="length[]" value=">= 20">
                    </label>
                </div>
                <input type="submit" value="Zastosuj">
            </form>
        </div>


        <div class="middle">
            
            <div class="boats">
                <?php foreach($boats as $index => $b): ?>
                    <a href="./PHP/boat.php?id=<?= $b['id'] ?>" class="boat_card">
                        <div>
                            <h4><?= $b['model'] ?></h4>
                            <img src="<?= $images[0]['file_path'] ?>" alt="łódź" class="boat_card_img">
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
            


            <div class="footer">
                <!-- Dałem, żeby nie wpisywać za każdym razem -->
                <a href="./PHP/admin_panel.php">ADMIN</a>
            </div>
            
        </div>
    </div>



</body>
</html>
</body>
</html>