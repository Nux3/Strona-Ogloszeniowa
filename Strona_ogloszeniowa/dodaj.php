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
    

    if (isset($_POST['ftytul']) && isset($_POST['fopis'])) {
        $tytul = $_POST['ftytul'];
        $opis = $_POST['fopis'];
       

        $sql = "INSERT INTO ogloszenia (tytul, opis, autor) VALUES ('$tytul', '$opis', '$ID')";

        if (mysqli_query($conn, $sql)) {
            echo "success";
        } else {
            echo "error";
        }
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#Dodaj_wpis").click(function(e) {
                e.preventDefault();

                var tytul = $("#ftytul").val();
                var opis = $("#fopis").val();

                $.ajax({
                    type: "POST",
                    url: "<?php echo $_SERVER['PHP_SELF']; ?>",
                    data: {
                        ftytul: tytul,
                        fopis: opis
                    },
                    success: function(response) {
                        if (response == "success") {
                            alert("Dodano wpis do tablicy ogłoszeń.");
                            $("#ftytul").val("");
                            $("#fopis").val("");
                        } else {
                            alert("Wystąpił błąd podczas dodawania wpisu.");
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
<div class="brand">Portal ogloszeniowy</div>

    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Dodaj ogłoszenie</strong>
                    </h2>
					<div id="add_err2"></div>
                    <hr>       
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Tytul ogloszenia :</label>
                                <input type="text" id="ftytul" name="ftytule" maxlength="100" class="form-control">
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Opis ogloszenia :</label>
                                <input type="text" id="fopis" name="fopis" maxlength="500" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" id="Dodaj_wpis" class="btn btn-default">Dodaj wpis</button>
                            </div>
                        </div>
                    </form>
                </div>
</body>

</html>

<?php
} else {
    header("location:login.php");
}
?>
