<?php
	require_once('../inc/conexao.php');
	
	if($_SESSION['admin'] == 1){
		$cat=array($_POST['cat1'],$_POST['cat2'],$_POST['cat3'],$_POST['cat4'],$_POST['cat5'],$_POST['cat6']);
		$id_jogo=$_POST['id_jogo'];
		$nome=$_POST['nome'];
		$preco=$_POST['preco'];
		$vl_promo=$_POST['vl_promo'];
		$img_capa=$_POST['img_capa'];
		$descricao=$_POST['descricao'];
		
		$sql3 = "SELECT nome FROM jogo WHERE nome = '$nome' AND id_jogo!='$id_jogo'";
		$resultado3 = pg_query($conexao, $sql3);

		if(pg_num_rows($resultado3) == 0){ 

			$sql1="DELETE FROM categoria_jogo WHERE id_jogo='$id_jogo'";
			$deleta=pg_query($conexao,$sql1);
			for($i=0;$i<=5;$i++)
			{
				if($cat[$i]!=NULL)
				{
					$sql2="INSERT INTO categoria_jogo(id_jogo,id_cat) VALUES ('$id_jogo','$cat[$i]')";
					$reinsere=pg_query($conexao,$sql2);
				}
			}

			$sql = "UPDATE jogo SET nome='$nome', preco='$preco', descricao='$descricao', vl_promo='$vl_promo', img_capa='$img_capa' WHERE id_jogo='$id_jogo'";
			$altera=pg_query($conexao,$sql);
			$_SESSION['msg'] = 'jogo_editado';
			header('Location: crud_jogo.php');
		}
		else{
			$_SESSION['msg'] = 'jogo_existente';
			header('Location: edita_jogo.php?id_jogo='.$id_jogo);
		}
	}
	else{
	    header('Location: '.$base_url.'index.php');
	}
	?>




	
?>