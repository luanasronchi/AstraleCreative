<?php
include("conecta.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $nascimento = $_POST["nascimento"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $cidade = $_POST["cidade"];
    $rua = $_POST["rua"];
    $numero_casa = $_POST["numero_casa"];

    $comando = $pdo -> prepare("INSERT INTO Pacientes(nome, email, senha, nascimento, cpf, telefone, cidade, rua, numero_casa, observacao) VALUES(:nome, :email, :senha, :nascimento, :cpf, :telefone, :cidade, :rua, :numero_casa, :observacao)");  // Prepara o Comando de inserção
    $comando->bindValue(":nome",$nome);                                         // Seleciona o dado que será inserido
    $comando->bindValue(":email",$email);                                        // Seleciona o dado que será inserido
    $comando->bindValue(":senha",$senha);                                        // Seleciona o dado que será inserido
    $comando->bindValue(":nascimento",$nascimento);                                   // Seleciona o dado que será inserido
    $comando->bindValue(":cpf",$cpf);                                          // Seleciona o dado que será inserido
    $comando->bindValue(":telefone",$telefone);                                     // Seleciona o dado que será inserido
    $comando->bindValue(":cidade",$cidade);                                       // Seleciona o dado que será inserido
    $comando->bindValue(":rua",$rua);                                          // Seleciona o dado que será inserido
    $comando->bindValue(":numero_casa",$numero_casa);                                  // Seleciona o dado que será inserido
    $comando->bindValue(":observacao","");                                  // Seleciona o dado que será inserido
    $comando->execute();       
    header("Location:../login.html");               
?>