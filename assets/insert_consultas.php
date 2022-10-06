<?php
    include("conecta.php");
    $cpf = $_POST["cpf"];
    $medica = $_POST["medica"];
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $descricao = $_POST["descricao"];
   
    $id_paciente = $pdo->query("SELECT id FROM Pacientes WHERE cpf='$cpf'");

    $comando = $pdo -> prepare("INSERT INTO Consultas(id_paciente, id_medica, dia, hora, observacao) VALUES(:id_paciente, :id_medica, :dia, :hora, :observacao)");  // Prepara o Comando de inserção
    $comando->bindValue(":id_paciente",$id_paciente);               // Seleciona o dado que será inserido
    $comando->bindValue(":id_medica",$id_medica);                   // Seleciona o dado que será inserido
    $comando->bindValue(":dia",$dia);                               // Seleciona o dado que será inserido
    $comando->bindValue(":hora",$hora);                             // Seleciona o dado que será inserido
    $comando->bindValue(":observacao",$observacao);                 // Seleciona o dado que será inserido
    $comando->execute();                                            // Executa o comando

?>
