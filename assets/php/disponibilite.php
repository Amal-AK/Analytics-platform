
<?php 

// Create connection
$conn =  new mysqli('localhost', 'root', '', 'seaal');

$conn -> set_charset("utf8") ; 
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

}

  $date_deb = $_GET["datedeb"] ; 
  $date_fin = $_GET["datefin"] ; 
	$result = $conn->query("select * from disponibilité ");
	$centres = array(); 
	$curatif = array() ; 
	$preventif = array() ; 
	$ratio = array(); 
	$i = 0 ; 

	while($row = $result->fetch_assoc()) {
   
    $c[$i] =  $row["centre"] ;
    $d[$i]=  $row["disponibilite"] ; 
    $m[$i]=  $row["maintenabilite"] ; 
    $f[$i] = $row["fiabilite"]  ; 
    $i++ ; 
  
}

  $json = array( "centres" =>$c,  "disponibilite" =>$d , "maintenabilite" =>  $m  , "fiabilite"=> $f);
  echo json_encode($json );



// close connexion 
$conn->close();

?>