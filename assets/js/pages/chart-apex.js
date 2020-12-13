 
 
 "use strict";


 
 var options = {
    series: [{
    name: 'Inflation',
    data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
  }],
    chart: {
    height: 350,
    type: 'bar',
  },
  plotOptions: {
    bar: {
      dataLabels: {
        position: 'top', // top, center, bottom
      },
    }
  },
  dataLabels: {
    enabled: true,
    formatter: function (val) {
      return val + "%";
    },
    offsetY: -20,
    style: {
      fontSize: '12px',
      colors: ["#304758"]
    }
  },
  
  xaxis: {
    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    position: 'top',
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      fill: {
        type: 'gradient',
        gradient: {
          colorFrom: '#D8E3F0',
          colorTo: '#BED1E6',
          stops: [0, 100],
          opacityFrom: 0.4,
          opacityTo: 0.5,
        }
      }
    },
    tooltip: {
      enabled: true,
    }
  },
  yaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false,
    },
    labels: {
      show: false,
      formatter: function (val) {
        return val + "%";
      }
    }
  
  },
  title: {
    text: 'Monthly Inflation in Argentina, 2002',
    floating: true,
    offsetY: 330,
    align: 'center',
    style: {
      color: '#444'
    }
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();



// initialisation -------------------------------------------------------------------------------------------
   var today =  new Date().toLocaleString().slice(0,10).split('-').reverse().join('/') ; 
   var firstday='01' + today.slice(2.10) ; 
   taux_preventif_usine(firstday , today ) ;
   realisation_preventif(firstday , today)  ; 
   disponibilite (firstday, today) ;
   occupation_centre(firstday, today) ; 


   //calls-------------------------------------------------------------------------------------------------------

// clic btn filtrer taux preventif 
   $("#taux_preventif_btn")[0].onclick = function(){
    var dd= $("#taux_prev_dd").val() ; 
    var df = $("#taux_prev_df").val();
    $("#taux_prev_dd").removeClass("is-invalid") ;
    $("#taux_prev_df").removeClass("is-invalid") ;

  
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
       taux_preventif_usine(dd , df)  ; 
   }

     };



     // clic btn realisation preventif filtrer 
 $("#realisation_pre_btn")[0].onclick = function(){
    var dd= $("#realisation_pre_dd").val() ; 
    var df = $("#realisation_pre_df").val();
    $("#realisation_pre_dd").removeClass("is-invalid") ;
    $("#realisation_pre_df").removeClass("is-invalid") ;
  
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
       realisation_preventif(dd , df)  ; 
   }

     };



     // clic btn filtrer disponibilité 

 $("#dispo_btn")[0].onclick = function(){
    var dd= $("#dispo_dd").val() ; 
    var df = $("#dispo_df").val();
    $("#dispo_dd").removeClass("is-invalid") ;
    $("#dispo_df").removeClass("is-invalid") ;
  
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
       disponibilite(dd , df)  ; 
   }

     };







     // clic btn filtrer occupation centre 


 $("#occupation_centre_btn")[0].onclick = function(){
    var dd=  $("#occupation_centre_dd").val() ; 
    var df = $("#occupation_centre_df").val();
    $("#occupation_centre_dd").removeClass("is-invalid") ;
    $("#occupation_centre_df").removeClass("is-invalid") ;
  
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
         occupation_centre(dd , df)  ; 
       }

     };

// indicateur taux préventif pour chaque centre --------------------------------------------------------------------------

    function taux_preventif_usine(datedeb , datefin) {

          $.ajax({
        url: "./assets/php/taux_preventif.php", 
        type : 'GET',
        dataType : 'json' , 
        data: {  'datedeb': datedeb, 
                 'datefin' : datefin,
          },
        success: function(result){
                var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [5, 5, 7],
                    curve: 'straight',
                    dashArray: [0, 0, 8]
                },
                colors: ["#0e9e4a",  "#FF5370","#FFB64D"],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: 'light'
                    },
                },
                series: [{
                        name: "Total travail préventif",
                        data: result["preventif"] 
                    },
                    {
                        name: "Total travail Curatif",
                        data: result["curatif"]  
                    },
                    {
                        name: 'Ratio (p/c+p) ',
                        data: result["ratio"] 
                    }
                ],
                title: {
                    text: 'Pourcentage par centre',
                    align: 'left'
                },
                markers: {
                    size: 0,

                    hover: {
                        sizeOffset: 8
                    }
                },
                xaxis: {
                    categories: result["centres"],
                },
                tooltip: {
                    y: [{
                        title: {
                            formatter: function(val) {
                                return val + " (heures)"
                            }
                        }
                    }, {
                        title: {
                            formatter: function(val) {
                                return val + " (heure)"
                            }
                        }
                    }, {
                        title: {
                            formatter: function(val) {
                                return val+ '  %';
                            }
                        }
                    }]
                },
                grid: {
                    borderColor: '#f1f1f1',
                }
            }
            document.querySelector("#usine-taux-preventif").innerHTML= '' ; 
            var chart = new ApexCharts(
                document.querySelector("#usine-taux-preventif"),
                options
            );
            chart.render();


        }}) ; 
        };




// chart indicateur réalisation de préventif ------------------------------------------------------------------------
      function realisation_preventif(datedeb , datefin) {


         $.ajax( {
        url: "./assets/php/realisation_preventif.php", 
        type : 'GET',
        dataType : 'json',
         data: {  'datedeb': datedeb, 
                  'datefin' : datefin,
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
                        endingShape: 'rounded'
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
                    data: result["realise"]
                }, {
                    name: 'Nombre de demandes',
                    data: result["total"]
                }, {
                    name: 'Réalisation du préventif',
                    data: result["pourcentage"]
                }],
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
                        title: {
                            formatter: function(val) {
                                return val + " (nombre BT)"
                            }
                        }
                    }, {
                        title: {
                            formatter: function(val) {
                                return val + " (nombre BT)"
                            }
                        }
                    }, {
                        title: {
                            formatter: function(val) {
                                return val+ '  %';
                            }
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
        } });
    };


      // disponibilité des eqipements -----------------------------------------------------------------------------

       function disponibilite(datedeb , datefin) {
         $.ajax( {
           url: "./assets/php/disponibilite.php", 
        type : 'GET',
        dataType : 'json',
        data: {  'datedeb': datedeb, 
                  'datefin' : datefin,
          },
        success: function(result){
             var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    }
                },
                colors: ["#4099ff",  "#FFB64D","#0e9e4a"],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                    },
                },
                series: [{
                    name: 'Taux de Disponibilité',
                    data: result["disponibilite"]
                }, {
                    name: 'Maintenabilité',
                    data: result['maintenabilite']
                }, {
                    name: 'Fiabilité',
                    data: result["fiabilite"]
                }],
                xaxis: {
                   
                    categories: result["centres"]
                },
                legend: {
                    position: 'right',
                    offsetY: 40
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        inverseColors: true,
                        opacityFrom: 0.8,
                        opacityTo: 1,
                        stops: [0, 100]
                    },
                },
            }
             document.querySelector("#dispo").innerHTML = '' ; 
            var chart = new ApexCharts(
                document.querySelector("#dispo"),
                options
            );
            chart.render();
        
        }});
           
        };



       // taux occupation des centres -----------------------------------------------------------------------------------

           function occupation_centre(datedeb , datefin) {

              $.ajax( {
           url: "./assets/php/taux_occupation_centre.php", 
        type : 'GET',
        dataType : 'json',
        data: {  'datedeb': datedeb, 
                  'datefin' : datefin,
          },
        success: function(result){


            var options = {
                chart: {
                    height: 400,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ["#4099ff", "#0e9e4a"],
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '12px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        inverseColors: true,
                        opacityFrom: 0.8,
                        opacityTo: 1,
                        stops: [0, 100]
                    },
                },
                series: [{
                     name: 'Taux occupation',
                    data: result['occupation']
                }, {
                    name : 'Taux astreinte' , 
                    data: result['astreinte']
                }],
                xaxis: {
                    categories: result['centres'] , 
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " %"
                        }
                    }
                }
            }
            document.querySelector("#occupation_centre").innerHTML = '' ; 
            var chart = new ApexCharts(
                document.querySelector("#occupation_centre"),
                options
            );
            chart.render();

        }}) ; 
        };