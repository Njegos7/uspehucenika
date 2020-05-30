$(document).ready(function(){
           $.ajax({
               url: "http://localhost/A24/data.php",
               method: "GET",
               success: function(data){
                   console.log(data);
                   var Razred = [];
                   var ProsOcena = [];
                   
                   for(var i in data){
                       Razred.push("Odlicni "+data[i].Razred);
                       ProsOcena.push(data[i].ProsOcena);
                   }
                   
                   var chartdata = {
                       labels: ProsOcena,
                       datasets: [
                           {
                               label: 'Prosecne ocene',
                                backgroundColor: 'rgba(200, 200, 200, 0.75)',
                                borderColor: 'rgba(200, 200, 200, 0.75)',
                                hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                                hoverBorderColor: 'rgba(200, 200, 200, 1)',
                                data: Odlican
                           }
                       ]
                   };
                   
                   var ctx = $("#graphCanvas");
                   
                   var barGraph = new Chart(ctx, {type: 'bar', data: chartdata});
               },
               
               error: function(data){
                   console.log(data);
               }
           }); 
        });