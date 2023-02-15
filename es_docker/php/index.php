<?php
session_start();
include("PHP/config.php");

if((isset($_SESSION["nominativo"]))){
    header("Location: Pages/home.php");
}else{

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $pw = $_POST["password"];

    $email = stripcslashes($email);
    $pw = stripcslashes($pw);

    $sql = "SELECT email, nome, cognome FROM userData WHERE email = '$email' and pass = '$pw'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    $_SESSION["nominativo"] = $row["cognome"] . " " . $row["nome"];

    if ($count == 1) {
        $email = "";
        $pw = "";
        header("location: Pages/home.php");
    } else {
        $string = "Email o password non corretti";
    }
}
}


$conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="959771836111-fstgsvtee13gq9cekh4m1o4v0l0anats.apps.googleusercontent.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="Pages/assets/css/style.css" type="text/css">

    <title>HOME - LOGIN </title>
</head>

<body class="parent body">
    <div class="form">
        <center>
            <h4 class="fst-italic mb-2">Login Page</h4>

        </center>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <center><button type="submit mt-2" class="btn btn-primary">Submit</button></center>
        </form>
        <p class="mt-2">Non sei ancora registrato? Clicca <a href="Pages/register.php">qui</a></p>

        <p>Oppure accedi con Google</p>

        <div id="g_id_onload"
         data-client_id="959771836111-fstgsvtee13gq9cekh4m1o4v0l0anats.apps.googleusercontent.com"
         data-ux_mode="redirect"
         data-login_uri="http://localhost/Es_12/Pages/home.php">
    </div>

    <div class="g_id_signin" data-shape="pill" data-type="standard"></div>
    </div>

    </div>

    <script src="JS/main.js"></script>
    <script src="https://accounts.google.com/gsi/client" onload="console.log('TODO: add onload function')"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>