<?php
include "auth.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["password"])) {

        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        }

        if (count($error) == 0) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $username = mysqli_real_escape_string($conn, $_SESSION['username']);
            $query = "UPDATE users SET password = '$password' WHERE username = '$username'";
            if (mysqli_query($conn, $query)) {
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
    <title>Change Password</title>
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
                <p>Do you want to reset your password?</p>
            </div>
            <form name='signup' method='post' class="get-started__left--login" enctype="multipart/form-data">

            <div class="password">
                <input type='password' name='password' placeholder="Your new password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                <span>Inserisci almeno 8 caratteri</span> 
            </div>

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
