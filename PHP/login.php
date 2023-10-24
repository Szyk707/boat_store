<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $email = $_POST["email"] ?? null;
    $password = $_POST['password'] ?? null;

    $error = null;

    if($email !== null && $password !== null)
    {
        $stmt = $db -> query("SELECT * FROM users WHERE users.email = '$email'");
        $user = $stmt -> fetch();
        if($user)
        {
            if($password != $user['password'])
            {
                $error = "Niepoprawny e-mail lub hasło";
            }
            else
            {
                $_SESSION['uId'] = $user['id'];
                $_SESSION['permission'] = $user['permission'];
                $_SESSION['email'] = $user['email'];
        
                header("Location: ../index.php");
            }
        }
        else
        {
            $error = "Niepoprawny e-mail lub hasło";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <img src="../images/background_sea.png" alt="" class="background_sea top-0">

    <div class="full align_center">
        <div class="login_card">
            <h2 class="login_title">Wprowadź dane</h2>
            <form action="" method="post">
                <div>
                    <input type="text" name="email" id="email" class="filter_input width_large" placeholder="E-mail" autocomplete="off">
                </div>
                <div>
                    <input type="password" name="password" id="password" class="filter_input width_large" placeholder="Hasło">
                </div>
                <div class="align_center">
                    <input type="submit" value="Zaloguj" class="filters_submit margin_top">
                </div>
                <div>
                    <?php if($error !== null): ?>
                        <p class="error"><?= $error ?><p>
                    <?php endif; ?>
                </div>
            </form>
            <a href="../index.php" class="return">POWRÓT</a>
        </div>
    </div>
</body>
</html>