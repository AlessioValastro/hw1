<?php
    include "auth.php"; 

    $response = array();

    if(isset($_GET['q'])) {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $file_id = mysqli_real_escape_string( $conn, $_GET['q'] );

        $query = "DELETE FROM files WHERE ID = '$file_id'";

        if(mysqli_query($conn, $query)) {
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['error'] = mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        $response['success'] = false;
        $response['error'] = "Nessun ID del file fornito";
    }

    // Restituisci la risposta JSON al frontend
    header('Content-Type: application/json');
    echo json_encode($response);
?>
