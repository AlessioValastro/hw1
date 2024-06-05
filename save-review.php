<?php
include "auth.php";

if(isset($_POST["review_text"]) && isset($_POST["review_rating"])){
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $text = mysqli_real_escape_string($conn, $_POST['review_text']);
    $rating = mysqli_real_escape_string($conn, $_POST['review_rating']);
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO reviews(user_id, review_text, rating) VALUES('$user_id','$text','$rating')";

    if(mysqli_query($conn, $query)){
        echo json_encode(["message" => "Recensione caricata"]);
        mysqli_close($conn);    
        exit;
    } else {
        echo json_encode(["error" => "Errore durante il caricamento della recensione: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["error" => "I campi review_text e review_rating non sono stati inviati correttamente."]);
}
?>