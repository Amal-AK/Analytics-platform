<!DOCTYPE html>
<html lang="en">
<head>
    <title>SEAAL UGO</title>
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
            <a href="#!" class="mob-toggler"><i class="feather icon-more-vertical"></i></a>
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
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Indicateurs Usine : Graphes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Indicateurs</a></li>
                            <li class="breadcrumb-item"><a href="#!">Usine</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h5>Réalisation du Préventif </h5>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex mb-2">
                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">DE </label>
                                    <input type="date" name="date_deb" class="form-control" placeholder="Date début intervalle" aria-label="" id="realisation_pre_dd" >
                                </div>
                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">A</label>
                                    <input type="date"  name="date_fin" class="form-control" placeholder="Date fin intervalle" aria-label="" id="realisation_pre_df">
                                </div>
                                <div class="col-lg-3 d-flex mb-3">
                                <label class="m-2 ">Centres</label>
                                <select class="custom-select" id="centres_realisation">

                                        <option selected value='%'> TOUS</option>
                                        <option value="DA">DAU</option>
                                        <option value="DP">DPU</option>
                                      
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <button class="btn  btn-outline-info" id="realisation_pre_btn" style="width: 100%;" >Filtrer</button>
                                </div>
                            </div>
                        <div id="realisation-preventif"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Taux de préventif</h5>
                    </div>
                    <div class="card-body">
                        
                            <div class="row d-flex mb-2">
                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">DE </label>
                                    <input type="date"  name="date_deb" class="form-control " placeholder="Date début intervalle" aria-label="" id="taux_prev_dd" >
                                </div>

                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">A</label>
                                    <input type="date"  name="date_fin" class="form-control" placeholder="Date fin intervalle" aria-label="" id="taux_prev_df" >
                                </div>
                                <div class="col-lg-3 d-flex mb-3">
                                <label class="m-2 ">Centres</label>
                                <select class="custom-select" id="tauxprev_centre">

                                        <option selected value='%'> TOUS</option>
                                        <option value="DA">DAU</option>
                                        <option value="DP">DPU</option>
                                      
                                    </select>
                                </div>
                                <div class=" mb-3 col-lg-3">
                                    <button class="btn  btn-outline-success" id="taux_preventif_btn" style="width: 100%;">Filtrer</button>
                                </div>
                            </div>
                    
                        <div id="usine-taux-preventif" ></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Disponibilité des équipements</h5>
                    </div>
                    <div class="card-body">
                         <div class="row d-flex mb-2">
                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">DE </label>
                                    <input type="date" name="date_deb" class="form-control" placeholder="Date début intervalle" aria-label="" id="dispo_dd"  >
                                </div>
                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">A</label>
                                    <input type="date"  name="date_fin" class="form-control" placeholder="Date fin intervalle" aria-label="" id="dispo_df" >
                                </div>
                                <div class="col-lg-3 d-flex mb-3">
                                <label class="m-2 ">Centres</label>
                                <select class="custom-select" id="centres_dispo">

                                        <option selected value ='%' >TOUS</option>
                                        <option value="DA">DAU</option>
                                        <option value="DP">DPU</option>
                                      
                                    </select>
                                </div>
                                <div class="mb-3  col-lg-3">
                                    <button class="btn  btn-outline-warning"  style="width: 100%;" id="dispo_btn" >Filtrer</button>
                                </div>
                            </div>
                        <div id="dispo"></div>
                    </div>
                </div>
            </div>

             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Taux occupation par centre </h5>
                    </div>
                    <div class="card-body">
                         <div class="row d-flex mb-2">
                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">DE </label>
                                    <input type="date" name="date_deb" class="form-control" placeholder="Date début intervalle" aria-label="" id="occupation_centre_dd"  >
                                </div>
                                <div class="mb-3 col-lg-3 d-flex">
                                    <label class="m-2">A</label>
                                    <input type="date"  name="date_fin" class="form-control" placeholder="Date fin intervalle" aria-label="" id="occupation_centre_df"  >
                                </div>
                                <div class="col-lg-3 d-flex mb-3">
                                <label class="m-2 ">Centres</label>
                                <select class="custom-select" id="occupation_centres">

                                        <option selected value='%'> TOUS</option>
                                        <option value="DA">DAU</option>
                                        <option value="DP">DPU</option>
                                      
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-3">
                                    <button class="btn  btn-outline-danger"  style="width: 100%;" id="occupation_centre_btn"  >Filtrer</button>
                                </div>
                            </div>
                           <div id="occupation_centre"></div>
                    </div>
                </div>
            </div>
           
			
        </div>
    </div>
</div>

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/plugins/apexcharts.min.js"></script>
    <script src="assets/js/pages/chart-apex.js"></script>

</body>
</html>
