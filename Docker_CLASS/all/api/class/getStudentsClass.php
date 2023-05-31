<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once './config/connectDB.php';
include_once './object/classe.php';

// instantiate database and classe object
$database = new Db();
$db = $database->getConnection();

// initialize object
$classe = new classe($db);

// query classe
$stmt = $classe->readStudentsClass($id);
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // classe array
    $classe_arr = array();
    $classe_arr["students"] = array();

    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        extract($row);
        $student_item = array(
            "id" => $row["id"],
            "nome" => $row['nome'],
            "cognome" => $row['cognome'],
            "codiceFiscale" => $row['codice_fiscale'],
            "dataNascita" => $row['data_nascita']
        );
        
        array_push($classe_arr["students"], $student_item);
    }
    echo json_encode($classe_arr);
} else {
    echo json_encode(
            array("message" => "No products found.")
    );
}