<?php
    include("conecta.php");

    //comando sql.
    $comando = $pdo->prepare("SELECT * FROM procedimentos AS P
    INNER JOIN usuarios AS U
    ON P.id_paciente = U.id OR P.id_medica = U.id;
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
