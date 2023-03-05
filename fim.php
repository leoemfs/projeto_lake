<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv=" X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-widht, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <?php 
    session_start ();
    include 'conectabanco.php';
    ?>
    <header>
        <nav class="menu">
            <ul>
                <li><a href="#">Navegação</a>
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
        <div class="row">
            <div class="texto">
                <h2>Compra efetuada com sucesso! O número de registro da compra é: <?php echo $ticket; ?></h2>
            </div>
        </div>
    </div>
</body>
</html>