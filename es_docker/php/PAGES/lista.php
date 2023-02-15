<?php
session_start();
include("../PHP/config.php");

$gen = $_POST["genere"];

if (!empty($_POST["genere"])) {
    $sql = "SELECT * FROM `Video` WHERE genere = '$gen'";
    $result = $conn->query($sql);
    $tabella = "";

    while ($row = $result->fetch_assoc()) {
        $tabella .= "<tr>
    <td>" . $row["id"] . "</td>
    <td>" . $row["titolo"] . "</td>
    <td>" . $row["regista"] . "</td>
    <td> " . $row["anno"] . "</td>
    <td> " . $row["tipo"] . "</td>
    <td> " . $row["genere"] . "</td>
    </tr>";
    }

}else{

    $sql = "SELECT * FROM `Video`";
    $result = $conn->query($sql);
    $tabella = "";

    while ($row = $result->fetch_assoc()) {
        $tabella .= "<tr>
    <td>" . $row["id"] . "</td>
    <td>" . $row["titolo"] . "</td>
    <td>" . $row["regista"] . "</td>
    <td> " . $row["anno"] . "</td>
    <td> " . $row["tipo"] . "</td>
    <td> " . $row["genere"] . "</td>
    </tr>";
    }
    
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
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <title>Title</title>
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
        <h1 class="mt-5">Lista video</h1>
        <p>Clicca sul genere per visualizzare la tabella con i film</p>
        <form action="" method="POST">
        <select class="form-select text-black w-25" aria-label="Default select example" name="genere">
            <option value="">Tutti</option>
            <?php
            $sql = "SELECT descrizione FROM `Genere`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tip = $row["descrizione"];
                    echo '<option name="genere" value="' . $tip . '">' . $tip . '</option>';
                }
            }
            $conn = null;
            ?>
            
        </select>
        <button type="submit" class="btn btn-primary mt-3" name="gen">Filtra</button>

        </form>

        <table class="table table-striped mt-5 w-75">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Regista</th>
                    <th scope="col">Anno</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Genere</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tabella; ?>
            </tbody>
        </table>



    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>