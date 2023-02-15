<?php
session_start();
include("../PHP/config.php");

if (!isset($_SESSION["nominativo"])) {
    header("Location: ../index.php");
}

if (isset($_GET["name"])) {
    deleteSession();
}

$film = $_POST["name"];
$sql = "SELECT * FROM `Video` WHERE titolo = '$film'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo $url = '../IMAGES/'.$row["url_img"].'.jpeg';
        $regista = $row["regista"];
        $trama = $row["trama"];
    }


function deleteSession()
{
    session_start();
    session_destroy();
    header("Location: ../index.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="" type="text/css">
    <title><?php echo $titolo?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg mb-5 w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="../IMAGES/Logo_Blockbuster.png" alt="Bootstrap" width="30" height="24">
            </a>
            <a class="navbar-brand" href="home.php">Blockbuster</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <div class="dropdown-center">
                        <a class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION["nominativo"] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Gestisci profilo</a></li>
                            <li><a class="dropdown-item" href="#">Action two</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="home.php?name=true">Logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <center>
        <h3 class="mb-5">Specifiche del film <?php ?></h3>
        <hr class="w-50">
    </center>

    
    <div class="container mt-5 ">
  <div class="row">
    <div class="col">
      <h5>TITOLO FILM: </h5>
      <h5 class="mt-3">REGISTA: </h5>
      <h5 class="mt-3">ANNO: </h5>
      <h5 class="mt-3">DURATA: </h5>
      <h5 class="mt-3">TRAMA: </h5>
      
    </div>
    
    <div class="col">
      <img src="../IMAGES/img_01.jpeg">
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>