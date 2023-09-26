<?php
    session_start();

    // $isLoggedIn = $_SESSION['isLoggedIn'] ?? false;
    // if(!$isLoggedIn)
    // {
    //     header("Location: ./index.php");
    // }

    $submitError = $_SESSION['submitError'] ?? null;

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
        <?php if($submitError !== null): ?>
            <b><?= $submitError ?></b>
        <?php endif ?>
        <h2>Dodaj Łódź</h2>
        <form action="add_boat.php" method="post">
            <div>
                <label for="boatModel">Model Łodzi</label>
                <input type="text" name="boatModel" id="boatModel">
            </div>
            <div>
                <label for="boatPrice">Cena Łodzi</label>
                <input type="text" name="boatPrice" id="boatPrice" pattern="\d*(\.\d{0,2})?$">
            </div>
            <div>
                <label for="boatLength">Długość Łodzi</label>
                <input type="text" name="boatLength" id="boatLength" pattern="\d*(\.\d{0,2})?$">
            </div>
            <div>
                <label for="boatWidth">Szerokość Łodzi</label>
                <input type="text" name="boatWidth" id="boatWidth" pattern="\d*(\.\d{0,2})?$">
            </div>
            <div>
                <label for="boatHeight">Wysokość Łodzi</label>
                <input type="text" name="boatHeight" id="boatHeight" pattern="\d*(\.\d{0,2})?$">
            </div>
            <div>
                <label for="boatEngine">Silnik</label>
                <input type="text" name="boatEngine" id="boatEngine">
            </div>
            <div>
                <label for="horsePower">Moc Silnika</label>
                <input type="text" name="horsePower" id="horsePower" pattern="\d*">
            </div>
            <div>
                <label for="boatCategory">Rodzaj Łodzi</label>
                <br>
                <label for="rowingBoat">Łódź Wiosłowa</label>
                <input type="radio" name="boatCategory" id="rowingBoat" value="rowing_boat">
                <label for="sailingBoat">Łódź Żaglowa</label>
                <input type="radio" name="boatCategory" id="sailingBoat" value="sailing_boat">
                <label for="engineBoat">Łódź Motorowa</label>
                <input type="radio" name="boatCategory" id="engineBoat" value="engine_boat">
            </div>
            <div>
                <input type="submit" value="Dodaj">
            </div>
        </form>
        <form action="add_component.php" method="post">
            <h2>Dodaj Komponent</h2>
            <div>
                <label for="componentName">Nazwa</label>
                <input type="text" name="componentName" id="componentName">
            </div>
            <div>
                <label for="componentPrice">Cena</label>
                <input type="text" name="componentPrice" id="componentPrice">
            </div>
            <div>
                <label for="componentCategory">Kategoria</label>
                <br>
                <label for="engine">Silnik</label>
                <input type="checkbox" name="componentCategory" id="engine" value="engine">
            </div>
            <div>
                <input type="submit" value="Dodaj">
            </div>
        </form>
        <div>
            <a href="../index.php">WRÓĆ</a>
        </div>
    </div>
</body>
</html>