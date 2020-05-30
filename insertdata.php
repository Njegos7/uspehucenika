<?php

require_once("db.php");
try{
    $conn->beginTransaction();
    $conn->exec("INSERT INTO Uspeh(Razred, Odlican, Vrlodobar, Dobar, Dovoljan, Nedovoljan, ProsOcena) VALUES(42, 12, 9, 1, 0, 0, 4.50)");
    $conn->exec("INSERT INTO Uspeh(Razred, Odlican, Vrlodobar, Dobar, Dovoljan, Nedovoljan, ProsOcena) VALUES(45, 4, 14, 5, 0, 5, 3.20)");
    $conn->commit();
    echo "Rezultati uspesno upisani!";
}
catch(PDOException $e)
{
    $conn->rollback();
    echo "Greska u bazi: " . $e->getMessage();
    $conn=null;
}

?>