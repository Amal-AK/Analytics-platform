
// taux preventif global --------------------------------------------------------------------------------------------------
 $(function() {
      // get the data 
       
        $.ajax({
        url: "./assets/php/preventif_global.php", 
        type : 'GET',
        dataType : 'json',
       
        success: function(result){
            var pre = parseInt( result.preventif ) ; 
            var cur = parseInt ( result.curatif) ;
         var options = {
                chart: {
                    height: 230,
                    type: 'pie',
                },
                labels: ['Maintenance Préventive', 'Maintenance Curative'],
                series: [pre , cur ],
                colors: ["#4099ff", "#0e9e4a"],
                legend: {
                    show: true,
                    position: 'bottom',
                },
                fill: {
                    type: 'gradient', 
                    gradient: {
                        shade: 'light',
                        inverseColors: true,
                    }
                },
                dataLabels: {
                    enabled: true,
                    dropShadow: {
                        enabled: false,
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            }
            var chart = new ApexCharts(
                document.querySelector("#preventif_global"),
                options
            );
            chart.render();

          }}) ; 
           
        });




    // [ equipements chart] start---------------------------------------------------------------------------


    $(function() {
        $.ajax({
        url: "./assets/php/equipements.php", 
        type : 'GET',
        dataType : 'json',
        success: function(result){
            var dis = parseInt( result["dispo"]) ; 
            var indis = parseInt( result["total"]) - parseInt( result["dispo"]) ; 
            var options = {
            chart: {
                height: 160,
                type: 'donut',
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%'
                    }
                }
            },
            labels: ['Disponible', 'Indisponible'],
            series: [dis , indis ]  ,
            legend: {
                show: false
            },
            tooltip: {
                theme: 'datk'
            },
            grid: {
                padding: {
                    top: 20,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
            },
            colors: ["#2ed8b6" ,"#ffcb80"],
            fill: {
                opacity: [1, 1]
            },
            stroke: {
                width: 0,
            }
        }
        var chart = new ApexCharts(document.querySelector("#equ-chart"), options);
        chart.render();
         $('.nb_equ_total').text(result["total"] ) ; 
            $('.nb_dispo').text(result["dispo"] ) ;
               $('.nb_indispo').text(indis) ;
        }});
    }) ; 
        

  // [ equipements chart] end 


    // [ inter chart] start--------------------------------------------------------------------------------------

  $(function() {
     var today =  new Date().toLocaleString().slice(0,10).split('-').reverse().join('/') ; 
     var firstday='01' + today.slice(2.10) ; 
     $.ajax({
        url: "./assets/php/inter.php", 
        type : 'GET',
        dataType : 'json',
        data : { 'datedeb' : firstday , 
                 'datefin': today , 

        } , 
        success: function(result){
            var actif = parseInt( result["actif"]) ; 
            var inactif = parseInt( result["total"]) - parseInt( result["actif"]) ; 
            var options = {
            chart: {
                height: 160,
                type: 'donut',
            },
            dataLabels: {
                enabled: false
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '75%'
                    }
                }
            },
            labels: ['Nombre actifs', 'Nombre inactifs'],
            series: [actif , inactif , ],
            legend: {
                show: false
            },

            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: 20,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
            },
            colors: ["#73b4ff", "#ff869a" ],
            fill: {
                opacity: [1, 1]
            },
            stroke: {
                width: 0,
            }
        }
        var chart = new ApexCharts(document.querySelector("#inter-chart"), options);
        chart.render();
         $('.nb_inter').text(result["total"] ) ; 
         $('.nb_actif').text(actif) ;
         $('.nb_inactif').text(inactif) ;
        }}) ; 
        
    // [ inter chart] end 
    });
  


    /* ordo actifs ------------------------------------------------------------------------------------- */


    $(function() {
        $.ajax({
        url: "./assets/php/ordo_total.php", 
        type : 'GET',
        dataType : 'json',
        success: function(result){ 
             console.log(result) ; 
             $('#ordo_total').text(result["total"] ) ; 
             $('#nb_ordo').text(result["month"] ) ; 
        } 
    })
    }) ; 


    $(function() {
        $.ajax({
        url: "./assets/php/diagnostic_total.php", 
        type : 'GET',
        dataType : 'json',
        success: function(result){ 
             console.log(result) ; 
             $('#diagnostic_total').text(result["total"] ) ; 
             $('#nb_diagnostic').text(result["month"] ) ; 
        } 
    })
    }) ; 


/* real time line chart ---------------------------------------------------------------------------------*/


$(document).ready(function() {


    $.ajax({
        url: "./assets/php/ot_ordo.php", 
        type : 'GET',
        dataType : 'json',
       
        success: function(result){
          

        }}) ; 
 
    var options = {
        series: [{
        name: 'Nombre OT',
        data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5]
      }],
        chart: {
        height: 350,
        type: 'line',
        zoom: {
            enabled: true
        }
      },
      stroke: {
        width: 7,
        curve: 'smooth'
      },
      xaxis: {
        type : 'date' , 
        categories: ['1/11/2020', '2/11/2020', '3/11/2020', '4/11/2020', '5/11/2020', '6/11/2020', '7/11/2020', '8/11/2020', '9/11/2020', '10/11/2020', '11/11/2020', '12/11/2020'],
        labels: {
            formatter: function(value ) {
              return value ;  
            }
      }
    },
      tooltip: {
        x: {
            format: 'dd/MM/yy'
        },
    }, 
    
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          gradientToColors: [ '#FDD835'],
          shadeIntensity: 1,
          type: 'horizontal',
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100, 100, 100]
        },
      },
      markers: {
        size: 4,
        colors: ["#FFA41B"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
          size: 7,
        }
      },
      yaxis: {
        min: -10,
        max: 40,
        title: {
          text: 'Nombre des OT',
        },
      }
      };
            var chart = new ApexCharts(
                document.querySelector("#line-chart-1"),
                options
            );
            chart.render();
        }); 

