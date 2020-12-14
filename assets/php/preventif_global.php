
<?php 

// Create connection
$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 

if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 

  $result = oci_parse($conn , " select sum(pre) as PER , sum(cur) as CURA
  from (select case when type='P' then 1 else 0 end as pre , case when type='C' then 1 else 0 end as cur from btsyn) t1")  ; 
  oci_execute ( $result) ;

while ($row = oci_fetch_assoc($result)) {

    $nb_preventif =  $row["PER"] ;
    $nb_curatif =  $row["CURA"] ;
}

$json = array( "preventif" =>$nb_preventif , "curatif" =>  $nb_curatif );
echo json_encode($json);

// close connexion 
oci_free_statement($result);
oci_close($conn);


?>