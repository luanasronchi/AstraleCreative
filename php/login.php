<?php
    include("conecta.php");

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
?>