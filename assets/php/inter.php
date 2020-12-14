
<?php 


// connexion à la base de données 

//$conn = oci_connect('MOUNSEF' ,'MNSF123' , '10.98.19.171/MAINTATST' ) ; 
$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 


if ( !$conn ) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); } 


$date_deb = $_GET["datedeb"] ; 
$date_fin = $_GET["datefin"] ; 
$result = oci_parse($conn , 'select * from equipement')  ; 
/*

 select  count (distinct INTER.ID_CODINT as code ) total , count( distinct btsyn.id_codint) as inter_actif
 from MAINTA_prd.BTSYN
 left outer JOIN MAINTA_prd.inter ON btsyn.ID_CODINT = inter.ID_CODINT 
 where  nu_session=1 and btsyn.nu_ord>0 
        and BTSYN.ID_NUMMOTLIG = 22    
        and BTSYN.st_eta like 'CLO'   
        and TO_DATE( TO_CHAR(BTSYN.DT_INTFIN , 'DD/MM/YYYY'), 'DD/MM/YYYY') >= to_date ('01/' || extract(month from sysdate) || '/' || extract(year from sysdate) , 'dd/mm/yyyy') )   
      
*/
oci_execute ( $result) ;
$i=0 ; 
while ($row = oci_fetch_assoc($result)) {
    $total[$i] =  $row["NB_TOTAL"] ;
    $actif[$i]=  $row["NB_ACTIF"] ; 
    $i++ ;
}

  $json = array( "total" => $total , "actif" => $actif );
  echo json_encode($json);

// close connexion 
oci_free_statement($result);
oci_close($conn);


?>

