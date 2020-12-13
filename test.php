
<?php 

// Create connection
$conn = oci_connect('MOUNSEF' ,'MNSF123' , '10.98.19.171/MAINTATST' ) or die(require("404.html")); 

// Check connection
if (!$conn) {
  include_once("404.html");
  exit();

}

// nombre des bt 
$result = oci_parse($conn , 
'
select sum(1) as nb_total , 
       sum(case when btsyn.id_nummotlig = 22 then 1 else 0 end ) as nb_valid , 
       sum(case when btsyn.id_nummotlig = 42 then 1 else 0 end) as nb_annule , 
       sum(case when  btsyn.id_nummotlig = 32 then 1 else 0 end) as nb_doublons 
       from mainta_tst.btsyn
       where nu_session = 1 and nu_ord > 0  
' )  ; 
oci_execute ( $result) ; 
$array = oci_fetch_array($result) ; 
 

    $nb_total =  $array[0] ;
    $nb_valide =  $array[1] ;
    $nb_annule=  $array[2] ;
    $nb_doublons=  $array[3] ;

?>
