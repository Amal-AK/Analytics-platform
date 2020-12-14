
<?php 

// Create connection
error_reporting(0) ; 
//$conn = oci_connect('MOUNSEF' ,'MNSF123' , '10.98.19.171/MAINTATST' ) or die(require("404.html")); 
$conn = oci_connect('SEAAL' ,'amal' , 'localhost:1522' ) ; 
// Check connection
if (!$conn) {
  include_once("404.html");
  exit();

}

// nombre des bt 
$result = oci_parse($conn , 
"
select sum(1) as nb_total , 
       sum(case when btsyn.id_nummotlig = 22 then 1 else 0 end ) as nb_valid , 
       sum(case when btsyn.id_nummotlig = 42 then 1 else 0 end) as nb_annule , 
       sum(case when  btsyn.id_nummotlig = 32 then 1 else 0 end) as nb_doublons ,
       sum(case when to_date(to_char(dt_dem,'dd/mm/yyyy') , 'dd/mm/yyyy') >= to_date ('01/' || extract(month from sysdate) || '/' || extract(year from sysdate) , 'dd/mm/yyyy')  then 1 else 0 end) as nb_total_m , 
       sum(case when btsyn.id_nummotlig = 22 and (to_date(to_char(dt_dem,'dd/mm/yyyy') , 'dd/mm/yyyy') >= to_date ('01/' || extract(month from sysdate) || '/' || extract(year from sysdate) , 'dd/mm/yyyy') ) then 1 else 0 end ) as nb_valid_m , 
       sum(case when btsyn.id_nummotlig = 42 and (to_date(to_char(dt_dem,'dd/mm/yyyy') , 'dd/mm/yyyy') >= to_date ('01/' || extract(month from sysdate) || '/' || extract(year from sysdate) , 'dd/mm/yyyy')  )then 1 else 0 end) as nb_annule_m , 
       sum(case when  btsyn.id_nummotlig = 32 and (to_date(to_char(dt_dem,'dd/mm/yyyy') , 'dd/mm/yyyy') >= to_date ('01/' || extract(month from sysdate) || '/' || extract(year from sysdate) , 'dd/mm/yyyy')  ) then 1 else 0 end) as nb_doublons_m ,
       from mainta_tst.btsyn
       where nu_session = 1 and nu_ord > 0  
")  ; 
oci_execute ( $result) ; 
$array = oci_fetch_array($result) ; 
 

    $nb_total = 930547 /*$array[0]*/ ;
    $nb_valide = 563218 /*$array[1]*/ ;
    $nb_annule=  236541/*$array[2]*/ ;
    $nb_doublons=  152364/*$array[3]*/ ;
    $nb_total_mois = 5203;
    $nb_valide_mois = 320 ;
    $nb_annule_mois=  150 ;
    $nb_doublons_mois= 80 ;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>SEAAL UGO </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    

</head>
<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menupos-fixed menu-light ">
        <div class="navbar-wrapper  ">
        <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption d-flex justify-content-center" >
						<a href="http://www.seaal.dz/" target="_blank"><img src="assets/images/seaal.png" height="50px" width="50px"></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Menu</label>
					</li>
					<li class="nav-item">
					    <a href="index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Acceuil</span></a>
					</li>
				
					<li class="nav-item pcoded-menu-caption">
						<label>Indicateurs </label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-info"></i></span><span class="pcoded-mtext">USINE</span></a>
						<ul class="pcoded-submenu">
							<li><a href="chart-apex-usine.php">Graphes</a></li>
							<li><a href="#">Tableaux</a></li>
						
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-info"></i></span><span class="pcoded-mtext">UGO</span></a>
						<ul class="pcoded-submenu">
							<li><a href="chart-apex-ugo.php">Graphes</a></li>
							<li><a href="#">Tableaux</a></li>
						
						</ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
						<label>Maps</label>
					</li>
			
					<li class="nav-item">
					    <a href="map.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Interventions</span></a>
					</li>
					
				</ul>
                
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
        
            
                <div class="m-header" style="justify-content: center ;">
                    <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                    <a href="#!" class="b-brand mt-2">
                        <!-- ========   change your logo hear   ============ -->
                       <h4 style=" color: white !important;">U.G.O </h4>
                        
                    </a>
                    <a href="#!" class="mob-toggler">
                        <i class="feather icon-more-vertical"></i>
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item">
                            <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
                        </li>
                    </ul>
                        
                </div>
            
    </header>
    <!-- [ Header ] end -->
    
    
<div class="pcoded-main-container">
    <div class="pcoded-content">
     
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard UGO </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard SEAAL UGO</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
   
        <!-- [ Main Content ] start -->
        <div class="row">

            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total BT</h6>
                        <h2 class="text-right text-white"><i class="feather icon-corner-down-right float-left mt-2"></i><span><?php echo $nb_total ?></span></h2>
                        <p class="m-b-0">Ce mois <span class="float-right"><?php echo $nb_total_mois?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total BT validé </h6>
                        <h2 class="text-right text-white"><i class="feather icon-check-circle float-left mt-2"></i><span><?php echo $nb_valide ?></span></h2>
                        <p class="m-b-0">Ce mois<span class="float-right"><?php echo $nb_valide_mois?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total BT doublons </h6>
                        <h2 class="text-right text-white"><i class="feather icon-repeat float-left mt-2"></i><span><?php echo $nb_doublons ?></span></h2>
                        <p class="m-b-0">Ce mois<span class="float-right"><?php echo $nb_doublons_mois?></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total BT annulé </h6>
                        <h2 class="text-right text-white"><i class="feather icon-x-circle float-left mt-2"></i><span><?php echo $nb_annule ?></span></h2>
                        <p class="m-b-0">Ce mois<span class="float-right"><?php echo $nb_annule_mois?></span></p>
                    </div>
                </div>
            </div>
        </div>

       <div class="row">
            <div class="col-md-6 col-xl-6 ">
                <div class="card bg-info text-white">
                    <div class="card-body ">
                        <h5 class="text-white">Ordonnanceurs actifs   </h5>
                        <h2 class="text-white d-flex justify-content-between "><span style="font-size : 14px" class="mt-3">total</span><span id="ordo_total"></span></h2>
                        <p class="m-b-0">Le mois courant<span class="float-right" id="nb_ordo">42</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6 ">
               <div class="card bg-primary text-white">
                 <div class="card-body ">
                        <h5 class="text-white">Diagnostiqueurs actifs</h5>
                        <h2 class="text-white d-flex justify-content-between "><span style="font-size : 14px" class="mt-3">total</span ><span id="diagnostic_total"></span></h2>
                        <p class="m-b-0">Le mois courant<span class="float-right" id="nb_diagnostic">42</span></p>
                    </div>
                </div>
            </div>
         </div>
         <div class="row">
         <div class="col-xl-12 col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h5>Nombre des OT ordonnancés ce mois </h5>
                    </div>
                    <div class="card-body">
                        <div id="line-chart-1" style="width:100%"></div>
                    </div>
                </div>
            </div>
         </div>
      
       <DIV Class="row" >
            <div class="col-xl-6 col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h5>Taux Préventif ce mois</h5>
                    </div>
                    <div class="card-body">
                        <div id="preventif_global" style="width:100%"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card bg-patern-white">
                            <div class="card-body bg-patern">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span>Equipements</span>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <h2 class="mb-0 nb_equ_total"></h2>
                                    </div>
                                </div>
                                <div id="equ-chart"></div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h5 class="m-0 "><i class="fas fa-circle f-10 m-r-5 text-success"></i><span class="nb_dispo"></span></h5>
                                        <span class="ml-3 ">Dispo</span>
                                    </div>
                                    <div class="col">
                                        <h5 class="m-0"><i class="fas fa-circle text-warning f-10 m-r-5"></i><span class="nb_indispo"></span></h5>
                                        <span class="ml-3">Indispo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card  bg-patern-white">
                            <div class="card-body bg-patern">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span>Intervenants</span>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <h2 class="mb-0  nb_inter"></h2>
                                        
                                    </div>
                                </div>
                                <div id="inter-chart"></div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h5 class="m-0 "><i class="fas fa-circle f-10 m-r-5 text-info"></i><span class="nb_actif"></span></h5>
                                        <span class="ml-3">actifs</span>
                                    </div>
                                    <div class="col">
                                        <h5 class="m-0 "><i class="fas fa-circle f-10 m-r-5 text-danger"></i><span class="nb_inactif"></span></h5>
                                        <span class="ml-3">inactifs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DIV>

        <!-- [ Main Content ] end -->
    </div>
</div>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="assets/js/plugins/apexcharts.min.js"></script>

    <!-- custom-chart js -->
    <script src="assets/js/pages/dashboard-main.js"></script>


</body>

</html>

