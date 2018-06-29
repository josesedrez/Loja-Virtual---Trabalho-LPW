<?php
require_once('inc/cabecalho.php');

if($_SESSION['admin'] == 1){
	$sql = 'SELECT id_jogo,nome,preco,vl_promo FROM jogo ORDER BY id_jogo DESC';
	$resultado = pg_query($conexao, $sql);
	$resultado_array = pg_fetch_all($resultado);
	?>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="crud.php">CRUD</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Jogos</li>
	  </ol>
	</nav>
	<h2 class="text-center">Jogos</h2>
	<a class="btn btn-info" href="<?php echo $base_url.'cruds/adiciona_jogo.php'; ?>">Adicionar</a>
	<table class="table">
		<thead>
			<tr>
			<th scope="col">Nome</th>
			<th scope="col">Preço Base</th>
			<th scope="col">Promoção</th>
			<th scope="col">Operações</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach($resultado_array as $jogo){
			$html = '<tr>
			<td>'.$jogo['nome'].'</td>
			<td>R$'.$jogo['preco'].'</td>
			<td>'.$jogo['vl_promo'].'%</td>
			<td>
				<a class="btn btn-info" href="edita_jogo.php?id_jogo='.$jogo['id_jogo'].'">
					Editar</a>
				<a class="btn btn-dark"href="exclui_jogo.php?id_jogo='.$jogo['id_jogo'].'">
					Excluir</a>
			</td>
			</tr>';
			echo $html;
		}
		?>
		</tbody>
	</table>
	<?php
	
}
else{
    header('Location: '.$base_url.'index.php');
}
require_once('inc/rodape.php');
?>