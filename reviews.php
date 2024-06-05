<?php
    include 'dbconfig.php';

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $query = "SELECT review_id, review_text, username, review_date,rating, avatar FROM reviews join users on user_id = ID";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $reviews = array();

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $reviews[] = $row; 
        }
    }

    mysqli_free_result($res);
    mysqli_close($conn);

    echo json_encode($reviews);
?>
