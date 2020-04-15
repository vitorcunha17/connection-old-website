<div class="row" s>
    <div class="content col-md-12">

        <div>
            <h3>Vagas em aberto (<span id="total_movies">0</span>)    -   <small> Por página: <span id="per_page" class="content"></span></small></h3>
            <div class="col-md-6 progress" style="display: none;">
                <div class="progress-bar" id="stream_progress" style="width: 0%;">0%</div>
            </div>
        </div> 
        <div>
            <input type="text" class="form-control" id="searchbox" value="" placeholder="Pesquisar &hellip;" autocomplete="off">
            <!--<span class="glyphicon glyphicon-search search-icon"></span>-->
        </div>


        
       
    </div>
</div>


 
  <!-- Start Pricing table -->
  <section id="pricing-table" style="margin-top: -65px">
    <div class="container">
      <div class="row">
        <div class="col-md-12" id="movies" >
          <div class="pricing-table-content" >
            <div class="row" >
         
            <script id="movie-template" type="text/html">
            <div class="col-md-3 col-sm-6 col-xs-12"style="margin-top:71px">
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                  <div class="price-header">
                    <span class="price-title"><%= nome_curso %></span>
                    <div class="price">
                    <h4 style="color:#fff"><%= nome_vaga %></h4>
                      <sup class="price-up">     <%= salario_vaga %></sup>
                    </div>
                  </div>
                  <div class="price-article">
                    <ul>
                     <small style="color:#074656">- <%= area_nome %></small><br>
                     <p style="color:#074656">Experiência:</p><small style="color:#f28b32"> <%= experiencia_vaga %></small><br>
                    <small style="color:#074656"> Empresa:</small> <small style="color:#f28b32"><%= empresa_vaga %></small>
                    </ul>
                  </div>
                  <div class="price-footer">
                        <form method="post" class="form_vagas">
                                <input type="hidden" name="id_vaga" value="<%= id_vaga %>">
                                <input type="hidden" name="empresa_id" value="<%= empresa_id %>">
                                <button type="submit" class="purchase-btn"  >Enviar curriculum</button>
                            </form>
                        </div>
                        </div>
                    </div>

              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
    
                                                                                                                                                                 
  </section>
<div id="pagination" class="movies-pagination col-md-9"></div>


<script id="genre_template" type="text/html">
    <div class="checkbox">
        <label>
            <input type="checkbox" value="<%= area_nome %>"> <%= area_nome %>
        </label>
    </div>
</script>
