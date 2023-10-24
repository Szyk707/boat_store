<?php
    session_start();

    $permission = $_SESSION['permission'] ?? null;

    if($permission == null || $permission == 0)
    {
        header("Location: ../index.php");
    }

    $db = new PDO('mysql:host=localhost;dbname=boat_store', 'root', '');

    (!empty($_POST['boat'])) ? $id = $_POST['boat'] : null;
    (!empty($_FILES)) ? $files = false : true;

    if($id == null || $files)
    {
        header("Location: ./admin_panel.php");
        $_SESSION['imageSubmitError'] = "Problem uploading";
    }

    $targetDir = "../images/";
    $images = $_FILES['images'];
    $fileCount = count($images['name']);
    for ($i = 0; $i < $fileCount; $i++)
    {
        $path = $targetDir . $images['name'][$i];
        $db -> query("INSERT INTO images VALUES('$id', '$path', null)");
        if(!file_exists($path))
        {
            move_uploaded_file($images['tmp_name'][$i], $path);
        }
    }
    

    header("Location: ./admin_panel.php");
?>