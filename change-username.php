<?php
include "auth.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["username"])) {

        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)) {
            $error[] = "Username non valido";
        } else {
            $user_id = $_SESSION['user_id'];
            $query = "SELECT username FROM users WHERE username = '$username' AND id != $user_id";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }

        if (count($error) == 0) {
            $query = "UPDATE users SET username = '$username' WHERE id = $user_id";
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $username;
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

        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Username</title>
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
                <p>Do you want to change your username?</p>
            </div>
            <form name='signup' method='post' class="get-started__left--login" enctype="multipart/form-data">

            <div class="username">
                <input type='text' name='username' placeholder="Your new username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                <span>Nome utente non disponibile</span>     
            </div>
            <?php 
                if (isset($error)) {
                    foreach ($error as $err) {
                    echo "<p class='error'>" . $err . "</p>";
                    }
                } 
            ?>
            <input type="submit" class="submit-button">
            </form>
        </div>
    </div>
</section>
</body>
</html>
