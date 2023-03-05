<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste exebição</title>
</head>
<body>
    <?php 
        include 'conectabanco.php';
        $consult = "SELECT * FROM produto";
        $consulta_prod = mysqli_query($banco, $consult);
        while($linha = mysqli_fetch_assoc($consulta_prod)){
            echo $linha['nome'].'<br>'; 
            echo $linha['preco'].'<br>';
            echo $linha['imagem'].'<br>';
            echo $linha['descricao'].'<br>';
            echo '<hr>';
        }
    ?>
</body>
</html>