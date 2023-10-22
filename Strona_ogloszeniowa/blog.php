
<?php
session_start();

if (isset($_SESSION['login'])) {
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

$mysqli = new mysqli('localhost', 'root', '', 'perfectcup');

if ($mysqli->connect_error) {
    die('Error: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$licz = "SELECT COUNT(ID_ogloszenia) AS count FROM ogloszenia";
$result = $mysqli->query($licz);

if ($result === false) {
    echo "Blad zapytania: " . $mysqli->error;
} else {
    $row = $result->fetch_assoc();
    $count = intval($row['count']); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Portal ogloszeniowy</title>
    <style>
        body {
            background-color: blue; 
        }
    </style>

       <link href="css/bootstrap.min.css" rel="stylesheet">


<link href="css/business-casual.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
<div class="brand">Portal ogloszeniowy</div>
    <?php require_once 'nav.php'; ?>
<?php
for ($i = 0; $i < $count; $i++) {
    $Zapytanie1 = "SELECT tytul AS tytul FROM ogloszenia WHERE ID_ogloszenia = " . ($i+1) . " AND schowane = 0";
    $Zapytanie2 = "SELECT opis AS opis FROM ogloszenia WHERE ID_ogloszenia = " . ($i+1) . " AND schowane = 0";
    $Odp_Zapytanie1 = $mysqli->query($Zapytanie1);
    $Odp_Zapytanie2 = $mysqli->query($Zapytanie2);

    if ($Odp_Zapytanie1 && $Odp_Zapytanie1->num_rows > 0) { 
        $Odp1 = strval($Odp_Zapytanie1->fetch_assoc()['tytul']);
        $Odp2 = strval($Odp_Zapytanie2->fetch_assoc()['opis']);
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo    "<div class='box'>";
        echo "<div class='col-lg-12'>";
        echo "<h2><Center>" .   $Odp1 . "<br>" . "</h2>";
        echo "<center>" . $Odp2 . "<br>";
        echo "<hr>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}

$mysqli->close();
?>
</body>
</html>
<?php
} else {
    header("location:login.php");
}
?>