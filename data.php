<?php

/*require 'db.php';

$querytest = $database->query("SELECT Odlican, Vrlodobar, Dobar, Dovoljan, Nedovoljan, ProsOcena FROM Ucenici");

$labels = [];

foreach($querytest as $element){
    array_push($labels, $element[2]);
}

echo json_encode($labels);*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Skola";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error)
{
    die("Neuspesno povezivanje: " . $conn->connect_error);
}

$sql = "SELECT Odlican, Vrlodobar, Dobar, Dovoljan, Nedovoljan, ProsOcena FROM Ucenici";

$result = mysqli_query($conn, $sql);
$data = array();

foreach($result as $row)
{
    $data[] = $row;
}

$result->close();
$conn->close();

echo json_encode($data);

?>