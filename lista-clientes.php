<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus clientes</title>
</head>
<body>
        <div class="lista-cliente">
            <h1>Listagem de Clientes Cadastrados</h1>
            <?php
            session_start (); 

            /*if(empty($_SESSION ['status']) || $_SESSION ['status'] != 1){
                header('location:index.php');
            }*/
            include 'conectabanco.php';
            $select = "SELECT * FROM usuario";
            $resultado = mysqli_query($banco, $select);
            ?>
            <table>
                <thead>
                    <th>Id</th> <th>Nome</th> <th>E-mail</th> <th>Ação</th>
                </thead>
                <tbody>
                    <?php 
                    if($resultado){
                        while($linha = mysqli_fetch_assoc($resultado)){
                            $id_result = $linha['id'];
                            $nome_result = $linha['nome'];
                            $email_result = $linha['email'];
                            echo "<tr>
                            <td>$id_result</td> <td>$nome_result</td> 
                            <td>$email_result</td> <td>??</td>
                        </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    $banco->close();
    ?>
</body>
</html>