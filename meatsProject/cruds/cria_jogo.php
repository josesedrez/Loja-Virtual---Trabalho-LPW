<?php
require_once('inc/conexao.php');

if($_SESSION['admin'] == 1){
	$cat=array($_POST['cat1'],$_POST['cat2'],$_POST['cat3'],$_POST['cat4'],$_POST['cat5'],$_POST['cat6']);
	$nome=$_POST['nome'];
	$preco=$_POST['preco'];
	$img_capa=$_POST['img_capa'];
	$descricao=$_POST['descricao'];

	$sql1 = "SELECT nome FROM jogo WHERE nome = '$nome'";
	$resultado1 = pg_query($conexao, $sql1);

	if(pg_num_rows($resultado1) == 0){ 
	    $sql = "INSERT INTO jogo(nome,preco,descricao,img_capa,dt_jogo) VALUES('$nome','$preco','$descricao','$img_capa',NOW())";
	    $resultado = pg_query($conexao, $sql);

	    $sql1 = "SELECT id_jogo FROM jogo WHERE nome='$nome'";
	    $id_game = pg_query($conexao, $sql1); 
	    $arr=pg_fetch_array($id_game);
	    
	    for($i=0;$i<=5;$i++)
		{
			if($cat[$i]!=NULL)
			{
				$sql2="INSERT INTO categoria_jogo(id_jogo,id_cat) VALUES ('$arr[0]','$cat[$i]')";
				$reinsere=pg_query($conexao,$sql2);
			}
		}      
		$_SESSION['msg'] = 'jogo_adicionado';
	    header('Location: crud_jogo.php');
	}
	else{
		$_SESSION['msg'] = 'jogo_existente';
	   header('Location: adiciona_jogo.php');
	}
}
else{
    header('Location: '.$base_url.'index.php');
}
?>