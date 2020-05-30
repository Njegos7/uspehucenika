<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Uspeh učenika</title>
<link rel="stylesheet" href="css/stil.css">
<link href="https://fonts.googleapis.com/css2?family=Sen:wght@300;500;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800&display=swap" rel="stylesheet">
<style>
    th, td, tr{
    padding: 20px 20px;
    width: 20%;
    position: relative;
    border: 2px solid;
    font-family: 'Montserrat', sans-serif;
    }
</style>
</head>
<body>
    <nav class="navigacija">
    <ul>
        <li><span>Početna</span></li>
        <li><a href="grafika.php">Grafika</a></li>
        <li><a href="oautoru.php">O autoru</a></li>
    </ul>
    </nav>
    
    <h1>Uspeh učenika</h1>
    
    <?php
    //naredba za kreiranje tabele
    echo "<table>";
    //kreiramo tabelu i heder
    echo "<tr > <th> Razred </th> <th> Odlican </th> <th> Vrlodobar </th> <th> Dobar </th> <th> Dovoljan </th> <th> Nedovoljan </th> <th> ProsOcena </th>";
    
    $sql = " SELECT * FROM Ucenici ";
    $st=$conn->prepare($sql);
    $st->execute();
    //uzimamo broj redova
    $total=$st->rowCount();
    if($total < 1)
    {
        //greske se ispisu kada nema unetih podataka
        echo "<tr> <td style> Nema podataka: Prazna je baza. </td>";
        echo "<td> Nema podataka: Prazna je baza. </td>";
        echo "<td> Nema podataka: Prazna je baza. </td>";
        echo "<td> Nema podataka: Prazna je baza. </td>";
        echo "<td> Nema podataka: Prazna je baza. </td>";
        echo "<td> Nema podataka: Prazna je baza. </td>";
        echo "<td> Nema podataka: Prazna je baza. </td>";
    }
    else{
        while($res = $st->fetchObject()){
            echo "<tr>";
            echo " <td> $res->Razred </td> <td> $res->Odlican </td> <td> $res->Vrlodobar </td> <td> $res->Dobar </td> <td> $res->Dovoljan</td> <td> $res->Nedovoljan </td> <td> $res->ProsOcena </td>";
            echo "</tr>";
        }
    }
    ?>
        
</body>
</html>    