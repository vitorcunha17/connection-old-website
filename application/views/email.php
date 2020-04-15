<?php
// destinatário
$para  = 'email@email.com';

// assunto
$assunto = 'teste';

// mensagem
$mensagem = '
<html>
<head>
 <title>Testando um formulario</title>
</head>
<body>
<p>Eu sou um louco!</p>
<table>
 <tr>
  <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
 </tr>
 <tr>
  <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
 </tr>
 <tr>
  <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
 </tr>
</table>
</body>
</html>
';

//Para enviar email em HTML, o cabeçalho Content-type deve ser definido
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//Cabeçalhos adicionais
$headers .= 'Para: Misael <email@email.com>' . "\r\n";
$headers .= 'De: Usuário do site <email@email.com>' . "\r\n";
$headers .= 'Cc: email@email.com' . "\r\n";
$headers .= 'Bcc: email@email.com' . "\r\n";

// Mail it
mail($para, $assunto, $mensagem, $headers);
?>