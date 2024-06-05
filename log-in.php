<?php
    include 'auth.php';
    if (checkAuth()) {
        header('Location: profile.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $query = "SELECT * FROM users WHERE username = '".$username."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
            
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST["password"], $entry["password"])) {

                $_SESSION["username"] = $entry["username"];
                $_SESSION["user_id"] = $entry["ID"];
                header("Location: profile.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        
        $error = "Inserisci username e password.";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unriddle | Login</title>
    <link rel="icon" href="public/vector4.svg">
    <link rel="stylesheet" href="styles/log-in.css" />
    
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <script defer src="log-in.js" ></script>

</head>
<body>
<section class="get-started">
        <div class="get-started__content">
          <a href="index.php"><img src="public/profile/vector2.svg" alt="" id="exit-cross"></a>
          <div class="get-started__content--left">
            <div class="get-started__left--intro">
              <img src="public/vector4.svg" alt="unriddle-logo" />
              <h2>Welcome Back</h2>
              <p>Are you ready for Unriddle.ai?</p>
            </div>

            <form name="login" method="post" class="get-started__left--login">
              
                <input type="text" placeholder="Your username" name="username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                <input type="password" placeholder="Your password" name="password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                
                <?php
                    if (isset($error)) {
                        echo "<p class='error'>$error</p>";
                    }  
                ?>
              
              <div class="get-started__login--more">
                <label for="remember">
                  <input type="radio" />
                  Remember me
                </label>
                <a href="">Forget Password?</a>
              </div>
              <input type="submit" class="submit-button"></input>
            </form>

            <div class="get-started__left--divisore">
              <div class="get-started__divisore--line"></div>
              <label for="or">OR</label>
              <div class="get-started__divisore--line"></div>
            </div>

            <div class="get-started__left--continue">
              <button>
                <img
                  src="public/google-icon-logo-svgrepo-com.svg"
                  alt="google-logo"
                />Continue with Google
              </button>
              <label for="sign-up"
                >Do not have an account? <a href="sign-up.php">Sign up</a></label
              >
            </div>
          </div>
        </div>
      </section>
</body>
</html>