<?php
    session_start();
    include("conecta.php");
    
    $cpf = $_POST["cpf"];

    $nome_paciente = $pdo->query("SELECT nome FROM usuarios WHERE cpf='$cpf'")->fetch();
    $nascimento_paciente = $pdo->query("SELECT nascimento FROM usuarios WHERE cpf='$cpf'")->fetch();
    $telefone_paciente = $pdo->query("SELECT telefone FROM usuarios WHERE cpf='$cpf'")->fetch();
    $cidade_paciente = $pdo->query("SELECT cidade FROM usuarios WHERE cpf='$cpf'")->fetch();
    $rua_paciente = $pdo->query("SELECT rua FROM usuarios WHERE cpf='$cpf'")->fetch();
    $numero_casa_paciente = $pdo->query("SELECT numero_casa FROM usuarios WHERE cpf='$cpf'")->fetch();
    $email_paciente = $pdo->query("SELECT email FROM usuarios WHERE cpf='$cpf'")->fetch();

    $_SESSION['$nome_paciente'] = $nome_paciente[0];
    $_SESSION['$nascimento_paciente'] = $nascimento_paciente[0];
    $_SESSION['$telefone_paciente'] = $telefone_paciente[0];
    $_SESSION['$cidade_paciente'] = $cidade_paciente[0];
    $_SESSION['$rua_paciente'] = $rua_paciente[0];
    $_SESSION['$numero_casa_paciente'] = $numero_casa_paciente[0];
    $_SESSION['$email_paciente'] = $email_paciente[0];
    $_SESSION['$cpf'] = $cpf;
    header("Location:../pacientes.php");      
?>