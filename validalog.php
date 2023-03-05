<?php
session_start ();
include_once ("conectabanco.php");
$btnlogin = filter_input (INPUT_POST, 'btnlogin');
if ($btnlogin) {
    $email = filter_input (INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input (INPUT_POST, 'senha');
    if ((!empty($email)) and (!empty($senha))) {
        $result_usuario = "SELECT id, nome, email, senha, nivel FROM usuario WHERE email = '$email' LIMIT 1";
        $resultado_usuario = mysqli_query($banco, $result_usuario);
    }else{
        $_SESSION ['msg'] = "Completar todos os campos!";
        header ("location: login.php");
    }
    if($resultado_usuario){
        $row_usuario = mysqli_fetch_assoc($resultado_usuario);
        if(password_verify($senha, $row_usuario['senha'])){
            $_SESSION ['id'] = $row_usuario['id'];
            $_SESSION ['nivel'] = $row_usuario['nivel'];
            if ($_SESSION['nivel'] == 1) {
                header('location:admin.php');
            }else{
                header("location: index.php");
            }
        }else{
            $_SESSION ['msg'] = "Login ou senha incorretos!";
            header("location: login.php");
        }
    }
}else{
    $_SESSION ['msg'] = "Página não encontrada";
    header ("location: login.php");
}
?>