<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../inc/conexao.php');

if($_SESSION['admin']==1){
	$id_jogo = $_GET['id_jogo'];

	$sql1 = "DELETE FROM categoria_jogo WHERE id_jogo='$id_jogo'";
	$resultado1 = pg_query($conexao, $sql1);

	$sql2 = "DELETE FROM biblioteca WHERE id_jogo='$id_jogo'";
	$resultado2 = pg_query($conexao, $sql2);

	$sql = "DELETE FROM jogo WHERE id_jogo='$id_jogo'";
	$resultado = pg_query($conexao, $sql);
	$_SESSION['msg'] = 'jogo_excluido';
	header('Location: crud_jogo.php');
} 
else{
    header('Location: '.$base_url.'index.php');
}
?>