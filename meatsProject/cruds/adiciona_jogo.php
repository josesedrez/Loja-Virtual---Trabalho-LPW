<?php
require_once('inc/cabecalho.php');

if($_SESSION['admin'] == 1){
    ?>
    <div class="text-center mb-4">
    <form class="form-signin text-center" action="cria_jogo.php" method="post">

        <label>Nome</label><br>
        <input type="text" step="0.010" name="nome">
        <br>

        <label>Preço</label><br>
        <input type="number" step="0.01" name="preco">
        <br> 

        <label>URL da Imagem de Capa</label><br>
        <input type="text" step="0.010" name="img_capa">
        <br><br>  

        <label>Categorias</label><br>
        <label>Ação</label>
        <input type="checkbox" name="cat1" value="1"><br>
        <label>SandBox</label>
        <input type="checkbox" name="cat2" value="2"><br>
        <label>FPS</label>
        <input type="checkbox" name="cat3" value="3"><br>
        <label>Esporte</label>
        <input type="checkbox" name="cat4" value="4"><br>
        <label>Indie</label>
        <input type="checkbox" name="cat5" value="5"><br>
        <label>Outros</label>
        <input type="checkbox" name="cat6" value="6">  

        <br><br>
        <label>Descrição</label><br>
        <textarea name="descricao" rows="10" cols="100"></textarea>
        <br><br>
          
          <button class="btn btn-info" type="submit" name="botao">Adicionar Jogo</button>
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