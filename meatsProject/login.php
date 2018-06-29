<?php
require_once('inc/cabecalho.php');
?>

<div class="text-center mb-4">
<form id="formulario" action="logar.php" method="post">
	<label class="text-center mb-1">E-mail</label><br>
  <input type="email" name="email" id="email"><br>
  <font id="aviso_email" size="2" color="red"></font><br><br>

  <label class="text-center mb-1">Senha</label><br>
  <input type="password" name="senha" id="senha"><br>
  <font id="aviso_senha" size="2" color="red"></font><br><br>

  <label class="text-center mb-1">Confirme a Senha</label><br>
  <input type="password" name="confirma_senha" id="confirma_senha"><br>
  <font id="aviso_confirma_senha" size="2" color="red"></font><br><br>

	<a href="cadastro.php">Ainda não tem um cadastro?</a><br><br>

	<button type="submit" class="btn btn-success">Entrar</button><br><br>

	<a href="index.php">Voltar</a>
</form>
</div>

<?php
require_once('inc/rodape.php');
?>