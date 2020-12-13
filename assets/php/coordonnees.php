
<?php 

// connexion à la base de données 

$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 


if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 


// get the data 

$date_deb = $_GET["datedeb"] ; 
$date_fin = $_GET["datefin"] ; 
$result = oci_parse($conn , 'select * from coord' ) ; 
oci_execute ( $result) ;
$i = 0 ; 

// put data in tables 
while ($row = oci_fetch_assoc($result)) {
    $long[$i] =  $row["LONGI"] ;
    $lat[$i]=  $row["LAT"] ; 
    $info[$i]=  $row["INFO"] ; 
    $i++ ;
}

// transform to json 
$json = array( "long" =>$long,  "lat" =>$lat , "info" =>  $info );
echo json_encode($json );

oci_free_statement($result);
oci_close($conn);
?>