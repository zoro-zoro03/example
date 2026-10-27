<?php
$conn = new mysqli("localhost", "root", "", "db_js");

if($conn->connect_error){
    die("Connected Failed" . $conn->connect_error);
}
