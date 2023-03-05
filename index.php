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
    $consult = "SELECT * FROM produto";
    $consulta_prod = mysqli_query($banco, $consult);
    ?>
    <header>
        <nav class="menu">
            <ul>
                <li><a href="#">Menu</a>
                    <ul>
                        <?php if(empty($_SESSION['id'])){ ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="admin.php">Area Administrativa</a></li>
                            <!--colocar a area administrativa no final, icone pequeno-->
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
    <div class="container"><!--diferenciar as div depois, home,carrinho etc-->

        <div class="template-destaques"><!--verificar essa template e fazer nas outras paginas, masculino, feminino-->
            <h3>destaques</h3>
        </div>

        <div class="row">
        <?php while($linha = mysqli_fetch_assoc($consulta_prod)){ ?>
            <div class="produto">
                <img src="img/<?php echo $linha['imagem']; ?>" width="200px">
                <div><h3><?php echo $linha['nome']; ?></h3></div>
                <div><h4><?php echo $linha['descricao']; ?></h4></div>
                <div><h5>R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?></h5></div>
                <div class="btn-comprar">
                    <?php if($linha['qtd_estoque'] > 0) { ?>
                    <a href="carrinho.php?id=<?php echo $linha['id'];?>">
                    <button>
                        <span> Comprar </span>
                    </button>
                    </a>
                    <?php }else{ ?>
                    <button disabled>
                        <span> Indisponível </span>
                    </button>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <footer class="padrao-baixo"><!-- editar esse footer-->
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
