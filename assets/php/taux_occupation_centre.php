
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
	$result = $conn->query("select * from taux_occupation_centre ");
	$centres = array(); 
	$occupation = array() ; 
	$astreinte = array() ; 
 
	$i = 0 ; 

	while($row = $result->fetch_assoc()) {
   
    $centres[$i] =  $row["centre"] ;
    $occupation[$i]=  $row["taux_occupation"] ;
    $astreinte[$i] = $row["taux_astreinte"]  ; 
    $i++ ; 
  
}

  $json = array( "centres" =>$centres,  "occupation" =>$occupation , "astreinte" =>  $astreinte );
  echo json_encode($json );



// close connexion 
$conn->close();

?>