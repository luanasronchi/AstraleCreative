<?php
    include("conecta.php");
    $cpf = $_POST["cpf"];
    $medica = $_POST["medica"];
    $hora = $_POST["Hora"];
    $dia = $_POST["dia"];
    $descricao = $_POST["descricao"];

    $id_paciente = $pdo->query("SELECT id FROM usuarios WHERE cpf='$cpf'")->fetch();
    $id_string = $id_paciente["0"];

    $comando = $pdo -> prepare("INSERT INTO Consultas(id_paciente, id_medica, dia, hora, observacao) VALUES(:paciente, :medica, :dia, :hora, :observacao)");  // Prepara o Comando de inserção
    $comando->bindValue(":paciente",$id_string);               // Seleciona o dado que será inserido
    $comando->bindValue(":medica",$medica);                   // Seleciona o dado que será inserido
    $comando->bindValue(":dia",$dia);                               // Seleciona o dado que será inserido
    $comando->bindValue(":hora",$hora);                             // Seleciona o dado que será inserido
    $comando->bindValue(":observacao",$descricao);                 // Seleciona o dado que será inserido
    $comando->execute();  
    header("Location:../agenda.php");  
?>