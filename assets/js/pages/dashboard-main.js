
// taux preventif global --------------------------------------------------------------------------------------------------
 $(function() {
      // get the data 
        var today =  new Date().toLocaleString().slice(0,10).split('-').reverse().join('/') ; 
        var firstday='01' + today.slice(2.10) ; 
        $.ajax({
        url: "/web/assets/php/preventif_global.php", 
        type : 'GET',
        dataType : 'json',
        data : { 'datedeb' : firstday , 
                 'datefin': today , 

        } , 
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
        url: "/web/assets/php/equipements.php", 
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
        url: "/web/assets/php/inter.php", 
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
  
