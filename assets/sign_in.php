<?php
    include("conecta.php");

    $user = $_POST["user"];
    $password = $_POST["password"];

   $pass_email = "SELECT senha FROM Pacientes WHERE email='$user'";
   $pass_cpf = "SELECT senha FROM Pacientes WHERE cpf='$user'"; 

   $result_email = $pdo->query($pass_email)->fetch();
   $result_cpf = $pdo->query($pass_cpf)->fetch();

   if($result_email[0]==$password){
     echo pag_up('../pacientes.html');
   }
   elseif($result_cpf[0]==$password){
     echo pag_up('../pacientes.html');
   }
   else{
     echo pag_up('../cadastro.html');
   }
?>
