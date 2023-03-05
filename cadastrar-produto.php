<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cad-prod.css">
    <title>Cadastrar Produtos</title>
</head>
<body>
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
                            <li><a href="perfil.php">Meu perfil</a></li>
                        <?php } ?>
                        
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <?php 
    session_start (); 
    if(empty($_SESSION ['status'] != 1)){
        header('location:index.php');
    }

    include 'conectabanco.php';
    ?>
    <div class="row">
        <h1>Adicionar Produtos</h1>
        <?php
        if(!empty($_SESSION ['msg'])){
             echo $_SESSION ['msg'];
             unset($_SESSION['msg']);
         }
        ?>
    </div>
    <div class="container">
        <form method="post" action="insprod.php" enctype="multipart/form-data">
            <label for="nome">Nome do produto</label>
            <input id="nome" type="text" name="nome" maxlength="150" required>
            <br>
            <label for="preco">Preço do produto</label>
            <input id="preco" type="text" name="preco" required>
            <br>
            <label for="imagem">Imagem principal</label>
            <input id="imagem" type="file" accept="image/*" name="imagem" >
            <br>
            <label for="dercricao">Descrição do produto</label>
            <input id="descricao" type="text" name="descricao" required>
            <br>
            <label for="qtd_estoque">Quantidade em estoque</label>
            <input id="qtd_estoque" type="number" name="qtd_estoque" required>
            <br>
            <input class="btn-prod" type="submit" name="btnprod" value="Cadastrar Produto">
            <br>
        </form>
    </div>
    
</body>
</html>