<?php
include "auth.php";

if (checkAuth()) {
    header("Location: profile.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"])) {

        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }

        $fileDestination = null;
        if ($_FILES['avatar']['size'] != 0) {
            $file = $_FILES['avatar'];
            $type = exif_imagetype($file['tmp_name']);
            $allowedExt = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
            if (isset($allowedExt[$type])) {
                $fileNameNew = uniqid('', true) . "." . $allowedExt[$type];
                $fileDestination = 'assets/' . $fileNameNew;
                if (move_uploaded_file($file['tmp_name'], $fileDestination)) {
                    echo "File uploaded successfully.<br>";
                } else {
                    $error[] = "Errore durante il caricamento del file";
                }
            } else {
                $error[] = "Formato immagine non valido";
            }
        }

        if (count($error) == 0) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query = "INSERT INTO users(username, email, password, avatar) VALUES('$username', '$email', '$password', '$fileDestination')";
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["user_id"] = mysqli_insert_id($conn);
                header("Location: profile.php");
                exit;
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            foreach ($error as $err) {
                echo "<p class='error'>$err</p>";
            }
        }
    } else {
        echo "Please fill all fields.<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
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
                <h2>Welcome</h2>
                <p>Are you ready for Unriddle.ai?</p>
            </div>
            <form name='signup' method='post' class="get-started__left--login" enctype="multipart/form-data">

            <div class="username">
                <input type='text' name='username' placeholder="Your username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                <span>Nome utente non disponibile</span>     
            </div>

            <div class="email">
                <input type='text' name='email' placeholder="Your email" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                <span>Indirizzo email non valido</span>
            </div>

            <div class="password">
                <input type='password' name='password' placeholder="Your password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                <span>Inserisci almeno 8 caratteri</span> 
            </div>

                <label for='avatar'>Scegli un'immagine profilo</label>
                <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                <?php if (isset($error)) {
                    foreach ($error as $err) {
                        echo "<p class='error'>" . $err . "</p>";
                    }
                } ?>
                <input type="submit" class="submit-button">
            </form>
            <div class="get-started__left--continue">
                <label for="sign-up">Do you have an account? <a href="log-in.php">Log-in</a></label>
            </div>
        </div>
    </div>
</section>
</body>
</html>
