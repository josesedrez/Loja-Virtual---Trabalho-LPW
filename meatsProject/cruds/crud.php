<?php
require_once('inc/cabecalho.php');

if($_SESSION['admin'] == 1){
	?>
	<nav aria-label="breadcrumb">
	    <span class="breadcrumb-item active" aria-current="page">Painel de Controle</span>
	</nav><br>

	<div class="text-center">
		<a href="crud_user.php" class="btn btn-info">Usuários</a>
		<a href="crud_jogo.php" class="btn btn-info">Jogos</a>
		<br><br>
		<img src="../img/controle.png" width="30%">
	</div>
	<?php

}
else{
    header('Location: '.$base_url.'index.php');
}


require_once('inc/rodape.php');
?>