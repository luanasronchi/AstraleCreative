<?php
    include("conecta.php");
    $func = $_POST["func"];
    $funcAlt = $_POST["funcAlt"];

    if($funcAlt=="logout"){
      session_destroy();
      header("location:../login.html");
    }

    if($func=="login"){
        $email = $_POST["email"];
        $cpf = $_POST["email"];
        $password = $_POST["password"];
    
        $comando = $pdo->prepare("SELECT id, senha, is_adm FROM Usuarios WHERE email = :email");

    //insere valores das variaveis no comando sql.
    $comando->bindValue(":email", $email);

    //executa a consulta no banco de dados.
    $comando->execute();

    //Se a consulta retornar uma única linha significa que o email inserido existe.
    if ($comando->rowCount() == 1) {
        //o fetch() transforma o retorno em um array (use apenas se o retorno for apenas um registro, ou seja, uma única linha da tabela).
        $resultado = $comando->fetch();

        //Comparar senha informada com a senha armazenado no banco de dados.
        if ($resultado['senha'] == $password) {
            //inicia uma sessão.
            session_start();

            //insere informações na sessão.
            $_SESSION['id'] = $resultado['id'];
            $_SESSION['senha'] = $resultado['senha'];
            $_SESSION['is_adm'] = $resultado['is_adm'];
            $_SESSION['loggedin'] = true;

            //redireciona para a pagina informada.
            header("Location:../pacientes.html");
        } else {
            echo ("Email ou Senha Inválida!");
        }
    } else {
        echo ("Email ou Senha Inválida!");
    }
    //Fecha declaração e conexão.
    unset($comando);
    unset($pdo);
    }

    if($func=="register"){
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
      $comando->execute();                                                        // Executa o comando
  
      echo pag_up('../login.html');
    }

    if($func=="insert_consultas"){
      $cpf = $_POST["cpf"];
      $medica = $_POST["medica"];
      $hora = $_POST["Hora"];
      $dia = $_POST["dia"];
      $descricao = $_POST["descricao"];
    
      $id_paciente = $pdo->query("SELECT id FROM Pacientes WHERE cpf='$cpf'")->fetch();
      $id_string = $id_paciente["0"];


      $comando = $pdo -> prepare("INSERT INTO Consultas(id_paciente, id_medica, dia, hora, observacao) VALUES(:paciente, :medica, :dia, :hora, :observacao)");  // Prepara o Comando de inserção
      $comando->bindValue(":paciente",$id_string);               // Seleciona o dado que será inserido
      $comando->bindValue(":medica",$medica);                   // Seleciona o dado que será inserido
      $comando->bindValue(":dia",$dia);                               // Seleciona o dado que será inserido
      $comando->bindValue(":hora",$hora);                             // Seleciona o dado que será inserido
      $comando->bindValue(":observacao",$descricao);                 // Seleciona o dado que será inserido
      $comando->execute();                                   // Executa o comando
      
      echo pag_up('../consultas.html');
    }

    if($func=="insert_procedimentos"){
      $cpf = $_POST["cpf"];
      $medica = $_POST["medica"];
      $procedimento = $_POST["procedimento"];
      $hora = $_POST["hora"];
      $dia = $_POST["dia"];
      $descricao = $_POST["descricao"];
     
      $id_paciente = $pdo->query("SELECT id FROM usuarios WHERE cpf='$cpf'")->fetch();
      $id_string = $id_paciente["0"];
  
  
      $comando = $pdo->prepare("INSERT INTO Procedimentos(id_paciente, id_medica, procedimento, dia, hora, observacao) VALUES(:id_paciente, :id_medica, :procedimento, :dia, :hora, :observacao)");  // Prepara o Comando de inserção
      $comando->bindValue(":id_paciente",$id_string);               // Seleciona o dado que será inserido
      $comando->bindValue(":id_medica",$medica);                   // Seleciona o dado que será inserido
      $comando->bindValue(":procedimento",$procedimento);                   // Seleciona o dado que será inserido
      $comando->bindValue(":dia",$dia);                               // Seleciona o dado que será inserido
      $comando->bindValue(":hora",$hora);                             // Seleciona o dado que será inserido
      $comando->bindValue(":observacao",$descricao);                 // Seleciona o dado que será inserido
      $comando->execute();                                   // Executa o comando
      
  
      echo $cpf = $_POST["cpf"];
      echo $medica = $_POST["medica"];
      echo $procedimento = $_POST["procedimento"];
      echo $hora = $_POST["hora"];
      echo $dia = $_POST["dia"];
      echo $descricao = $_POST["descricao"];
      
      /* echo pag_up('../consultas.html'); */
    }

    if($func=="schedule"){
      include("conecta.php");

    //comando sql.
    $comando = $pdo->prepare("SELECT dia, hora, FROM procedimentos");

    //executa a consulta no banco de dados.
    $comando->execute();

    //Verifica se existe pelo menos um registro na tabela.
    if($comando->rowCount() >= 1)
    {
        //o fetch() transforma o retorno em um vetor (Use para um registro).
        $informacoes_usuario = $comando->fetch();
    }else{
        echo("Não há usuários cadastrados.");
    }

    unset($comando);
    unset($pdo);
    }

?>