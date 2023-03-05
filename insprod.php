<?php
include 'conectabanco.php';
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$qtd_estoque = $_POST['qtd_estoque'];
$removerponto = '.';
$preco = str_replace($removerponto, '', $preco);
$removervirgula = ',';
$preco = str_replace($removervirgula , '.', $preco);
$recebe_imagem = $_FILES['imagem'];
$destino_imagem = "img/";
preg_match("/\.(jpg|jpeg|png){1}$/i", $recebe_imagem['name'], $extencao);
$img_nome = $recebe_imagem['name'];
if ($nome != "" and $preco != "" and $descricao != "" and $qtd_estoque != "" and $img_nome != "") {
    $insert_prod = "INSERT INTO produto (nome, preco, imagem, descricao, qtd_estoque) VALUES (
    '$nome',
    '$preco',
    '$img_nome',
    '$descricao',
    '$qtd_estoque'
    )";
    $resultado_insert = mysqli_query($banco, $insert_prod);
    if (mysqli_insert_id($banco)) {
        //verificar insert de id no banco
        //echo "Cadastrado com sucesso!";
        $_SESSION ['msg'] = "Cadastrado com sucesso!";
        header('location:cadastrar-produto.php');
    } else {
        //echo "Erro ao cadastrar!";
        header('location:cadastrar-produto.php');
        $_SESSION ['msg'] = "Erro ao cadastrar produto!";
    }
}
?>