<?php
//isset checa se o botão enviar foi clicado e só vai disparar o email se for verdadeiro
if(isset($_POST['enviar'])){
    $assunto = "Evento Connection";

    // pegando os dados do form...

    $msg = "Olá " . $_POST["nome"] . ",<br><br>";
    $msg .= "Venha participar do lançamento da Connection." . "<br>"."Somos uma startup de RH que veio para trazer dinamismo e praticidade no processo de recrutamento e seleção." ."<br>"."Você é o nosso convidado VIP para conhecer de perto a plataforma e toda a equipe por trás da Connection." . "<br><br>";
    $msg .= "O Evento ocorrerá no Hotel Slaviero Essential Palace no dia 11 de abril às 19h - 2019. <br>"."Contato: +55 (41) 9 8817-1275"."<br><br>";
    $msg .= "CONNECTION - Connectando você com o futuro! <br>";

    // email onde tu vai receber a mensagem
    $destinatario =$_POST["email"];

    // headers que prepara a mensagem
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: " . 'Connection' . "<" .'connection@connectionrh.com.br'. ">\r\n";
    $headers .= "Reply-To: " . 'connection@connectionrh.com.br' . "\r\n";

    //aqui é só um exemplo para não rodar o script abaixo sem necessidade


    //porta, usuário, senha, nome data base
    //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
    $conexao = mysqli_connect("localhost", "id9002228_sadrak", "12345", "id9002228_connectionemail") or die("Erro na conexão com banco de dados " . mysqli_error($conexao));
 
   //Abaixo atribuímos os valores provenientes do formulário pelo método POST
   $nome = $_POST['nome']; 
   $email = $_POST['email'];
   $empresa = $_POST['empresa'];
   $fone_one = $_POST['fone_one'];
   $fone_whats = $_POST['fone_whats'];
   
 
    $string_sql = "INSERT INTO convidados ( nome, email, empresa, fone_one, fone_whats) VALUES ( '$nome','$email', '$empresa', '$fone_one', '$fone_whats')";
    $insert_member_res = mysqli_query($conexao, $string_sql);
    if($insert_member_res){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo '<script>alert("A Equipe Connection agradece pela atençao. Seus dados foram processados e em breve chegará em seu e-mail mais informaçoes sobre o evento.");</script>';	
        echo "<script>window.location = 'index.html';</script>"; 
    } else {
        echo '<script>alert("Ocorreu um erro! Revise os dados fornecidos :("); </script>';
    }
    mysqli_close($conexao); //fecha conexão com banco de dados

 }else{
     echo "Por favor, preencha os dados";
 }
 

    // envia o email...
    mail($destinatario,$assunto,$msg,$headers);







