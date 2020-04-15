
<html>
    <head>

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript"> window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?></script>
        <style>
            #line_top_x {

           
                margin-left: 100px;

                padding: 5px;
            
            }
        </style>


       


    </head>

    <body>


      <section class="statistics">
        <div class="container-fluid">
          <div class="row d-flex">
            <div class="col-lg-4">
              <!-- Income-->
              <div class="card income text-center">
                <div class="icon"><i class="icon-line-chart"></i></div>
                <div class="number">126,418</div><strong class="text-primary">All Income</strong>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- Monthly Usage-->
              <div class="card data-usage">
                <h2 class="display h4">Monthly Usage</h2>
                <div class="row d-flex align-items-center">
                  <div class="col-sm-6">
                    <div id="progress-circle" class="d-flex align-items-center justify-content-center"></div>
                  </div>
                  <div class="col-sm-6"><strong class="text-primary">80.56 Gb</strong><small>Current Plan</small><span>100 Gb Monthly</span></div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- User Actibity-->
              <div class="card user-activity">
                <h2 class="display h4">User Activity</h2>
                <div class="number">210</div>
                <h3 class="h4 display">Social Users</h3>
                <div class="progress">
                  <div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>
                </div>
                <div class="page-statistics d-flex justify-content-between">
                  <div class="page-statistics-left"><span>Pages Visits</span><strong>230</strong></div>
                  <div class="page-statistics-right"><span>New Visits</span><strong>73.4%</strong></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   
        <div id="line_top_x"></div>


    




        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script defer src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script defer src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js"></script>
        <script>
            google.charts.load('current', {'packages': ['line']});
            google.charts.setOnLoadCallback(drawChart);


            function drawChart() {

                var lotacao = new google.visualization.DataTable();
                var data = 40;
                lotacao.addColumn('number', 'Day');
                lotacao.addColumn('number', 'Vagas Para Estagiários');
                lotacao.addColumn('number', 'Vagas Para Profissionais');
                lotacao.addColumn('number', 'Estagiários Inscritos');
                lotacao.addColumn('number', 'Profissionais Incritos');

                imprimeDados(data, lotacao);

            }
            function processaDados(lotacao) {
                //    getDados(
                //            function(results) {
                //        results = JSON.parse(results);
                //       for(var i=0; i<results.length-1; i++){
                //            var profissional = parseInt(results[0][i].profissionais);
                //            var estagiario =   parseInt(results[1][0].Estagiarios);
                //            var dia = parseInt(results[0][i].dia);
                //            var Vagas_Estagio = parseInt(results[2][0].VagasEP);
                //            var Vagas_Profissional = parseInt(results[2][1].VagasEP);
                //
                //          if(profissional == null){
                //              profissional = 0;
                //          }
                //           if(estagiario == null){
                //              estagiario = 0;
                //            }
                //             if(dia == null){
                //               dia = 0;
                //               }
                //               if(Vagas_Estagio == null){
                //                 Vagas_Estagio = 0;
                //                   }
                //
                //                  if(Vagas_Profissional == null){
                //                     Vagas_Profissional = 0;
                //                        }
                //
                //
                //        var grafico =[dia, Vagas_Estagio, Vagas_Profissional, estagiario, profissional];
                //                     imprimeDados(grafico, lotacao);
                //
                //
                //
                //    }
                //    });


            }

            function imprimeDados(data, plot) {
                //     console.log(data);
                //
                //        plot.addRows([
                //                       data
                //    ]);
                //
                plot.addRows([
                    [1, 7.6, 12.3, 9.6, 8],
                    [2, 12.3, 29.2, 10.6, 9],
                    [3, 16.9, 42.9, 14.8, 10],
                    [4, 12.8, 30.9, 11.6, 12],
                    [5, 53, 79, 4.7, 5],
                    [6, 66, 84, 52, 6],
                    [7, 48, 63, 3.6, 3],
                    [8, 4.2, 6.2, 3.4, 10],
                    [9, 11.7, 18.8, 10.5, 43],
                    [10, 153, 64, 100.4, 42],
                    [11, 35, 75, 78, 53],
                    [12, 37.8, 80.8, 41.8, 12],
                    [13, 70, 69.5, 50, 31],
                    [14, 54, data, 80, 67]
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



            }




            function getDados(callback) {

                $.ajax({

                    url: "http://localhost/Sistema_v4/administracao/graph",
                    success: function(resultado) {
                        callback(resultado);
                    }
                });
            }



        </script>





    </body>
</html>