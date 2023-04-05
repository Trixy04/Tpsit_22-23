<?php
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri = ltrim($uri, "/");
$uri = rtrim($uri, "/");
$uri = explode("/", $uri);
$second = strtolower($uri[1]);

$count = count($uri);
switch($count){

    case 1:
        if($uri[0] == "students"){
            switch($method){
                case "GET":
                    require __DIR__ . "/api/student/read.php";
                    break;
            }
            break;
        }

    case 2:
        if($uri[0] == "students"){
            $id = $uri[1];
            switch($method){
                case "GET":
                    $student_id = $id;
                    require __DIR__ . "/api/student/readOne.php";
                    break;
            }
            break;
        }
}
