 <?php 

include "connection.php";

$id = $_GET["id"];
$stmt = $conn->prepare("DELETE FROM info where id = ? ");
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: index.php"); 