<?php
	require_once('../inc/conexao.php');
	
	if($_SESSION['admin'] == 1){
		$id_user=$_POST['id_user'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];

		$sql3 = "SELECT email FROM usuario WHERE email = '$email' AND id_user!='$id_user'";
		$resultado3 = pg_query($conexao, $sql3);

				if(pg_num_rows($resultado3) == 0){ 

			$sql = "UPDATE usuario SET email='$email', senha='$senha' WHERE id_user='$id_user'";
			$altera=pg_query($conexao,$sql);
			$_SESSION['msg'] = 'user_editado';
			header('Location: crud_user.php');
		}
	}
		
	
	else{
	    header('Location: '.$base_url.'index.php');
	}
	?>

	?>