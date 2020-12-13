
<?php 

// Create connection
$conn =  new mysqli('localhost', 'root', '', 'seaal');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

}

  $date_deb = $_GET["datedeb"] ; 
  $date_fin = $_GET["datefin"] ; 
$result = $conn->query("select sum(pre) as nb_preventif , sum(cur) as nb_curatif 
                        from (select case when id=1 then 1 else 0 end as pre , case when id= 2 then 1 else 0 end as cur from matable )as t1");

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc() ;
    $nb_preventif =  $row["nb_preventif"] ;
    $nb_curatif =  $row["nb_curatif"] ;


  $json = array( "preventif" =>$nb_preventif , "curatif" =>  $nb_curatif );


   echo json_encode($json);

}

// close connexion 
$conn->close();

?>