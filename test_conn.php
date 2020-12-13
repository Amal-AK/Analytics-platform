<?php 

$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 


if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 

$result = oci_parse($conn , 'select * from coord' ) ; 
oci_execute ( $result) ;
$i = 0 ; 

while ($row = oci_fetch_array($result)) {
    $long[$i] =  $row["LONGI"] ;
    $lat[$i]=  $row["LAT"] ; 
    $info[$i]=  $row["INFO"] ; 
    $i++ ;
}
$json = array( "long" =>$long,  "lat" =>$lat , "info" =>  $info );
echo json_encode($json );

?> 