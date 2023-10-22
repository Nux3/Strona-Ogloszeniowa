<?php
session_start();

if (isset($_SESSION['login'])) {

    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $logout = "Logout";
}
else{
    $fname = " ";
    $lname = " ";
    $logout =" ";
}
?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal ogłoszeniowy</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>

<div class="brand">
    <span style="float: right;">
        <a href="logout.php"><?php echo $logout ?></a>
    </span>
    Portal ogłoszeniowy
</div>

    <?php require_once 'nav.php'; ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">


                    </div>
                    <h2 class="brand-before">
                        <small>Witaj na</small>
                    </h2>
                    <h1 class="brand-name">Portalu ogloszeniowym <?php echo $fname; echo " "; echo $lname; ?></h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>Jakub Koniusz</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
  
                    <hr class="visible-xs">
                    <p>Witaj na naszym portalu ogłoszeniowym, miejscu, gdzie możesz znaleźć interesujące ogłoszenia z różnych kategorii. Nasza strona jest pełna bogatych możliwości i przyjazna dla użytkowników, zapewniając łatwą nawigację i szybkie znalezienie potrzebnych informacji.</p>
                    </div>
            </div>
        </div>

    </div>



</body>

</html>
<?php


?>
