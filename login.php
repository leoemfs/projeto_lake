<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identificação</title>
    <link rel="stylesheet" href="css/style-iden.css">
</head>
<body>
    <?php session_start (); ?>
    <header>
        <nav class="menu">
            <ul>
                <li><a href="#">Menu</a>
                    <ul>
                        <?php if(empty($_SESSION['id'])){ ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="admin.php">Area Administrativa</a></li>
                        <?php }else{ ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="carrinho.php">Carrinho</a></li>
                            <li><a href="admin.php">Area Administrativa</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a href="#">Conta</a>
                    <ul>
                        <?php if(empty($_SESSION['id'])){ ?>
                            <li><a href="login.php">Iniciar sessão</a></li>
                            <li><a href="cadastro.php">Cadastre-se</a></li>
                        <?php }else{ ?>
                            <li><a href="sair.php">Encerrar sessão</a></li>
                            <li><a href="perfil.php">Meu perfil</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <section class="formulario">
            <h1>Login</h1>
            <h3>
                <?php
                    if(isset($_SESSION ['msg'])){
                        echo $_SESSION ['msg'];
                        unset($_SESSION['msg']);
                    }
                    if(isset($_SESSION ['msgcad'])){
                        echo $_SESSION ['msgcad'];
                        unset($_SESSION['msgcad']);
                    }
                 ?>
            </h3>
            <form class="form" action="validalog.php" method="post">
                <label for="email">E-mail</label>
                <input id="email" type="text" name="email" placeholder="Digite seu E-mail" >
                <br>
                <label for="senha">Senha</label>
                <input id="senha" type="password" name="senha" maxlength="10" placeholder="Digite a senha(10 caracteres)" >
                <br>
                <input class="btn" type="submit" name="btnlogin" value="Login">
                <br>
                <h4>Não possui uma conta?</h4>
                <a href="cadastro.php">Clique para se cadastrar</a>
            </form>
        </section>
    </div><!--fim da div container-->
    <footer class="padrao-baixo">
        <div>
            <h1>Contato</h1>
            <ul class="redes">
                <li><a href="#"><img src="img/instagram.png" alt="instagram" width="30px"></a></li>
                <p>Instragram</p>
                <li><img src="img/twitter.png" alt="twitter" width="30px"></img></li>
                <li><img src="img/wpp.png" alt="whatsapp" width="30px"></img></li>
            </ul>
        </div>
        <div>
            <h1>Sobre</h1>
            <p>informações</p>
        </div>
    </footer>
</body>
</html>