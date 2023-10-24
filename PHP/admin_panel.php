<?php
    session_start();

    $permission = $_SESSION['permission'] ?? null;

    if($permission == null || $permission == 0)
    {
        header("Location: ../index.php");
    }

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    $stmt = $db -> query("SELECT id, model FROM boats");
    $boatData = $stmt->fetchAll();
    
    $submitError = $_SESSION['submitError'] ?? null;
    $imageSubmitError = $_SESSION['imageSubmitError'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATMIN</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="flex-row">
        <div class="admin-left align_center">
            <?php if($submitError !== null): ?>
                <b><?= $submitError?></b>
            <?php endif ?>
            <div>
                <h2 class="add-boat">Dodaj Łódź</h2>
                <form action="add_boat.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="boatModel" class="filter_header">Model Łodzi</label>
                        <input type="text" name="boatModel" id="boatModel" class="filter_input width_large" autocomplete="off">
                    </div>
                    <div>
                        <label for="boatPrice" class="filter_header">Cena Łodzi</label>
                        <input type="text" name="boatPrice" id="boatPrice" pattern="\d*(\.\d{0,2})?$" class="filter_input width_large" autocomplete="off">
                    </div>
                    <div>
                        <label for="boatYear" class="filter_header">Rok Produkcji</label>
                        <input type="text" name="boatYear" id="boatYear" class="filter_input width_large">
                    </div>
                    <div>
                        <label for="boatLength" class="filter_header">Długość Łodzi</label>
                        <input type="text" name="boatLength" id="boatLength" pattern="\d*(\.\d{0,2})?$" class="filter_input width_large" autocomplete="off"> 
                    </div>
                    <div>
                        <label for="boatWidth" class="filter_header">Szerokość Łodzi</label>
                        <input type="text" name="boatWidth" id="boatWidth" pattern="\d*(\.\d{0,2})?$" class="filter_input width_large" autocomplete="off">
                    </div>
                    <div>
                        <label for="boatHeight" class="filter_header">Wysokość Łodzi</label>
                        <input type="text" name="boatHeight" id="boatHeight" pattern="\d*(\.\d{0,2})?$" class="filter_input width_large" autocomplete="off">
                    </div>
                    <div>
                        <label for="boatEngine" class="filter_header">Silnik</label>
                        <input type="text" name="boatEngine" id="boatEngine" class="filter_input width_large" autocomplete="off">
                    </div>
                    <div>
                        <label for="horsePower" class="filter_header">Moc Silnika</label>
                        <input type="text" name="horsePower" id="horsePower" pattern="\d*" class="filter_input width_large" autocomplete="off">
                    </div>
                    <div>
                        <label for="boatCategory" class="filter_header">Rodzaj Łodzi</label>
                        <select name="boatCategory" id="boatCategory" class="filter_input width_large">
                            <option value="rowing_boat">Łódź wiosłowa</option>
                            <option value="sailing_boat">Łódź żaglowa</option>
                            <option value="engine_boat">Łódź motorowa</option>
                        </select>
                    </div>
                    <div>
                        <label for="fuel" class="filter_header">Rodzaj Paliwa</label>
                        <select name="fuel" id="fuel" class="filter_input width_large">
                            <option value="gas">Benzyna</option>
                            <option value="electric">Prąd</option>
                            <option value="diesel">Diesel</option>
                            <option value="other">Inne</option>
                        </select>
                    </div>
                    <div>
                        <label for="mainImg" class="filter_header">Obraz: </label>
                        <input type="file" name="mainImg" id="mainImg" accept="image/*">
                    </div>
            </div>
                <div>
                    <p class="filter_header">Opis</p>
                    <textarea name="description" id="description" cols="60" rows="20" maxLength="6000" spellcheck="false" class="description_input"></textarea>
                </div>
                <div>
                    <input type="submit" value="Dodaj" class="filters_submit">
                </div>
            </form>
        </div>
        <div class="align_center admin-center justify-start">
            <h2 class="add-boat">Dodaj Zdjęcia</h2>
            <?php if($imageSubmitError !== null): ?>
                <?= $imageSubmitError ?>
            <?php endif; ?>
            <form action="add_images.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="boat" class="filter_header">Łódź</label>
                    <select name="boat" id="boat" class="filter_input width_large">
                        <?php foreach ($boatData as $boat): ?>
                            <option value="<?= $boat['id'] ?>"><?= $boat['id'] . " - " . $boat['model'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="images" class="filter_header">Zdjęcia</label>
                    <input type="file" name="images[]" id="images" multiple="true">
                </div>
                <div class="align_center mt-S">
                    <input type="submit" value="Dodaj" class="filters_submit">
                </div>
            </form>
        </div>
        <div>
            <a href="../index.php" class="return">POWRÓT</a>
        </div>
    </div>
</body>
</html>