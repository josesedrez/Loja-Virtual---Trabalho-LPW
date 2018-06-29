<?php
require_once('inc/cabecalho.php');

if($_SESSION['admin'] == 1){
    $id_user=$_GET['id_user'];
    $email=$_POST['email'];
        $senha=$_POST['senha'];

     $sql="SELECT * FROM usuario WHERE id_user='$id_user'";
      $res=pg_query($conexao,$sql);
      $arr=pg_fetch_array($res);

    ?>
    <div class="text-center mb-4">
    <form class="form-signin text-center" action="altera_usuario.php" method="post">

        <input type="hidden" name="id_user" value="<?php echo $arr['id_user']; ?>">

        <label>Email</label><br>
        <input type="text" step="0.010" name="email" value="<?php echo $arr['email']; ?>">
        <br>

        <label>Senha</label><br>
        <input type="number" step="0.01" name="senha" value="<?php echo $arr['senha']; ?>">
        <br> 
          
          <button class="btn btn-info" type="submit" name="botao">Editar Usuário</button>
          <a href="crud_user.php" class="btn btn-dark">Voltar</a>
    </form>
    </div>

    <?php
    require_once('inc/rodape.php');
}
else{
    header('Location: '.$base_url.'index.php');
}
?>