<?php
require_once('inc/cabecalho.php');

if($_SESSION['admin'] == 1){
	$sql = 'SELECT id_user,email,senha FROM usuario ORDER BY id_user DESC';
	$resultado = pg_query($conexao, $sql);
	$resultado_array = pg_fetch_all($resultado);
	?>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="crud.php">CRUD</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
	  </ol>
	</nav>
	<h2 class="text-center">Usuários</h2>
	<table class="table">
		<thead>
			<tr>
			<th scope="col">Email</th>
			<th scope="col">Senha</th>
			<th scope="col">Operação</th>

			</tr>
		</thead>
		<tbody>
		<?php
		foreach($resultado_array as $usuario){
			$html = '<tr>
			<td>'.$usuario['email'].'</td>
			<td>'.$usuario['senha'].'</td>
			<td>
				<a class="btn btn-info" href="edita_usuario.php?id_user='.$usuario['id_user'].'">
					Editar</a>
				<a class="btn btn-dark"href="exclui_usuario.php?id_user='.$usuario['id_user'].'">
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