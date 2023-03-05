<?php session_start (); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv=" X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-widht, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-adm12.css">
    <title>Restrito - Administrador</title>
</head>
<body>
    <?php 
    if (empty($_SESSION['nivel']) || $_SESSION['nivel'] != 1) {
        header('location:login.php');
        $_SESSION ['msg'] = "Area restrita, faça login para acessar!";
    }
    include 'conectabanco.php';
    ?>
    <header>
        <nav class="menu">
            <ul>
                <li><a href="#">Navegação</a>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="carrinho.php">Carrinho</a></li>
                        <li><a href="sobre.php">Sobre</a></li>
                    </ul>
                </li>
                <li><a href="#">Conta</a>
                    <ul>
                        <?php if(empty($_SESSION['id'])){ ?>
                            <li><a href="login.php">Iniciar sessão</a></li>
                            <li><a href="cadastro.php">Cadastre-se</a></li>
                        <?php }else{ ?>
                            <li><a href="sair.php">Encerrar sessão</a></li>
                            <!--<li><a href="perfil.php">Meu perfil</a></li>-->
                        <?php } ?>
                        
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <br>
    <div class="row">
        <h1>Bem vindo! Administrador</h1>
    </div>
    <div class="container">
        
        <a href="cadastrar-produto.php">
        <input class="btn-adm" type="submit" name="btn-adm" value="Cadastrar Produto">
        </a>

        <a href="#">
        <input class="btn-adm" type="submit" name="btn-adm" value="Alterar / Excluir produto">
        </a>

        <a href="lista-clientes.php">
        <input class="btn-adm" type="submit" name="btn-adm" value="Meus clientes cadastrados">
        </a>

        <a href="sair.php">
        <input class="btn-adm" type="submit" name="btn-adm" value="Sair da Area Adminitrativa">
        </a>
        
    </div>
</body>
</html>