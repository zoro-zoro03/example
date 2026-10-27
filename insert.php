<?php 

include "connection.php";

$fname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lname = $_POST["lastname"];
$email = $_POST["email"];
$age = $_POST["age"];
$birthdate  = $_POST["birthdate"];

$stmt = $conn->prepare("INSERT INTO info (firstname, middlename,  lastname, email, age,  birthdate) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssis", $fname, $middlename, $lname, $email, $age, $birthdate);

if($stmt->execute()){
    echo json_encode([
        "success" => true,
        "id" => $conn->insert_id,
        "firstname" => $fname
    ]);
}else{
    echo json_encode([
        "success" => false
    ]);
}