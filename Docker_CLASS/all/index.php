<?php
include_once './config/connectDB.php';
include_once './object/student.php';
include_once './object/classe.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri = ltrim($uri, "/");
$uri = rtrim($uri, "/");
$uri = explode("/", $uri);
$second = strtolower($uri[1]);

$count = count($uri);
switch ($count) {
    case 1:
        if ($uri[0] == "students") {
            switch ($method) {
                case "GET":
                    require __DIR__ . "/api/student/read.php";
                    break;

                case "POST":
                    $database = new Db();
                    $db = $database->getConnection();
                    $studente = new studente($db);
                    $data = json_decode(file_get_contents("php://input", true));
                    // set studente property value
                    $studente->codice_fiscale = $data->codice_fiscale;
                    $studente->cognome = $data->cognome;
                    $studente->nome = $data->nome;
                    $studente->data_nascita = $data->data_nascita;
                    $studente->id_classe = $data->id_classe;
                    require __DIR__ . "/api/student/create.php";
                    break;
            }
        } else if ($uri[0] == "class") {
            switch ($method) {
                case "GET":
                    require __DIR__ . "/api/class/read.php";
                    break;

                case "POST":
                    $database = new Db();
                    $db = $database->getConnection();
                    $classe = new classe($db);
                    $data = json_decode(file_get_contents("php://input", true));
                    // set classe property value
                    $classe->anno = $data->anno;
                    $classe->sezione = $data->sezione;
                    $classe->spec = $data->spec;
                    require __DIR__ . "/api/class/create.php";
                    break;
            }
        }

        break;


    case 2:
        if ($uri[0] == "students") {
            $id = $uri[1];
            switch ($method) {
                case "GET":
                    $student_id = $id;
                    require __DIR__ . "/api/student/readOne.php";
                    break;

                case "DELETE":
                    $student_id = $id;
                    require __DIR__ . "/api/student/delete.php";
                    break;

                case "PATCH":
                    $data = json_decode(file_get_contents("php://input", true));
                    $database = new Db();
                    $db = $database->getConnection();
                    $studente = new studente($db);

                    $studente->id = $uri[1];
                    $studente->nome = $data->nome;
                    $studente->cognome = $data->cognome;
                    $studente->data_nascita = $data->data_nascita;
                    $studente->codice_fiscale = $data->codice_fiscale;
                    $studente->id_classe = $data->id_classe;

                    require __DIR__ . "/api/student/update.php";
                    break;
            }
            break;
        } else if ($uri[0] == "class") {
            $id = $uri[1];
            switch ($method) {
                case "GET":
                    require __DIR__ . "/api/class/readOne.php";
                    break;

                case "DELETE":
                    require __DIR__ . "/api/class/delete.php";
                    break;

                case "PATCH":
                    $data = json_decode(file_get_contents("php://input", true));
                    $database = new Db();
                    $db = $database->getConnection();
                    $classe = new classe($db);

                    $classe->id = $uri[1];
                    $classe->anno = $data->anno;
                    $classe->sezione = $data->sezione;
                    $classe->spec = $data->spec;

                    require __DIR__ . "/api/class/update.php";
                    break;
            }
        }

    case 3:
        if ($uri[0] == "class") {
            $id = $uri[1];
            if($uri[2] == "students"){
                switch ($method) {
                    case "GET":
                        require __DIR__ . "/api/class/getStudentsClass.php";
                        break;
                }
            }
            
        }
}
