
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
	$result = $conn->query("select * from taux_preventif ");
	$centres = array(); 
	$curatif = array() ; 
	$preventif = array() ; 
	$ratio = array(); 
	$i = 0 ; 

	while($row = $result->fetch_assoc()) {
   
    $centres[$i] =  $row["centre"] ;
    $preventif[$i]=  $row["total_heure_preventif"] ; 
    $curatif[$i]=  $row["total_heure_curatif"] ; 
    $ratio[$i] = $row["ratio"]  ; 
    $i++ ; 
  
}

  $json = array( "centres" =>$centres,  "preventif" =>$preventif , "curatif" =>  $curatif  , "ratio"=> $ratio );
  echo json_encode($json );



// close connexion 
$conn->close();

?>