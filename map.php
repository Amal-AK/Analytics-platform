<!DOCTYPE html>
<html lang="en">
<head>
    <title>SEAAL UGO</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
 

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
       

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
			<div class="navbar-content scroll-div " >
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
	
	

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Open street Map</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Maps</a></li>
                            <li class="breadcrumb-item"><a href="#!">Openstreet Map</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- [ Markers-map ] start -->
            <div class="col-lg-12 col-xl-12">
				
                <div class="card">
                    <div class="card-header">
						<h5>Eplacements des interventions </h5>
                        <span class="d-block m-t-5">Visualiser les emplacements des <code>interventions</code> durant la période suivante  </span>
                    </div>
                    <div class="card-body">

                         <div class="row d-flex mb-2">
                                <div class="mb-3 col-lg-5 d-flex">
                                    <label class="m-2">DE </label>
                                    <input type="date" name="date_deb" class="form-control" placeholder="Date début intervalle" aria-label="" id="map_dd"  >
                                </div>
                                <div class="mb-3 col-lg-5 d-flex">
                                    <label class="m-2">A</label>
                                    <input type="date"  name="date_fin" class="form-control" placeholder="Date fin intervalle" aria-label="" id="map_df"  >
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn  btn-outline-success"  style="width: 100%;" id="map_btn"  >Charger</button>
                                </div>
                            </div>
						
                        <div id="map" style="height:400px;"></div>
                    </div>
                </div>
            </div>
            <!-- [ Markers-map ] end -->
           
          
         
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

<!-- google-map Js -->

<script src="assets/js/pages/maps.js"></script>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>

</body>
</html>
