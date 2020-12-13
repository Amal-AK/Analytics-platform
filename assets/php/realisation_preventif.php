
<?php 

// Create connection

$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 


if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 



  $date_deb = $_GET["datedeb"] ; 
  $date_fin = $_GET["datefin"] ; 
  $centre = $_GET["centre"] ;  
  $result = oci_parse($conn , "select * from realisation where centre like  '".$centre."%'" ) ; 

  oci_execute ( $result) ;
	$i = 0 ; 

  while ($row = oci_fetch_assoc($result)) {
    $centres[$i] =  $row["CENTRE"] ;
    $total[$i]=  $row["NB_TOTAL"] ; 
    $realise[$i]=  $row["NB_REALISE"] ; 
    $pourcentage[$i] = $row["REALISATION_PREVENTIF"]  ; 
    $i++ ;
}

// create the json 
  $json = array( "centres" =>$centres,  "total" =>$total , "realise" =>  $realise , "pourcentage"=> $pourcentage , "chaine" => "select * from realisation where centre like  '".$centre."%'");
  echo json_encode($json );



// close connexion 
oci_free_statement($result);
oci_close($conn);

?>