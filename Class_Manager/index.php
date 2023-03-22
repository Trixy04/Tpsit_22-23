<?php
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri = ltrim($uri, "/");
$uri = rtrim($uri, "/");
$uri = explode("/", $uri);

$second = strtolower($uri[1]);

switch ($second){
    case "classi":
        echo "Si agisce sulle CLASSI";
        break;
    case "studenti":
        echo "Si agisce sugli STUDENTI";
        break;
}





?>