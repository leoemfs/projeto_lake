<?php
session_start();
include 'conectabanco.php';
$data = date('Y-m-d');
$ticket = uniqid();
$id_usuario = $_SESSION['id'];
foreach($_SESSION['carrinho'] as $id=>$qnt){
    $consult = "SELECT * FROM produto WHERE id='$id'";
    $consulta_prod = mysqli_query($banco, $consult);
    $linha = mysqli_fetch_assoc($consulta_prod);
    $preco = $linha['preco'];

    $insert = "INSERT INTO vendas (ticket, id_cliente, id_produto, qtd_produto, valor_produto, data_venda) VALUES (
        '$ticket',
        '$id_usuario',
        '$id', 
        '$qnt', 
        '$preco', 
        '$data'
        )";
    $inserir = mysqli_query($banco, $insert);
}
include 'fim.php';
?>