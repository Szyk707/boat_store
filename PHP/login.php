<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $email = $_POST["email"] ?? "";
    $password = $_POST['password'] ?? "";

    $error = null;

    if($email !== "" && $password !== "")
    {
        $stmt = $db -> query("SELECT * FROM users WHERE users.email = '$email'");
        $user = $stmt -> fetch();

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
        $error = "Wprowadź dane";
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
</head>
<body>
    <div>
        <?php if($error !== null): ?>
            <h2><?= $error ?></h2>
        <?php endif; ?>
        <form action="" method="post">
            <div>
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">Hasło</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <input type="submit" value="Zaloguj">
            </div>
        </form>
        <a href="./register.php">Zarejestruj się</a>
        <a href="../index.php">Powrót</a>
    </div>
</body>
</html>