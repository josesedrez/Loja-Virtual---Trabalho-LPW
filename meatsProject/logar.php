<?php
require_once('inc/conexao.php');

$email=$_POST['email'];
$senha=$_POST['senha'];

$sql="SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
$resultado=pg_query($conexao,$sql);
if(pg_num_rows($resultado)>0)
{
	$usuario=pg_fetch_array($resultado);
	$_SESSION['email'] = $usuario['email'];
	$_SESSION['senha'] = $usuario['senha'];
	$_SESSION['id_user'] = $usuario['id_user'];
	$_SESSION['admin'] = $usuario['admin'];

	if($usuario['admin']==0){
		header('Location: '.$base_url.'index.php');
	}
	else{
		header('Location: '.$base_url.'cruds/crud.php');
	}
}
else
{
	$_SESSION['msg'] = 'login_invalido';
	header('Location: '.$base_url.'login.php');
}
?>