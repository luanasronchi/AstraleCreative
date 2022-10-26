<?php
    include("conecta.php");

    $cpf = $_POST["cpf"];
    $medica = $_POST["medica"];
    $procedimento = $_POST["procedimento"];
    $hora = $_POST["hora"];
    $dia = $_POST["dia"];
    $descricao = $_POST["descricao"];
    
    $id_paciente = $pdo->query("SELECT id FROM usuarios WHERE cpf='$cpf'")->fetch();
    $id_string = $id_paciente["0"];


    $comando = $pdo->prepare("INSERT INTO Procedimentos(id_paciente, id_medica, procedimento, dia, hora, observacao) VALUES(:id_paciente, :id_medica, :procedimento, :dia, :hora, :observacao)");  // Prepara o Comando de inserção
    $comando->bindValue(":id_paciente",$id_string);
    $comando->bindValue(":id_medica",$medica);
    $comando->bindValue(":procedimento",$procedimento);
    $comando->bindValue(":dia",$dia);
    $comando->bindValue(":hora",$hora);
    $comando->bindValue(":observacao",$descricao);
    $comando->execute();
    

    echo $cpf = $_POST["cpf"];
    echo $medica = $_POST["medica"];
    echo $procedimento = $_POST["procedimento"];
    echo $hora = $_POST["hora"];
    echo $dia = $_POST["dia"];
    echo $descricao = $_POST["descricao"];
?>