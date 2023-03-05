<div class="container">
    <div class="mostracarrinho">
        <h1>Meu Carrinho</h1>
    </div>
    <?php 
    $total = null;
    foreach ($_SESSION['carrinho'] as $id => $qtd) {
        //include 'conectabanco.php';
        $consult = "SELECT * FROM produto";
        $consulta_prod = mysqli_query($banco, $consult);
        $linha = mysqli_fetch_assoc($consulta_prod);

        $produto = $linha['nome'];
        $preco = number_format(($linha['preco']), 2, ',', '.');
        $total += $linha['preco'] * $qtd;
    ?>
    <div class="row">
        <div>
        <img src="img/<?php echo $linha['imagem']; ?>" width="200px">
        </div>
        <div><h3><?php echo $produto; ?></h3></div>
        <div><h5>R$ <?php echo $preco ?></h5></div>
        <div>
            <h4><?php echo $qtd; ?></h4>
        </div>
        <div class="remover">
            <a href="removercarrinho.php?id=<?php echo $id; ?>">
            <button class="btn">Remover item</button>
            </a>
        </div>

    </div>
    <?php } ?>