<?php 
    include 'auth.php';
    if (!checkAuth()) {
        header("Location: log-in.php");
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $userid = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id = '$userid'";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);   
    
?>

<html lang="en">
 <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Unriddle | Faster research</title>
    <link rel="icon" href="public/vector4.svg">
    
    <link rel="stylesheet" href="styles/profile.css" />
    <link rel="stylesheet" href="index.css" />
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <script defer src="profile.js" ></script>
  </head>

 <body>
        <nav>
          <section class="profile__nav">
            <div class="nav__section--logo">
              <img src="public/profile/vector13.svg" alt="" class="humburger">
              <img src="public/vector5.svg" alt="" class="nav__logo--unriddle" />
            </div>
            <div class="profile__nav--menu">
              <img src="<?php echo $userinfo['avatar'] == null ? "assets/default_avatar.png" : $userinfo['avatar'] ?>" alt="" class="avatar">
              <div class="profile-managment">
                <a href="change-username.php">Change username</a>
                <a href="change-password.php">Change password</a>
                <a href="change-avatar.php">Change avatar</a>
                <a href="delete-profile.php" style="color: red">Delete your profile</a>
              </div>
              
              <button id="support">Support</button>
              <button><a href="log-out.php" id="logout">Log out</a></button>
              <img src="public/profile/vector6.svg" alt="">
            </div>
          </section>
        </nav>
      <main>
        <header class="profile__welcome">
          <h1>Welcome to unriddle 
            <?php echo $_SESSION["username"]?></h1>
          <p>Import a document to understand its contents or start writing in a new note.</p>
          <div class="profile__welcome--grid">
            <div class="profile__grid--block">
              <img src="public/profile/vector12.svg" alt="">
              <div class="profile__block--description">
                <h3>Write</h3>
                <p>Create a new note</p>
              </div>  
            </div>
            <div class="profile__grid--block"         id="import-new-file">
              <img src="public/profile/vector14.svg" alt="">
              <div class="profile__block--description" >
                <h3>Import</h3>
                <p>Add files into your library</p>
              </div> 
            </div>
            <div class="profile__grid--search">
              <form name="library-search" class="library__search">
                  <label for="search" class="search-bar">
                  <input type="text"  placeholder="Search your library..." id="search-your-library">
                  <a href="">Ask AI</a>
                  <p>Tab</p>
                </label>
              </form>
              <div class="library">
              </div>
            </div>
            <div class="profile__grid--review">
            <form name="review-box" class="review__box" method="post">
    <textarea name="review_text" placeholder="Scrivi la tua recensione..."><?php if(isset($_POST["review_text"])){echo $_POST["review_text"];} ?></textarea>
    
    <div class="rating">
        <?php
        $rating = isset($_POST["review_rating"]) ? $_POST["review_rating"] : "";
        ?>
        <input type="radio" id="star5" name="review_rating" value="5" <?php echo ($rating == '5') ? 'checked' : ''; ?>/>
        <label title="Eccellente!" for="star5">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                      <path
                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"
                      ></path>
                    </svg>
        </label>
        <input type="radio" id="star4" name="review_rating" value="4" <?php echo ($rating == '4') ? 'checked' : ''; ?>/>
        <label title="Ottimo!" for="star4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                      <path
                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"
                      ></path>
                    </svg>
        </label>
        <input type="radio" id="star3" name="review_rating" value="3" <?php echo ($rating == '3') ? 'checked' : ''; ?>/>
        <label title="Buono" for="star3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                      <path
                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"
                      ></path>
                    </svg>
        </label>
        <input type="radio" id="star2" name="review_rating" value="2" <?php echo ($rating == '2') ? 'checked' : ''; ?>/>
        <label title="Discreto" for="star2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                      <path
                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"
                      ></path>
                    </svg>
        </label>
        <input type="radio" id="star1" name="review_rating" value="1" <?php echo ($rating == '1') ? 'checked' : ''; ?>/>
        <label title="Pessimo" for="star1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                      <path
                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"
                      ></path>
                    </svg>
        </label>
    </div>
    <input type="submit" id="submit-review">
</form>
            </div>
          </div>
        </header>
        <div class="import-file__box display-none">
          <form name="import" method="post" class="import-file__box--form" enctype="multipart/form-data">
            <label for="file"><img src="public/profile/import-icon.svg" alt="">Import a file</label>
            <input type="file" name="file" accept=".pdf" id="file" required>
            <span class="file-name" id="fileName"></span>
            <input type="submit" name="import-submit">
          </form>

        </div>
      </main>
      
</body>
</html>