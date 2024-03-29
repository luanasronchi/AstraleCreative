<?php
  session_start();
  include("php/conecta.php");
  error_reporting(0);
  ini_set('display_errors',0);

  $nome_paciente = $_SESSION['$nome_paciente'];
  $nascimento_paciente = $_SESSION['$nascimento_paciente'];
  $telefone_paciente = $_SESSION['$telefone_paciente'];
  $cidade_paciente = $_SESSION['$cidade_paciente'];
  $rua_paciente = $_SESSION['$rua_paciente'];
  $numero_casa_paciente = $_SESSION['$numero_casa_paciente'];
  $email_paciente = $_SESSION['$email_paciente'];
  $cpf = $_SESSION['$cpf'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <title>Unic Stetic Center - Pacientes </title>
  <link rel="stylesheet" href="assets/style.css">
  <script src="assets/script.js" defer></script>
</head>

<body class="body-panel white_theme">
    <div class="panel mt-5">
        <div class="margin-top">
          
            <section class="navbar justify-content-between p-0">
                <h1 class="h1">Pacientes</h1> 
                <form action="php/cpf_search.php" method="POST" class="d-flex flex-row">
                  <input name="cpf" class="form-control btn-outline me-1 input_all" type="search" placeholder="CPF" aria-label="Search">
                  <input type="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Buscar">
                </form>
            </section>
          <div>
                <div class="row">
                  <div class="col-md-3 p-4">
                    <div class="row mt-2">
                      <label class="p-1" for="nome">Nome:</label><br>
                      <input class=" form-control p-1 input_all" value= <?php echo '"'.$nome_paciente.'"'; ?> id="nome" type="text" required readonly>
                    </div>
                    <div class="row mt-2">
                      <label class="p-1" for="nascimento">Nascimento:</label><br>
                      <input class=" form-control p-1 input_all" value= <?php echo '"'.$nascimento_paciente.'"'; ?> id="nascimento" type="date" required readonly>
                    </div>
                    <div class="row mt-2">
                      <label class="p-1" for="cpf">CPF:</label><br>
                      <input class=" form-control p-1 input_all" value= <?php echo '"'.$cpf.'"'; ?> id="cpf" type="text" required readonly>
                    </div>
                    <div class="row mt-2">
                      <label class="p-1" for="telefone">Telefone:</label><br>
                      <input class=" form-control p-1 input_all" value= <?php echo '"'.$telefone_paciente.'"'; ?> id="telefone" type="text" required readonly>
                    </div>
                  </div>
                  <div class="col-md-3 p-4">
                      <div class="row mt-2">
                          <label class="p-1" for="cidade">Cidade:</label><br>
                          <input class=" form-control p-1 input_all" value= <?php echo '"'.$cidade_paciente.'"'; ?> id="cidade" type="text" required readonly>
                        </div>
                        <div class="row mt-2">
                          <label class="p-1" for="rua">Rua:</label><br>
                          <input class=" form-control p-1 input_all" value= <?php echo '"'.$rua_paciente.'"'; ?> id="rua" type="text" required readonly>
                        </div>
                        <div class="row mt-2">
                          <label class="p-1" for="numero">Número:</label><br>
                          <input class=" form-control p-1 input_all" value= <?php echo '"'.$numero_casa_paciente.'"'; ?> id="numero" type="text" required readonly>
                        </div>
                        <div class="row mt-2">
                          <label class="p-1" for="email">E-mail:</label><br>
                          <input class=" form-control p-1 input_all" value= <?php echo '"'.$email_paciente.'"'; ?> id="email" type="text" required readonly>
                        </div>
                  </div>
                  <div class="col-md-6 my-auto">
                      <h3>Observação</h3>
                      <textarea class="form-control input_all" name="obs" id="obs" rows="10"></textarea>
                  </div>
                </div>
                  <div class="col">
                      <div class="row-m">
                          <h3>Histórico</h3>
                          <textarea class="form-control input_all" rows="10"></textarea>
                      </div>
                  </div>
              </div>
        </div>
      </div>
<!-- ------------------------ -->
<nav>
  <div class="logo">
    <i class="bx bx-menu bx-sm menu-icon"></i>
    <span class="logo-name">Unic Stetic Center</span>
  </div>
  <div class="sidebar">
    <div class="logo">
      <i class="bx bx-menu bx-sm menu-icon"></i>
      <img id="sidebar_logo" src="assets/img/sidebar_logo_black.svg" alt="" width="50%">
    </div>

    <div class="sidebar-content">
      <ul class="p-1 lists">
        <li class="list">
          <a href="pacientes.php" class="nav-link">
            <i class="bx bx-home icon"></i>
            <span class="link">Pacientes</span>
          </a>
        </li>
        <li class="list">
          <a href="consultas.html" class="nav-link">
            <i class="bx bx-clipboard icon"></i>
            <span class="link">Consultas</span>
          </a>
        </li>
        <li class="list">
            <a href="procedimentos.html" class="nav-link">
              <i class="bx bx-clipboard icon"></i>
              <span class="link">Procedimentos</span>
            </a>
        </li>
        
        <li class="list">
          <a href="agenda.php" class="nav-link">
            <i class="bx bx-time-five icon"></i>
            <span class="link">Agenda</span>
          </a>
        </li>
      </ul>

      <div class="bottom-cotent">
        <li class="list">
          <a href="#" class="nav-link">
            <i class="icon">
            <div class="form-check form-switch">
             <input class="form-check-input" name="change-theme" id="change-theme" type="checkbox" >
            </div>
            </i>
            <span class="link">Tema</span>
          </a>
        </li>
        <li class="list">
          <form id="logout" action="php/logout.php" method="POST">
          <a class="nav-link" href="#" onclick="document.getElementById('logout').submit()">
            <i class="bx bx-log-out icon"></i>
            <input style="display:none" type="submit" class="link" value="Logout">
            <span class="link">Logout</span>
          </a>
          </form>
        </li>
      </div>
    </div>
  </div>
</nav>

  <!-- --------------------------------- -->

</div>
<script src="assets/script.js"></script>
<script>
    const navBar = document.querySelector("nav"),
      menuBtns = document.querySelectorAll(".menu-icon");

    menuBtns.forEach((menuBtn) => {
      menuBtn.addEventListener("click", () => {
        navBar.classList.toggle("closed");
      });
    });
</script>

  
</body>
</html>