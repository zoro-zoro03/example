<?php

include "connection.php";

$id = $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM info WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows > 0){
    $record = $result->fetch_assoc();
    echo json_encode([
        "success" => true,
        "firstname" =>  $record["firstname"],
        "middlename"  => $record["middlename"],
        "lastname" => $record["lastname"],
        "email" => $record["email"],
        "age" => $record["age"],
        "birthdate"  => $record["birthdate"]
    ]);
}
