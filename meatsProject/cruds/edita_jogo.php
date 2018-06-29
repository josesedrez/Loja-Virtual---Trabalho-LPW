<?php
require_once('inc/cabecalho.php');

if($_SESSION['admin'] == 1){
    $id_jogo=$_GET['id_jogo'];

     $sql="SELECT * FROM jogo WHERE id_jogo='$id_jogo'";
      $res=pg_query($conexao,$sql);
      $arr=pg_fetch_array($res);

      $sql1="SELECT id_cat FROM categoria_jogo WHERE id_jogo='$id_jogo'";
      $res1=pg_query($conexao,$sql1);
      $arr1=pg_fetch_all($res1);
    ?>
    <div class="text-center mb-4">
    <form class="form-signin text-center" action="altera_jogo.php" method="post">

        <input type="hidden" name="id_jogo" value="<?php echo $arr['id_jogo']; ?>">

        <label>Nome</label><br>
        <input type="text" step="0.010" name="nome" value="<?php echo $arr['nome']; ?>">
        <br>

        <label>Preço</label><br>
        <input type="number" step="0.01" name="preco" value="<?php echo $arr['preco']; ?>">
        <br> 

        <label>Valor da Promoção</label><br>
        <input id="promo" type="number" name="vl_promo" value="<?php echo $arr['vl_promo']; ?>"><br>
        <font id="aviso_promocao" size="2" color="red"></font><br>

        <label>URL da Imagem de Capa</label><br>
        <input type="text" step="0.010" name="img_capa" value="<?php echo $arr['img_capa']; ?>">
        <br><br>  
        <label>Categorias</label><br>
        <label>Ação</label>
        <input type="checkbox" name="cat1" value="1" <?php foreach ($arr1 as $categ){if($categ['id_cat']==1){echo 'checked';}} ?>><br>
        <label>SandBox</label>
        <input type="checkbox" name="cat2" value="2" <?php foreach ($arr1 as $categ){if($categ['id_cat']==2){echo 'checked';}} ?>><br>
        <label>FPS</label>
        <input type="checkbox" name="cat3" value="3" <?php foreach ($arr1 as $categ){if($categ['id_cat']==3){echo 'checked';}} ?>><br>
        <label>Esporte</label>
        <input type="checkbox" name="cat4" value="4" <?php foreach ($arr1 as $categ){if($categ['id_cat']==4){echo 'checked';}} ?>><br>
        <label>Indie</label>
        <input type="checkbox" name="cat5" value="5" <?php foreach ($arr1 as $categ){if($categ['id_cat']==5){echo 'checked';}} ?>><br>
        <label>Outros</label>
        <input type="checkbox" name="cat6" value="6" <?php foreach ($arr1 as $categ){if($categ['id_cat']==6){echo 'checked';}} ?>>

        <br><br>
        <label>Descrição</label><br>
        <textarea name="descricao" rows="10" cols="100" ><?php echo $arr['descricao']; ?></textarea>
        <br><br>
          
          <button class="btn btn-info" type="submit" name="botao">Editar Jogo</button>
          <a href="crud_jogo.php" class="btn btn-dark">Voltar</a>
    </form>
    </div>

    <?php
    require_once('inc/rodape.php');
}
else{
    header('Location: '.$base_url.'index.php');
}
?>