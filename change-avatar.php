<?php
include "auth.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['avatar']['size'] != 0) {

        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $fileDestination = null;
        
            $file = $_FILES['avatar'];
            $type = exif_imagetype($file['tmp_name']);
            $allowedExt = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
            if (isset($allowedExt[$type])) {
                $fileNameNew = uniqid('', true) . "." . $allowedExt[$type];
                $fileDestination = 'assets/' . $fileNameNew;
                if (move_uploaded_file($file['tmp_name'], $fileDestination)) {
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    // Aggiorna il percorso dell'avatar nel database
                    $query = "UPDATE users SET avatar = '$fileDestination' WHERE username = '$username'";
                    if (mysqli_query($conn, $query)) {
                        header("Location: profile.php");
                        exit;
                    } else {
                        $error[] = "Errore durante l'aggiornamento dell'avatar nel database";
                    }
                } else {
                    $error[] = "Errore durante il caricamento del file";
                }
            } else {
                $error[] = "Formato immagine non valido";
            }
          
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Avatar</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="styles/sign-up.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script defer src="sign-up.js"></script>
</head>
<body>
<section class="get-started">
    <div class="get-started__content">
        <img src="public/profile/vector2.svg" alt="" id="exit-cross">
        <div class="get-started__content--left">
            <div class="get-started__left--intro">
                <img src="public/vector4.svg" alt="unriddle-logo">
                <h2>Hi</h2>
                <p>Do you want to change your avatar?</p>
            </div>
            <form name='signup' method='post' class="get-started__left--login" enctype="multipart/form-data">
                <label for='avatar'>Scegli un'immagine profilo</label>
                <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                <?php if (isset($error)) {
                    foreach ($error as $err) {
                        echo "<p class='error'>" . $err . "</p>";
                    }
                } ?>
                <input type="submit" class="submit-button">
            </form>
        </div>
    </div>
</section>
</body>
</html>
