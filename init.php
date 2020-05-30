<?php
    
    require_once("db.php");
    try{
        $sql="CREATE TABLE Ucenici(Razred INT NOT NULL, Odlican INT NOT NULL, Vrlodobar INT NOT NULL, Dobar INT NOT NULL, Dovoljan INT NOT NULL, Nedovoljan INT NOT NULL, ProsOcena decimal(3,2) NOT NULL)";
        
        $conn->exec($sql);
        echo "TABLA JE KREIRANA.";
    }
    catch(PDOException $pd)
    {
        echo "Error Creating table: " . $pd->getMessage();
    }
    $conn = null;
    
    ?>