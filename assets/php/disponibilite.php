
<?php 

// Create connection

$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 

if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 


  $date_deb = $_GET["datedeb"] ; 
  $date_fin = $_GET["datefin"] ; 
  $centre = $_GET["centre"] ; 

  $result = oci_parse($conn , "select * from DISPONIBILITE where centre like  '".$centre."%'" ) ; 
  oci_execute ( $result) ;
  $i = 0 ; 
  
	while($row = oci_fetch_assoc($result)) {
   
    $c[$i] =  $row["CENTRE"] ;
    $d[$i]=  $row["DISPO"] ; 
    $m[$i]=  $row["MAINT"] ; 
    $f[$i] = $row["FIAB"]  ; 
    $i++ ; 
  
}

  $json = array( "centres" =>$c,  "disponibilite" =>$d , "maintenabilite" =>  $m  , "fiabilite"=> $f);
  echo json_encode($json );

  oci_free_statement($result);
  oci_close($conn);
  

?>