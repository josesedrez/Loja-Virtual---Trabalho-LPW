<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../inc/conexao.php');

if($_SESSION['admin']==1){
	$id_user = $_GET['id_user'];

	$sql1 = "DELETE FROM biblioteca WHERE id_user='$id_user'";
	$resultado1 = pg_query($conexao, $sql1);

	$sql = "DELETE FROM usuario WHERE id_user='$id_user'";
	$resultado = pg_query($conexao, $sql);
	$_SESSION['msg'] = 'usuario_excluido';
	header('Location: crud_user.php');
} 
else{
    header('Location: '.$base_url.'index.php');
}
?>