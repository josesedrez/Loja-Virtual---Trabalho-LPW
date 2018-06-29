<?php
require_once('inc/cabecalho.php');

if(isset($_SESSION['admin'])){
	if($_SESSION['admin']==0){
		$id_user=$_SESSION['id_user'];
		$sql = "SELECT * FROM jogo WHERE id_jogo IN(SELECT id_jogo FROM biblioteca WHERE id_user='$id_user') ORDER BY id_jogo DESC";
		$resultado = pg_query($conexao, $sql);
		$resultado_array = pg_fetch_all($resultado);
		?>

		<h2 class="text-center">Biblioteca</h2>
				<div class="content">
					<div class="row">
						<div class="col col-md-2 text-center"><h4>Imagem</h4></div>
						<div class="col col-md-2 text-center"><h4>Nome</h4></div>
						<div class="col col-md-4 text-center"><h4>Opções</h4></div>
					</div>
				<?php
				foreach($resultado_array as $jogo){
					?>
					
						</div>
					<div class="row">
						<div class="col"><h1>____________________________________________________________________________________</h1></div>
					</div>
					<div class="row">
						<div class="col col-md-2 text-center">
							<img src="<?php echo $jogo['img_capa']; ?>" width="50%" onerror="this.src='../img/imagem_error.png'">
						</div>
						<div class="col col-md-2 text-center">
							<h5><?php echo $jogo['nome']; ?></h5>
						 </div>
						 <div class="col col-md-4 text-center">
						 	<a class="btn btn-success" href="">
								Jogar</a>
						 </div>
					
					<?php
				}
				?>
			</div>

		<?php
		require_once('inc/rodape.php');
	}
	else{

	}
}
else{

}

