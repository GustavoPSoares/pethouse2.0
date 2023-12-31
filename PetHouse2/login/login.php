<?php
    include('config.php');

    if(isset($_POST['cpf']) || isset($_POST['senha'])) {
    
        if(strlen($_POST['cpf']) == 0) {
            echo "Preencha seu CPF";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
    
            $cpf = $mysqli->real_escape_string($_POST['cpf']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
    
            $sql_code = "SELECT * FROM clientes WHERE cpf = '$cpf' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            $usuario = $sql_query->fetch_assoc();
    
            $quantidade = $sql_query->num_rows;
    
            if($quantidade == 1) {
                
                $sql_code = "SELECT * FROM resultados WHERE nome_Cliente = '". $usuario['nome_Cliente']. "'";
                $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                $usuario = $sql_query->fetch_assoc();
    
                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['nome_Cliente'] = $usuario['nome_Cliente'];
                $_SESSION['nome_Pet'] = $usuario['nome_Pet'];
                $_SESSION['inf_Laudo'] = $usuario['inf_Laudo'];
    
                header("Location: laudo.php");
    
            } else {
                echo "Falha ao logar! CPF ou senha incorretos";
            }
    
        }
    
    }
?>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet House | Vacinas</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/Logo.svg">


    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web&family=Leckerli+One&family=Satisfy&display=swap"
        rel="stylesheet">

</head>

<body>
    <header>
        <a href="../index.html">
            <img class="logo" src="../assets/icons/Logo.svg" alt="Pet House">
        </a>
        <div>
            <a href="#">
                <svg width="42" height="40">
                    <use href="../assets/icons/person.svg#person"></use>
                </svg>
            </a>
            <a href="">
                <svg width="42" height="40">
                    <use href="../assets/icons/Instagram.svg#insta"></use>
                </svg>
            </a>
            <a href="#contatos" class="contato">Contato</a>
        </div>
    </header>
    <main>
        <a href="#" class="whatsapp">
            <svg>
                <use href="../assets/icons/whatsapp.svg#whatsapp"></use>
            </svg>
        </a>
        <nav class="menu">
            <a href="../index.html#sobrenos">Sobre Nós</a>
            <div class="dropdown">
                <a href="../index.html#servicos">Serviços</a>
                <ul>
                    <li><a href="#">Vacinas</a></li>
                    <li><a href="exames.html">Exames</a></li>
                    <li><a href="internacao.html">Internações</a></li>
                    <li><a href="cirurgia.html">Cirurgias</a></li>
                </ul>
            </div>
            <a href="../index.html#depoimentos">Depoimentos</a>
        </nav>
    </main>
    <section classi="login">
        <div class="box">
            <form action="login.php" method="Post">
                <fieldset>
                    <legend><b>Laudos Clientes</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" class="inputUser" required>
                        <label for="nome" class="labelInput">CPF</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">Senha</label>
                    </div>
                    <br><br> 
                    <input type="submit" name="submit" id="submit">
                    <br><br>
                </fieldset>
            </form>
        </div>
    </section>
    <footer>
        <div class="contatos" id=contatos>
            <div>
                <svg width="42" height="40">
                    <use href="../assets/icons/Telephone.svg#telephone"></use>
                </svg>
                <p>(48) 2503-3576</p>
            </div>
            <div>
                <svg width="42" height="40">
                    <use href="../assets/icons/Email.svg#email"></use>
                </svg>
                <p>PetHouse@vet.com</p>
            </div>
            <a href="#">
                <svg width="42" height="40">
                    <use href="../assets/icons/Instagram.svg#insta"></use>
                </svg>
                <p>@PetHouse</p>
            </a>
        </div>
        <div class="footernav">
            <a href="../index.html#sobrenos">Sobre Nós</a>
            <a href="../index.html#servicos">Serviços</a>
            <a href="../index.html#depoimentos">Depoimentos</a>
        </div>
        <div class="footerinfo">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3491.6128875728273!2d-49.49724792475971!3d-28.939540780923586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95222f18893e6bf7%3A0x23682c6cd0e157b6!2sR.%20Jorge%20de%20Bem%2C%20105%20-%20Cidade%20Alta%2C%20Ararangu%C3%A1%20-%20SC%2C%2088901-012!5e0!3m2!1spt-BR!2sbr!4v1700410745009!5m2!1spt-BR!2sbr"
                width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div>
                <svg width="30" height="30" viewBox="0 0 23 30">
                    <use href="../assets/icons/Pin.svg#pin"></use>
                </svg>
                <p>R. Jorge de Bem, 105 - Cidade Alta</p>
            </div>
            <div>
                <svg width="30" height="30">
                    <use href="../assets/icons/Clock.svg#clock"></use>
                </svg>
                <div>
                    <p>Segunda a sexta: 13h30 - 17h</p>
                    <p>Sábado: 13h30 - 16h</p>
                    <p>Domingo: 13h - 15h</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>