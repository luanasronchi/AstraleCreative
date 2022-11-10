<?php
    include("conecta.php");

    //comando sql.
    $comando = $pdo->prepare("SELECT Pac.nome AS nomePac, Med.nome AS nomeMed, Pac.telefone, dia, hora, procedimento AS complemento, status FROM procedimentos AS Proc
    JOIN usuarios AS Pac ON Pac.id = Proc.id_paciente
    JOIN usuarios AS Med ON Med.id = Proc.id_medica;
");

    //executa a consulta no banco de dados.
    $comando->execute();

    //Verifica se existe pelo menos um registro na tabela.
    if($comando->rowCount() >= 1){
        //o fetch() transforma o retorno em um vetor (Use para um registro).
        $informacoes_agenda = $comando->fetchAll();
        
    }else{
        echo("Não há usuários cadastrados.");
    }

    unset($comando);
    unset($pdo);
?>
