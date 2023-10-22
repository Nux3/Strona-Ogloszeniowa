<?php
session_start();

if (isset($_SESSION['login'])) {
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];


    $conn = mysqli_connect('localhost', 'root', '', 'perfectcup');

    if (!$conn) {
        die("Połączenie nieudane: " . mysqli_connect_error());
    }
    $Zapytanie = "SELECT id FROM members WHERE fname = '$fname' AND lname = '$lname'";
    $Odp_Zapytanie = $conn->query($Zapytanie);
    $row = $Odp_Zapytanie->fetch_assoc();
    $ID = $row['id'];

    $sql = "DELETE FROM members WHERE fname = '$fname' AND lname = '$lname'";
    $sql2 = "UPDATE ogloszenia JOIN members on ogloszenia.autor = members.id SET schowane = 1 WHERE ogloszenia.autor = $ID";
    mysqli_query($conn, $sql2) ;
    mysqli_query($conn, $sql) ;
    
   


 
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
} else {

    header("Location: index.php");
    exit;
}
?>