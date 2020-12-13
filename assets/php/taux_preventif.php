
<?php 

// Create connection
$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 


if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 


  $date_deb = $_GET["datedeb"] ; 
  $date_fin = $_GET["datefin"] ; 
  $centre = $_GET["centre"] ; 
  $result = oci_parse($conn , "select * from preventif where centre like'".$centre."%'" ) ; 
  oci_execute ( $result) ;
	$i = 0 ; 

	while($row = oci_fetch_assoc($result)) {
   
    $centres[$i] =  $row["CENTRE"] ;
    $preventif[$i]=  $row["HEURE_P"] ; 
    $curatif[$i]=  $row["HEURE_C"] ; 
    $ratio[$i] = $row["TAUX"]  ; 
    $i++ ; 
  
}

  $json = array( "centres" =>$centres,  "preventif" =>$preventif , "curatif" =>  $curatif  , "ratio"=> $ratio );
  echo json_encode($json );

  oci_free_statement($result);
  oci_close($conn);

?>