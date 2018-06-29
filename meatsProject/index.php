<?php
require_once('inc/cabecalho.php');
	$sql = "SELECT * FROM jogo WHERE vl_promo>'0' ORDER BY vl_promo DESC";
	$resultado = pg_query($conexao, $sql);
	$array = pg_fetch_all($resultado);
	

?>

<div class="content">
	<div class="row">
		<div class="col col-md-1"></div>
		<div class="col col-md-10">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		        <ol class="carousel-indicators">
		          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		          <li data-target="#myCarousel" data-slide-to="1"></li>
		          <li data-target="#myCarousel" data-slide-to="2"></li>
		        </ol>
		        <div class="carousel-inner">
		          <div class="carousel-item active">
		            <img class="first-slide" src="<?php echo $array[0]['img_capa']; ?>" alt="First slide" onerror="this.src='img/imagem_banner_error.png'">
		            <div class="container">
		              <div class="carousel-caption text-right">
		                <h1 class="borda_titulo"><?php echo $array[0]['nome']; ?></h1>
		                <h3 class="borda_texto"><?php echo $array[0]['descricao']; ?>.</h3>
		                <?php if(isset($array[0])){ ?>
		                <p><a class="btn btn-lg btn-success" href="<?php echo $base_url.'compra_biblioteca/pagina_jogo.php?id_jogo='.$array[0]['id_jogo']; ?>" role="button">Ver mais</a></p>
		                <?php } ?>
		              </div>
		              
		            </div>
		          </div>
		          <div class="carousel-item">
		            <img class="second-slide" src="<?php echo $array[1]['img_capa']; ?>" alt="Second slide" onerror="this.src='img/imagem_banner_error.png'">
		            <div class="container">
		              <div class="carousel-caption text-right">
		                <h1 class="borda_titulo"><?php echo $array[1]['nome']; ?></h1>
		                <h3 class="borda_texto"><?php echo $array[1]['descricao']; ?></h3>
		               <?php if(isset($array[1])){ ?>
		                <p><a class="btn btn-lg btn-success" href="<?php echo $base_url.'compra_biblioteca/pagina_jogo.php?id_jogo='.$array[1]['id_jogo']; ?>" role="button">Ver mais</a></p>
		                <?php } ?>
		              </div>
		            </div>
		          </div>
		          <div class="carousel-item">
		            <img class="third-slide" src="<?php echo $array[2]['img_capa']; ?>" alt="Third slide" onerror="this.src='img/imagem_banner_error.png'">
		            <div class="container">
		              <div class="carousel-caption text-right">
		                <h1 class="borda_titulo"><?php echo $array[2]['nome']; ?></h1>
		                <h3 class="borda_texto"><?php echo $array[2]['descricao']; ?></h3>
		                <?php if(isset($array[2])){ ?>
		                <p><a class="btn btn-lg btn-success" href="<?php echo $base_url.'compra_biblioteca/pagina_jogo.php?id_jogo='.$array[2]['id_jogo']; ?>" role="button">Ver mais</a></p>
		                <?php } ?>
		              </div>
		            </div>
		          </div>
		        </div>
		        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
		          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		          <span class="sr-only">Previous</span>
		        </a>
		        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
		          <span class="carousel-control-next-icon" aria-hidden="true"></span>
		          <span class="sr-only">Next</span>
		        </a>
		    </div>
		</div>
		<div class="col col-md-1"></div>
	</div>
	
</div>

<?php
$sql = "SELECT * FROM jogo WHERE id_jogo IN(SELECT id_jogo FROM jogo WHERE vl_promo>'0') ORDER BY vl_promo DESC";
$resultado = pg_query($conexao, $sql);
$resultado_array = pg_fetch_all($resultado);
?>

<h3 class="text-left">Jogos em Promoção</h3><br>
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
					<img src="<?php echo $jogo['img_capa']; ?>" width="50%" onerror="this.src='img/imagem_error.png'">
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