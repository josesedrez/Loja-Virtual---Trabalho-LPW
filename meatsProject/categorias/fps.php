<?php
require_once('inc/cabecalho.php');

$sql = "SELECT * FROM jogo WHERE id_jogo IN(SELECT id_jogo FROM categoria_jogo WHERE id_cat IN(SELECT id_cat FROM categoria WHERE nm_cat='FPS')) ORDER BY id_jogo DESC";
$resultado = pg_query($conexao, $sql);
$resultado_array = pg_fetch_all($resultado);
?>

<h2 class="text-center">Jogos de FPS</h2>
		<div class="content">
			<div class="row">
				<div class="col col-md-2 text-center"><h4>Imagem</h4></div>
				<div class="col col-md-2 text-center"><h4>Nome</h4></div>
				<div class="col col-md-2 text-center"><h4>Preço Final</h4></div>
				<div class="col col-md-2 text-center"><h4>Promoção</h4></div>
				<div class="col col-md-4 text-center"><h4>Opções</h4></div>
			</div>
		<?php
		foreach($resultado_array as $jogo){
			if($jogo['vl_promo']!=0){
				$jogo['preco']=$jogo['preco']-($jogo['preco']*$jogo['vl_promo']/100);
			}
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
				 <div class="col col-md-2 text-center">
					<h5>R$<?php echo $jogo['preco']; ?></h5>
				 </div>
				 <div class="col col-md-2 text-center">
					<h5><?php echo $jogo['vl_promo']; ?>%</h5>
				 </div>
				 <div class="col col-md-4 text-center">
				 	<a class="btn btn-success" href="<?php echo $base_url.'compra_biblioteca/comprar.php?id_jogo='.$jogo['id_jogo']?>">
						Comprar</a>
					<a class="btn btn-dark" href="<?php echo $base_url.'compra_biblioteca/pagina_jogo.php?id_jogo='.$jogo['id_jogo']?>">
						Ver mais</a>
				 </div>
			
			<?php
		}
		?>
	</div>


<?php
require_once('inc/rodape.php');
?>