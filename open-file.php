<?php
include "dbconfig.php";
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

if (!$conn) {
    die("Errore di connessione al Database: " . mysqli_connect_error());
}

if (isset($_GET["id"])) {
    $file_id = $_GET["id"];
    $query = "SELECT file_name, content FROM FILES WHERE ID = '".$file_id."'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fileName = $row['file_name'];
        $fileContent = $row['content'];

        header("Content-Type: application/pdf");
        header("Content-Disposition: inline; filename=\"$fileName\"");
        header("Content-Length: " . strlen($fileContent));
        
        echo $fileContent;

        mysqli_free_result($result);
        mysqli_close($conn);
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "No file ID provided.";
}
?>
