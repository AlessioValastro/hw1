<?php
include 'auth.php';

$response = array();

if ($_FILES['file']['size'] != 0) {
    // Connessione al database
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    
    if (!$conn) {
        $response['error'] = "Errore di connessione al Database: " . mysqli_connect_error();
        echo json_encode($response);
        exit;
    }
    
    $fileName = mysqli_real_escape_string($conn, $_FILES['file']['name']);
    $fileSize = (int)$_FILES['file']['size'];
    $fileContent = mysqli_real_escape_string($conn, file_get_contents($_FILES['file']['tmp_name']));
    $userId = (int)$_SESSION['user_id'];
    
    // Query per inserire il file nel database
    $query = "INSERT INTO files(file_name, file_size, content, user) VALUES ('$fileName', '$fileSize', '$fileContent', '$userId')";
    
    if (mysqli_query($conn, $query)) {
        $response['message'] = "Caricamento completato";
    } else {
        $response['error'] = "Errore durante l'inserimento nel Database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $response['error'] = "Nessun file caricato.";
}
?>
