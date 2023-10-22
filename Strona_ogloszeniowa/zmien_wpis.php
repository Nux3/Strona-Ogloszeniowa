<?php
session_start();

if (isset($_SESSION['login'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'perfectcup');

    if (!$conn) {
        die("Połączenie nieudane: " . mysqli_connect_error());
    }

    if (isset($_POST['id_wpisu'])) {
        $id_wpisu = $_POST['id_wpisu'];


        $zmien_zapytanie = "UPDATE ogloszenia SET schowane = 1 WHERE ID_ogloszenia = $id_wpisu";


        if (mysqli_query($conn, $zmien_zapytanie)) {
            header("location: moje.php");
        } else {
            echo "Błąd podczas zmieniania wpisu.";
        }
    }

    mysqli_close($conn); 
} else {
    header("location: index.php");
}
?>