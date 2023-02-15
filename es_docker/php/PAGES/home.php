<?php
session_start();
include("PHP/config.php");

if (!isset($_SESSION["nominativo"])) {
    header("Location: ../index.php");
}

if(isset($_GET["name"])){
    deleteSession();
}

$conn = null;

function deleteSession(){
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>HOME</title>
</head>

<body>
<nav class="navbar navbar-expand-lg fixed-top mb-5">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
      <img src="../IMAGES/Logo_Blockbuster.png" alt="Bootstrap" width="30" height="24">
    </a>
            <a class="navbar-brand" href="#">Blockbuster</a>
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
        <h2 class="mt-5">Benvenuto nella home del sistema di noleggio</h2>
    </center>


    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Inserimento nuovo video</h5>
                        <a href="nuovo.php" class="btn btn-primary mt-2">Clicca qui</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Nuovo noleggio</h5>
                        <a href="noleggio.php" class="btn btn-primary mt-2">Clicca qui</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Restituzione noleggio</h5>
                        <a href="#" class="btn btn-primary mt-2">Clicca qui</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gestisci tipologia video</h5>
                        <a href="nuovo.php" class="btn btn-primary mt-2">Clicca qui</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gestisci genere video</h5>
                        <a href="#" class="btn btn-primary mt-2">Clicca qui</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Visualizza tutti i video</h5>
                        <a href="lista.php" class="btn btn-primary mt-2">Clicca qui</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>