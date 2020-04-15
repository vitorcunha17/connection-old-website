<head>
    
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
                  
<script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

<style>
      #line_top_x {
     
          top: 280px;
          left: 170px;
        
          padding: 5px;
          position: relative        
      }
  </style>

</head>
<body>

<div id="line_top_x"></div>
<script>    
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback( drawChart );
   

    function drawChart() {
     
         console.log("DrawCharts");
        
        var lotacao = new google.visualization.DataTable();
      lotacao.addColumn('number', 'Day');
      lotacao.addColumn('number', 'Profissionais Incritos');
      lotacao.addColumn('number', 'Estagiários Inscritos');
      lotacao.addColumn('number', 'Vagas Para Profissionais');
      lotacao.addColumn('number', 'Vagas Para Estagiários');
      
      
      
        processaDados(lotacao);
      
    }
function processaDados(lotacao) {
       console.log("Em processa.. Chamando Ajax");
    getDados(function(results) {
        results = JSON.parse(results);
        if(results.length > 0) {                   
            for (var i = 0; i < results.length; i++)
                imprimeDados(results[i], lotacao);
        }
    });
}

function imprimeDados(data, plot){
     console.log("Estou na imprimeDados");
        plot.addRows([
            
        [1,  data.quantidade,  62,  34, 32],
        [2,  62,  23,  98, 49],
        [3,  46,  19,  23, 12],
        [4,  87,  75,  54, 76],
        [5,  12,  32,  12, 11]
      ]);
      
         
      var options = {
        chart: {
          title: 'Gráfico da Taxa de Inscrição',
          subtitle: 'Baseado em período mensais'
        },
        width: 900,
        height: 264,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(plot, google.charts.Line.convertOptions(options));
  
  
    aux = " Qntd: "+ data.quantidade;
    console.log(aux);
}




function getDados(callback){
    console.log("estou em ajax");
    $.ajax({
   
       url: "http://localhost/Sistema_v4/administracao/graph",
        success: function(resultado){
            callback(resultado);
       }
    });
}

     

</script>
</body>