<?php
require_once('inc/cabecalho.php');
$id_jogo = (int) $_GET['id_jogo']; //cast

$sql = 'SELECT * FROM jogo WHERE id_jogo = '.$id_jogo;
$jogo = pg_query($conexao, $sql);
$jogo_array = pg_fetch_array($jogo);
?>
<h1 class="display-4"><?php echo $jogo_array['nome']; ?></h1>
<div class="container">
	<div class="row">
		<div class="col-sm">
			<img class="float-left" src="<?php echo $jogo_array['img_capa']; ?>" width="50%" alt="sem imagem" onerror="this.src='../img/imagem_error.png'">
		</div>
		<div class="col-sm">
			<p class="lead"><?php echo $jogo_array['descricao']; ?></p>
			<hr class="my-4">
			<p class="text-right">
				<?php if($jogo_array['vl_promo']!=0){ ?>

					R$ <?php echo str_replace('.', ',', $jogo_array['preco']); ?> - <?php echo $jogo_array['vl_promo']; ?>%
					<?php $jogo_array['preco']=$jogo_array['preco']-($jogo_array['preco']*$jogo_array['vl_promo']/100);?>=

				<?php } ?> 
				R$ <?php echo str_replace('.', ',', $jogo_array['preco']); ?>	
			</p>
			<a class="btn btn-success" href="<?php echo $base_url.'compra_biblioteca/comprar.php?id_jogo='.$jogo_array['id_jogo']; ?>" role="button">Comprar</a>
			<a class="btn btn-dark" href="<?php echo $base_url.'index.php'; ?>">Voltar á página inicial</a>
		</div>
	</div>
</div>
<?php
require_once('inc/rodape.php');