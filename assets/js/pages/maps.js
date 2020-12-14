// intialisation 
var today =  new Date().toLocaleString().slice(0,10).split('-').reverse().join('/') ; 
var firstday='01' + today.slice(2.10) ; 
 // On initialise la latitude et la longitude de Paris (centre de la carte)
 var lat = 36.1702401;
 var lon = 3.8310607;
 var macarte = null;
 var markerClusters; // Servira à stocker les groupes de marqueurs
  
getdata(firstday , today , null)  ; 


   // clic btn charger les points  


   $("#map_btn")[0].onclick = function(){
    var dd=  $("#map_dd").val() ; 
    var df = $("#map_df").val();
    var centre = $("#centres_map").val()  ; 
    $("#map_dd").removeClass("is-invalid") ;
    $("#map_df").removeClass("is-invalid") ;

    if (centre == 'TOUS') {
      centre = null ; 
    }

  // vérifications des dates 

   if(dd=='') 
   {
      $("#map_dd").addClass("is-invalid")  ;
    
   
   }
   if (df=='') {
     $("#map_df").addClass("is-invalid") ;

    }
    if(df!='' && dd!='' &&dd>df ) {
       $("#map_df").addClass("is-invalid") ;
       $("#map_dd").addClass("is-invalid")  ;
    }

   if (df!='' && dd!='' && dd<=df)
   {
      $("#map_dd").removeClass("is-invalid")  ;
      $("#map_df").removeClass("is-invalid") ;
      dd= dd.toLocaleString().slice(0,10).split('-').reverse().join('/')  ; 
      df= df.toLocaleString().slice(0,10).split('-').reverse().join('/')  ;
       $("#map_dd").val('') ; 
       $("#map_df").val('') ; 
         getdata(dd , df , centre)  ; 
       }

     };




     /* fonction qui charge les coordonées de la base de données */

    function getdata(dated , datef , centre) {
    var  locations = [ ] ; 
    var today =  new Date().toLocaleString().slice(0,10).split('-').reverse().join('/') ; 
    var firstday='01' + today.slice(2.10) ; 
    window.onload = function(){ 
    $.ajax({
        url: "./assets/php/coordonnees.php", 
        type : 'GET',
        dataType : 'json',
        data : { 'datedeb' : dated, 
                 'datefin': datef , 
                 'centre': centre ,
    } , 
    success: function(result){
        console.log(result) ; 
            
        for (i=0; i< result['long'].length ; i++)  {
            locations[i] = { lat : result['lat'][i] , lng : result['long'][i] , infoWindow : {content : result['info'][i]} } ; 
        } 

        initMap(locations) ; 

    }}) ; 
  }
}


           
        // Fonction d'initialisation de la carte
            function initMap(locations) {
                var markers = []; 
                // Nous définissons le dossier qui contiendra les marqueurs
                var iconBase = 'http://localhost/carte/icons/';
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([lat, lon], 11);
                markerClusters = L.markerClusterGroup(); // Nous initialisons les groupes de marqueurs
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    Zoom: 8,
                    
                }).addTo(macarte);
                // Nous parcourons la liste des villes
                for (ville in locations) {
                   var marker = L.marker([locations[ville].lat, locations[ville].lng]).addTo(macarte);
                    // Nous ajoutons la popup. A noter que son contenu (ici la variable ville) peut être du HTML
                     marker.bindPopup(locations[ville].infoWindow.content);
                     markerClusters.addLayer(marker); // Nous ajoutons le marqueur aux groupes
                     markers.push(marker); // Nous ajoutons le marqueur à la liste des marqueurs
                }
                var group = new L.featureGroup(markers); // Nous créons le groupe des marqueurs pour adapter le zoom
                macarte.fitBounds(group.getBounds().pad(0.2)); // Nous demandons à ce que tous les marqueurs soient visibles, et ajoutons un padding (pad(0.5)) pour que les marqueurs ne soient pas coupés
                macarte.addLayer(markerClusters);
            }
     