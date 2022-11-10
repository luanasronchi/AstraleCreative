<?php
    include("conecta.php");

    //comando sql.
    $comandoProc = $pdo->prepare("SELECT Pac.nome AS nomePac, Med.nome AS nomeMed, Pac.telefone, dia, hora, procedimento AS complemento, status FROM procedimentos AS Proc
    JOIN usuarios AS Pac ON Pac.id = Proc.id_paciente
    JOIN usuarios AS Med ON Med.id = Proc.id_medica
");
    $comandoCons = $pdo->prepare("SELECT Pac.nome AS nomePac, Med.nome AS nomeMed, Pac.telefone, dia, hora, Cons.observacao AS complemento, status FROM consultas AS Cons
    JOIN usuarios AS Pac ON Pac.id = Cons.id_paciente
    JOIN usuarios AS Med ON Med.id = Cons.id_medica");

    //executa a consulta no banco de dados.
    $comandoProc->execute();
    $comandoCons->execute();

    //Verifica se existe pelo menos um registro na tabela.
    if($comandoProc->rowCount() >= 1){
        //o fetch() transforma o retorno em um vetor (Use para um registro).
        $agenda_procedimento = $comandoProc->fetchAll();
    }

    if($comandoCons->rowCount() >= 1){
        //o fetch() transforma o retorno em um vetor (Use para um registro).
        $agenda_consulta = $comandoCons->fetchAll();
    }

    unset($comandoProc);
    unset($comandoCons);
    unset($pdo);
?>
