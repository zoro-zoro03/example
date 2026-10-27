<?php

include "connection.php";
$id = $_POST["editID"];
$fname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$age = $_POST["age"];
$birthdate  = $_POST["birthdate"];

$stmt = $conn->prepare("UPDATE info  SET firstname = ?, middlename = ?,  lastname =?, email =?, age=?,  birthdate = ? WHERE id = ?");
$stmt->bind_param("ssssisi", $fname, $middlename, $lname, $email, $age, $birthdate, $id);

if($stmt->execute()){
    echo json_encode([
        "success" => true,
       // "id" => $conn->insert_id,
       // "firstname" => $fname
    ]);
}else{
    echo json_encode([
        "success" => false
    ]);
}


