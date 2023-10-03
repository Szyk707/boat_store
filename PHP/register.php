<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $password_repeat = $_POST['password_repeat'] ?? "";

    if(
        $email !== "" &&
        $password !== "" && 
        $password_repeat !== "" &&
        $password == $password_repeat
    ) {
        $stmt = $db -> query("INSERT INTO users VALUES(null, '$email', '$password', 0)");

        header("Location: ../index.php");
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
    <div>
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
                <label for="password_repeat">Powtórz Hasło</label>
                <input type="password" name="password_repeat" id="password_repeat">
            </div>
            <input type="submit" value="Zarejestruj">
        </form>
        <a href="../index.php">Powrót</a>
    </div>
</body>
</html>