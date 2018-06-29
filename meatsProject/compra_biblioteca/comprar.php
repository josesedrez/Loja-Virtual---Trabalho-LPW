<?php
require_once('inc/conexao.php');

if(isset($_SESSION['admin'])){
	if($_SESSION['admin'] == 0){
		$id_jogo=$_GET['id_jogo'];
		$id_user=$_SESSION['id_user'];

		$sql = "SELECT id_jogo FROM biblioteca WHERE id_user='$id_user' AND id_jogo='$id_jogo'";
		$resultado = pg_query($conexao, $sql);
		if(pg_num_rows($resultado) == 0){
			$sql1 = "INSERT INTO biblioteca(id_user,id_jogo) VALUES ('$id_user','$id_jogo')";
			$resultado1 = pg_query($conexao, $sql1);

			$_SESSION['msg'] = 'jogo_comprado';
			header('Location: '.$base_url.'compra_biblioteca/biblioteca.php');
		}
		else{
			$_SESSION['msg'] = 'jogo_existente';
			header('Location: '.$base_url.'index.php');
		}
		
	}
	else
	{
		$_SESSION['msg'] = 'logado_admin';
	    header('Location: '.$base_url.'index.php');
	}
}
else{
	$_SESSION['msg'] = 'nao_logado_user';
    header('Location: '.$base_url.'index.php');
}
?>