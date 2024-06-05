<?php
    include "auth.php"; 

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $data = mysqli_real_escape_string( $conn, $_GET['q'] );

    $query = "SELECT F.id, file_name FROM files F join users U on F.user = U.ID where file_name LIKE '$data%' LIMIT 8";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $library = array();

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $library[] = $row; 
        }
    }

    mysqli_free_result($res);
    mysqli_close($conn);

    echo json_encode($library);
?>