
<?php 

// connexion à la base de données 


//$conn = oci_connect('MOUNSEF' ,'MNSF123' , '10.98.19.171/MAINTATST' ) ; 
$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 


if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 


// get the data 
/*'
select  
       	sum (1) as NB_TOTAL , 
		sum (case when   equ.st_ina = "O" then 1 else 0 end ) as NB_ACTIF
		from mainta_prd.equ
		where equ.nu_niv = 5 
' */

$result = oci_parse($conn , 'select * from equipement')  ; 
oci_execute ( $result) ;
$i=0 ; 
while ($row = oci_fetch_assoc($result)) {
    $total[$i] =  $row["NB_TOTAL"] ;
    $actif[$i]=  $row["NB_ACTIF"] ; 
    $i++ ;
}

  $json = array( "total" => $total , "dispo" => $actif );
  echo json_encode($json);



// close connexion 
oci_free_statement($result);
oci_close($conn);

?>