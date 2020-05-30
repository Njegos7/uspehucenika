<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=Skola;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('select Razred, ProsOcena from Ucenici'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("Razred"=> $row->Razred, "ProsOcena"=> $row->ProsOcena));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>
<html lang="en">
<head>
<title>Uspeh učenika</title>
<link rel="stylesheet" href="css/stil.css">
<link href="https://fonts.googleapis.com/css2?family=Sen:wght@300;500;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700;800&display=swap" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
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
        <li><a href="index.php">Početna</a></li>
        <li><span>Grafika</span></li>
        <li><a href="oautoru.php">O autoru</a></li>
    </ul>
    </nav>
    
    <h1>Grafički prikaz uspeha</h1>
    <div id="chartContainer">
    <canvas id="graphCanvas"></canvas>
    </div>
    <script type="text/javascript">
        window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Razredi i prosečne ocene"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>    