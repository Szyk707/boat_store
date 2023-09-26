<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $stmt = $db -> query("SELECT * FROM boats");
    $boats = $stmt -> fetchAll();

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img src="images/background_sea.png" alt="" class="background_sea">

    <div class="nav">
        <img src="images/captain.png" alt="captain" class="logo">
        <span class="title">Boat store</span>

        <div class="navbar">
            <form action="post" class="search">
                <input type="text" name="search" class="search_input" placeholder="Search..">
            </form>
            <a href="#about_us" class="menu">About us</a>
            <a href="" class="menu">Contact</a>
            <a href="" class="menu">Log in</a>
        </div>

    </div>



    <div class="content">
        
        <div class="side_bar">
            <h4>Filter the boats you love</h4>
            <form action="post">




            </form>
        </div>


        <div class="middle">
            
            <div class="boats">
                <?php foreach($boats as $index => $b): ?>
                    <a href="./PHP/boat.php?id=<?= $b['id'] ?>" class="boat_card">
                        <div>
                            <h4><?= $b['model'] ?></h4>
                            <img src="<?= $images[0]['file_path'] ?>" alt="łódź" class="boat_card_img">
                            <p>Cena: <?= $b['price'] ?></p>
                            <p>Silnik: <?= $b['engine'] ?></p>
                            <p>Moc Silnika: <?= $b['horse_power'] ?></p>
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
                    <h3>Aleksander Michalski</h3>
                    <span class="olek_description">1 Even though you're alone, value other people in your life. ...
                        2 Be in touch with your own power. ...
                        3 Be a silent leader. ...
                        4 Know how to adapt to new situations. ...
                        5 Treat everyone the same way. ...
                        6 Be yourself, even without a social circle. ...
                        7 Understand the importance of silence.</span>
                    <img src="images/rob.png" alt="" class="rob">
                </div>
                <div class="szymon">
                    <h3>Szymon Kołbus</h3>
                    <img src="images/ryan.png" alt="" class="ryan">
                    <span class="szymon_description">1 Even though you're alone, value other people in your life. ...
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