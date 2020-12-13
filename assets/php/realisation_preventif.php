
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
	$result = $conn->query("select * from realisation_preventif ");
	$centres = array(); 
	$total = array() ; 
	$realise = array() ; 
	$pourcentage = array(); 
	$i = 0 ; 

	while($row = $result->fetch_assoc()) {
   
    $centres[$i] =  $row["centre"] ;
    $total[$i]=  $row["total_bt_P"] ; 
    $realise[$i]=  $row["NB_Bt_REALISE"] ; 
    $pourcentage[$i] = $row["realisation_preventif"]  ; 
    $i++ ; 
  
}

  $json = array( "centres" =>$centres,  "total" =>$total , "realise" =>  $realise , "pourcentage"=> $pourcentage);
  echo json_encode($json );



// close connexion 
$conn->close();

?>