<?php
session_start();
include("../PHP/config.php");

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
    <title>NUOVO VIDEO</title>
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

        <h6 class="text-success"><?php echo $esito; ?></h6>

        <h2 class="mt-5">Inserimento nuovo video</h2>
        <form class="div-form w-50" method="POST" action="../PHP/inserimento.php">


            <div class="input-group mb-3 mt-5 ">
                <span class="input-group-text" id="basic-addon1">Titolo</span>
                <input name="titolo" type="text" class="form-control" placeholder="Titolo video" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Regista</span>
                <input name="regista" type="text" class="form-control" placeholder="Nome regista" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Anno</span>
                <input name="anno" type="number" class="form-control" placeholder="Anno registrazione" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Trama</span>
                <textarea class="form-control" name="trama" aria-label="With textarea" required></textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Url immagine</span>
                <input name="url" type="text" class="form-control" placeholder="Url immagine" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tipologia</span>
                <select class="form-select text-black" aria-label="Default select example" name="tipologia" required>
                    <option selected>- - - - - - -</option>
                    <?php
                    $sql = "SELECT * FROM `Tipologia`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $tip = $row["tipologia"];
                            $id = $row["id"];
                            echo '<option name="tipologia" value="' . $id . '">' . $tip . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Genere</span>
                <select class="form-select" aria-label="Default select example" name="genere" required>
                    <option selected>- - - - - - -</option>
                    <?php
                    $sql = "SELECT * FROM `Genere`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $gen = $row["descrizione"];
                            $id_g = $row["id"];
                            echo '<option name="genere" value="' . $id_g . '">' . $gen . '</option>';
                        }
                    }

                    $conn = null;
                    ?>



                </select>
            </div>

            <button type="submit" class="btn btn-primary">Inserisci</button>

        </form>
    </center>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>