<?php
require_once('inc/conexao.php');

$email=$_POST['email'];
$senha=$_POST['senha'];

$sql1 = "SELECT email FROM usuario WHERE email = '$email'";
$resultado1 = pg_query($conexao, $sql1);

if(pg_num_rows($resultado1) == 0){ 
    $sql = "INSERT INTO usuario(email,senha) VALUES('$email','$senha')";
    $resultado = pg_query($conexao, $sql);       
    header('Location: '.$base_url.'login.php');
}
else{
	$_SESSION['msg'] = 'email_existe';
	header('Location: '.$base_url.'cadastro.php');
}

?>