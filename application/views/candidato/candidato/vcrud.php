


<!DOCTYPE html>
  <html>
    <head>
	<meta charset="utf-8">
         <!--Import Google Icon Font-->
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link rel="stylesheet" href="materialize/css/materialize.min.css">


          <title> Painel Administrativo </title>
    </head>

    <body>

<!--JavaScript at end of body for optimized loading-->
      
	<nav class="blue-grey">
    <div class="nav-wrapper container">

     <div class="brand-logo ligth">Conecta Saúde</div>
     <ul class="right">

     <li> <a href="cadastrar.php"><i class ="material-icons left">account_circle</i>Cadastro</a></li>
     <li> <a href="gerenciador.php"> <i class ="material-icons left">account_circle</i> Gerenciador</a></li>
     <li> <a href=""><i class ="material-icons left">alarm</i>Alertas</a></li>

   <a href="sair.php">Sair</a>

     
     
     </div>
     


      </nav>

       <div class="row container">
       <p> &nbsp</p>

      




<form action="dados/create.php"methodo="post"class="col s12">

<fieldset class="formulario">  

<legend><img src="assets/imag/ad.jpg"alt="[imag]"widith="100"></legend>
<h5 class="light center"><strong>SISTEMA DE GERENCIAMENTO HOSPITALAR</strong></h5>




<div class=" input-field col s12">
<input type="reset" value="Conectados" class="btn blue">
<input type="reset" value="24/7" class="btn red">

 </div>


</fieldset>

</form>

     <script type="text/javascript "src="materialize/js/jquery-3.3.1.min.js"></script>
     <script type="text/javascript "src="materialize/js/materialize.min.js"></script>

     <script type="text/javascript">

     $(document ).ready(funcion())
     {

     };
     
     </script>
 

<!-- dsdijasdkjaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->


  <div id="app">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>
        <div class="col-md-12">
           <table class="table bg-dark my-3">
               <tr>
                   <td> <button class="btn btn-default btn-block" @click="addModal= true">Adicionar novo registro</button></td>
                  <td><input placeholder="pesquisar"type="search" class="form-control" v-model="search.text" @keyup="caribiodata" name="search"></td>
               </tr>
           </table>
           <table class="table is-bordered is-hoverable">
               <thead class="text-white bg-dark" >
                
                <th class="text-white">ID</th>
                <th class="text-white">Nome</th>
                <th class="text-white">Celular</th>
                <th class="text-white">Telefone</th>
               
                <th colspan="2" class="text-center text-white">Açao</th>
                </thead>
                <tbody class="table-light">
                    <tr v-for="crud in biodata" class="table-default">
                        <td>{{crud.id}}</td>
                        <td>{{crud.nama}}</td>
                        <td>{{crud.alamat}}</td>
                        <td>{{crud.nohp}}</td>
                       
                        <td><button class="btn btn-info fa fa-edit" @click="editModal = true; selectbiodata(crud)"></button></td>
                        <td><button class="btn btn-danger fa fa-trash" @click="deleteModal = true; selectbiodata(crud)"></button></td>
                    </tr>

                    <tr v-if="emptyResult">
                      <td colspan="9" rowspan="4" class="text-center h3">Nao encontrado no Banco de Dados ):</td>
                  </tr>
                </tbody>
                
            </table>
             
        </div>
  
    </div>
    <pagination
        :current_page="currentPage"
        :row_count_page="rowCountPage"
         @page-update="pageUpdate"
         :total_biodata="totalbiodata"
         :page_range="pageRange"
         >
      </pagination>
</div>
<?php include 'modal.php';?>

</div>
