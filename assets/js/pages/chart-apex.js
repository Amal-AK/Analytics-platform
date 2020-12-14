
 "use strict";

// initialisation -------------------------------------------------------------------------------------------

   var today =  new Date().toLocaleString().slice(0,10).split('-').reverse().join('/') ; 
   var firstday='01' + today.slice(2.10) ; 
   taux_preventif_usine(firstday , today , '%') ;
   realisation_preventif(firstday , today , '%')  ; 
   disponibilite (firstday, today , '%') ;
   occupation_centre(firstday, today,'%') ; 


   //calls-------------------------------------------------------------------------------------------------------

// clic btn filtrer taux preventif ------------------------------------------------------------------------

   $("#taux_preventif_btn")[0].onclick = function(){
    var dd= $("#taux_prev_dd").val() ; 
    var df = $("#taux_prev_df").val();
    $("#taux_prev_dd").removeClass("is-invalid") ;
    $("#taux_prev_df").removeClass("is-invalid") ;
    var centre = $('#tauxprev_centre').val() ; 
   if(dd=='') 
   {
    $("#taux_prev_dd").addClass("is-invalid")  ;
    
   
   }
   if (df=='') {
    $("#taux_prev_df").addClass("is-invalid") ;

    }
    if(df!='' && dd!='' &&dd>df ) {
        $("#taux_prev_dd").addClass("is-invalid") ;
         $("#taux_prev_df").addClass("is-invalid")  ;
    }

   if (df!='' && dd!='' && dd<=df)
   {
      $("#taux_prev_dd").removeClass("is-invalid")  ;
      $("#taux_prev_df").removeClass("is-invalid") ;
      dd= dd.toLocaleString().slice(0,10).split('-').reverse().join('/')  ; 
      df= df.toLocaleString().slice(0,10).split('-').reverse().join('/')  ;
      $("#taux_prev_dd").val('') ; 
      $("#taux_prev_df").val('') ; 
       taux_preventif_usine(dd , df, centre)  ; 
   }

     };



     // clic btn realisation preventif filtrer -----------------------------------------------------------

 $("#realisation_pre_btn")[0].onclick = function(){
     
    var dd= $("#realisation_pre_dd").val() ; 
    var df = $("#realisation_pre_df").val();
    $("#realisation_pre_dd").removeClass("is-invalid") ;
    $("#realisation_pre_df").removeClass("is-invalid") ;
    var centre = $("#centres_realisation").val()  ; 

   if(dd=='') 
   {
     $("#realisation_pre_dd").addClass("is-invalid")  ;
    
   
   }
   if (df=='') {
    $("#realisation_pre_df").addClass("is-invalid") ;

    }
    if(df!='' && dd!='' &&dd>df ) {
         $("#realisation_pre_df").addClass("is-invalid") ;
         $("#realisation_pre_dd").addClass("is-invalid")  ;
    }

   if (df!='' && dd!='' && dd<=df)
   {
     $("#realisation_pre_dd").removeClass("is-invalid")  ;
      $("#realisation_pre_df").removeClass("is-invalid") ;
      dd= dd.toLocaleString().slice(0,10).split('-').reverse().join('/')  ; 
      df= df.toLocaleString().slice(0,10).split('-').reverse().join('/')  ;
      $("#realisation_pre_dd").val('') ; 
      $("#realisation_pre_df").val('') ; 
      realisation_preventif(dd , df , centre)  ; 
   }

     };



     // clic btn filtrer disponibilité ---------------------------------------------------------------

 $("#dispo_btn")[0].onclick = function(){
    var dd= $("#dispo_dd").val() ; 
    var df = $("#dispo_df").val();
    $("#dispo_dd").removeClass("is-invalid") ;
    $("#dispo_df").removeClass("is-invalid") ;
    var centre = $("#centres_dispo").val()  ; 
   
   if(dd=='') 
   {
     $("#dispo_dd").addClass("is-invalid")  ;
    
   
   }
   if (df=='') {
    $("#dispo_df").addClass("is-invalid") ;

    }
    if(df!='' && dd!='' &&dd>df ) {
         $("#dispo_df").addClass("is-invalid") ;
         $("#dispo_dd").addClass("is-invalid")  ;
    }

   if (df!='' && dd!='' && dd<=df)
   {
     $("#dispo_dd").removeClass("is-invalid")  ;
      $("#dispo_df").removeClass("is-invalid") ;
      dd= dd.toLocaleString().slice(0,10).split('-').reverse().join('/')  ; 
      df= df.toLocaleString().slice(0,10).split('-').reverse().join('/')  ;
      $("#dispo_dd").val('') ; 
      $("#dispo_df").val('') ; 
       disponibilite(dd , df , centre)  ; 
   }

     };



     // clic btn filtrer occupation centre -----------------------------------------------------------


 $("#occupation_centre_btn")[0].onclick = function(){
    var dd=  $("#occupation_centre_dd").val() ; 
    var df = $("#occupation_centre_df").val();
    $("#occupation_centre_dd").removeClass("is-invalid") ;
    $("#occupation_centre_df").removeClass("is-invalid") ;
    var centre = $("#occupation_centres").val()  ; 
   if(dd=='') 
   {
      $("#occupation_centre_dd").addClass("is-invalid")  ;
    
   
   }
   if (df=='') {
     $("#occupation_centre_df").addClass("is-invalid") ;

    }
    if(df!='' && dd!='' &&dd>df ) {
       $("#occupation_centre_df").addClass("is-invalid") ;
       $("#occupation_centre_dd").addClass("is-invalid")  ;
    }

   if (df!='' && dd!='' && dd<=df)
   {
      $("#occupation_centre_dd").removeClass("is-invalid")  ;
      $("#occupation_centre_df").removeClass("is-invalid") ;
      dd= dd.toLocaleString().slice(0,10).split('-').reverse().join('/')  ; 
      df= df.toLocaleString().slice(0,10).split('-').reverse().join('/')  ;
       $("#occupation_centre_dd").val('') ; 
       $("#occupation_centre_df").val('') ; 
         occupation_centre(dd , df, centre)  ; 
       }

     };



// indicateur taux préventif pour chaque centre --------------------------------------------------------------------------

    function taux_preventif_usine(datedeb , datefin, centre) {

          $.ajax({
        url: "./assets/php/taux_preventif.php", 
        type : 'GET',
        dataType : 'json' , 
        data: {  'datedeb': datedeb, 
                 'datefin' : datefin,
                 'centre' : centre , 
          },
        success: function(result){
        
        var options = {
            series: [{
            name: 'Ratio (p/c+p) ',
            data: result["ratio"] , 
            type: 'column',
        
          }, {
            name: "Total travail préventif",
            data: result["preventif"] , 
            type: 'area',
          }, {
            name: "Total travail Curatif",
            data: result["curatif"]  , 
            type: 'area',
          }],
            chart: {
            height: 350,
            type: 'line',
            stacked: false,
          },
          stroke: {
            width: [0, 4, 4],
            curve: 'smooth'
          },
          plotOptions: {
            bar: {
              columnWidth: '50%'
            }
          },
          
          fill: {
            opacity: [0.8, 0.25, 0.25],
            gradient: {
              inverseColors: false,
              shade: 'light',
              type: "vertical",
              opacityFrom: 0.85,
              opacityTo: 0.55,
              stops: [0, 100, 100, 100]
            }
          },
          colors : ['#4099ff' ,'#2ed8b6' , '#FFB64D'] , 
     
            
          markers: {
            size: 4,

            hover: {
                size: 5
            }
        },
          xaxis: {
            categories: result["centres"],
          },
          yaxis: {
            title: {
              text: 'Heures de travail',
            },
            min: 0
          },
          legend: {
            labels: {
                useSeriesColors: true
            }},
          tooltip: {
            y: [{
               
                formatter: function(y) {
                   
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " %";
                    }
                    return y;

                }
            }, {
                
                formatter: function(y) {
                   
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " heures";
                    }
                    return y;

                }
            }, {
                
                formatter: function(y) {
                   
                    if (typeof y !== "undefined") {
                        return y.toFixed(0) + " heures";
                    }
                    return y;

                }
            }]
        },
          };
            document.querySelector("#usine-taux-preventif").innerHTML= '' ; 
            var chart = new ApexCharts(
                document.querySelector("#usine-taux-preventif"),
                options
            );
            chart.render();


        },
        error: function(status) { document.querySelector("#usine-taux-preventif").innerHTML= '' ; }
    }) ; 
        };




// chart indicateur réalisation de préventif ------------------------------------------------------------------------

      function realisation_preventif(datedeb , datefin , centre ) {

         
         $.ajax( {
        url: "./assets/php/realisation_preventif.php", 
        type : 'GET',
        dataType : 'json',
         data: {  'datedeb': datedeb, 
                  'datefin' : datefin,
                  'centre' : centre , 
          },
         success: function(result){
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        
                    },
                },
                dataLabels: {
                    enabled: false
                },
                colors: ["#0e9e4a", "#4099ff", "#FF5370"],
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 0.25,
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 0.7,
                        stops: [50, 100]
                    },
                },
                series: [{
                    name: 'BT réalisés',
                    data: result["realise"] , 
                    type : 'bar'
                    
                }, {
                    name: 'Nombre de demandes',
                    data: result["total"] , 
                    type : 'bar'
                }, {
                    name: 'Réalisation du préventif',
                    data: result["pourcentage"] , 
                    type : 'bar'
                }],
                stroke: {
                    curve: 'straight',
                },
                xaxis: {
                    categories: result["centres"],
                },
                yaxis: {
                    title: {
                        text: ' N.B BT'
                    }
                },
              
                  tooltip: {
                    y: [{
                       
                        formatter: function(y) {
                           
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) + " BT";
                            }
                            return y;

                        }
                    }, {
                        
                        formatter: function(y) {
                           
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) + " BT";
                            }
                            return y;

                        }
                    }, {
                        
                        formatter: function(y) {
                           
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) + " %";
                            }
                            return y;

                        }
                    }]
                },
            }
            document.querySelector("#realisation-preventif").innerHTML = '' ; 
            var chart = new ApexCharts(
                document.querySelector("#realisation-preventif"),
                options
            );
            chart.render();
        } , 
        error: function (status) { 
            document.querySelector("#realisation-preventif").innerHTML = '' ;  } 
        });
    };



 // disponibilité des eqipements -----------------------------------------------------------------------------

       function disponibilite(datedeb , datefin , centre) {
         $.ajax( {
           url: "./assets/php/disponibilite.php", 
        type : 'GET',
        dataType : 'json',
        data: {  'datedeb': datedeb, 
                  'datefin' : datefin,
                  'centre' : centre ,
          },
        success: function(result){
          
            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                },
                stroke: {
                    width: [0,5, 5],
                    curve: 'smooth'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ["#4099ff" , '#FF5370', '#FFB64D'],
                series: [{
                    name: 'Taux de Disponibilité',
                    data: result["disponibilite"] , 
                    type: 'column',
                    
                },  
                { 
                    name: 'Maintenabilité',
                    data: result['maintenabilite'], 
                    type: 'line',
                },
                { name: 'Fiabilité',
                data: result["fiabilite"] , 
                type : 'line' , 

                }
                ],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 0.25,
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 0.7,
                        stops: [50, 100]
                    },
                },
              
               
                markers: {
                    size: 6,

                    hover: {
                        size: 5
                    }
                },

                xaxis: {
                    categories: result['centres'] , 
                },
               
                yaxis: {
                    
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,


                    y: [{
                            formatter: function(y) {
                           
                                if (typeof y !== "undefined") {
                                    return y.toFixed(0) + " %";
                                }
                                return y;
    
                            }
                        
                        
                    }, {
                        formatter: function(y) {
                           
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) ;
                            }
                            return y;

                        }
                       
                    }, {
                        formatter: function(y) {
                           
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) ;
                            }
                            return y;

                        }
                        
                    }]
                    
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
             document.querySelector("#dispo").innerHTML = '' ; 
            var chart = new ApexCharts(
                document.querySelector("#dispo"),
                options
            );
            chart.render();
        
        },
        error: function (status) { 
            document.querySelector("#dispo").innerHTML = '' ;  } 
     });
           
        };



// taux occupation des centres -----------------------------------------------------------------------------------

           function occupation_centre(datedeb , datefin, centre) {
              $.ajax( {
           url: "./assets/php/taux_occupation_centre.php", 
        type : 'GET',
        dataType : 'json',
        data: {  'datedeb': datedeb, 
                  'datefin' : datefin,
                  'centre' : centre , 
          },
        success: function(result){

            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                },
                stroke: {
                    width: [0,0, 5],
                    curve: 'straight'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ["#4099ff" , '#FF5370',"#0e9e4a", '#FFB64D'],
                series: [{
                    name: 'Taux occupation',
                    data: result['occupation'] , 
                    type: 'column',
                    
                },  
                { 
                    name : 'Taux astreinte' , 
                    data: result['astreinte'], 
                    type: 'column',
                },
                { 
                    name : 'Nombre des Agents' , 
                    data: result['agents'], 
                    type: 'line',
                },
                ],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "vertical",
                        shadeIntensity: 0.25,
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 0.7,
                        stops: [50, 100]
                    },
                },
              
               
                markers: {
                    size: 6,

                    hover: {
                        size: 5
                    }
                },
                xaxis: {
                    categories: result['centres'] , 
                },
                yaxis: {
                    min: 0 , 
                    
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: [{
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) + " %";
                            }
                            return y;

                        }
                    },
                    {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) + " %";
                            }
                            return y;

                        }
                    },
                    {
                        formatter: function(y) {
                            if (typeof y !== "undefined") {
                                return y.toFixed(0) + " agents";
                            }
                            return y;

                        }
                    }]
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            },
                            function() {
                                return ''
                            }
                        ]
                    }
                }
            }
            document.querySelector("#occupation_centre").innerHTML = '' ; 
            var chart = new ApexCharts(
                document.querySelector("#occupation_centre"),
                options
            );
            chart.render();

        }, 
        error : function(status) {  document.querySelector("#occupation_centre").innerHTML = '' }
      }) ; 
    };







