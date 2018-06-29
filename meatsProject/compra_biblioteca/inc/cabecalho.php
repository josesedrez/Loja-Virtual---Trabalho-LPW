<?php
require_once('inc/conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Meats</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="../img/meats_logo.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
  
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<img id="logo" class="col-1" src="../img/meats_logo4.png" width="10%">
      <div class="collapse navbar-collapse justify-content-end col-11" id="navbarCollapse">
        <a href="<?php echo $base_url.'categorias/acao.php'; ?>" class="btn btn-dark">Ação</a>
        <a href="<?php echo $base_url.'categorias/sandbox.php'; ?>" class="btn btn-dark">SandBox</a>
        <a href="<?php echo $base_url.'categorias/fps.php'; ?>" class="btn btn-dark">FPS</a>
        <a href="<?php echo $base_url.'categorias/esporte.php'; ?>" class="btn btn-dark">Esporte</a>
        <a href="<?php echo $base_url.'categorias/indie.php'; ?>" class="btn btn-dark">Indie</a>
        <a href="<?php echo $base_url.'categorias/outros.php'; ?>" class="btn btn-dark">Outros</a>
        <div class="col-2"></div>
          <?php
          if(isset($_SESSION['email']) ){
            if($_SESSION['admin']==0){
              ?>
              <div class="bg-success text-light text-center col-3">
               <h6><?php echo $_SESSION['email']; ?></h6>
              </div>
             <?php
             }
             else{
              ?>
              <div class="bg-info text-light text-center col-3">
                <h6><?php echo $_SESSION['email']; ?></h6>
              </div> 
              <?php
             }
          }
          else{
            ?>
            <div class="bg-light text-center col-3">
             <h6 id="desconectado">Desconectado</h6>
            </div>
            <?php
          }
          ?>
        
        <div class="col-2">
          <?php
          if(isset($_SESSION['email']) )
          {
            if($_SESSION['admin']==0){
              ?>
                <div class="dropdown">
                  <button class="btn-light" style="font-size:24px"><i class="fa fa-user-secret"></i></button>
                  <div class="dropdown-content">
                    <a href="<?php echo $base_url.'compra_biblioteca/biblioteca.php'; ?>">Biblioteca</a>
                    <a href="<?php echo $base_url.'index.php'; ?>">Página Inicial</a>
                    <a href="<?php echo $base_url.'logout.php'; ?>">Sair</a>
                  </div>
                </div>
              <?php
              }
              else{
                ?>
                <div class="dropdown">
                  <button class="btn-light" style="font-size:24px"><i class="fa fa-user-secret"></i></button>
                  <div class="dropdown-content">
                    <a href="<?php echo $base_url.'cruds/crud.php'; ?>">Painel de Controle</a>
                    <a href="<?php echo $base_url.'index.php'; ?>">Página Inicial</a>
                    <a href="<?php echo $base_url.'logout.php'; ?>">Sair</a>
                  </div>
                </div>
               <?php
              }
          }
          else{
            ?>
              <div class="dropdown">
                <button class="btn-light" style="font-size:24px"><i class="fa fa-user-secret"></i></button>
                <div class="dropdown-content">
                  <a href="<?php echo $base_url.'login.php'; ?>">Entrar</a>
                  <a href="<?php echo $base_url.'cadastro.php'; ?>">Cadastrar-se</a>
                  <a href="<?php echo $base_url.'index.php'; ?>">Página Inicial</a>
                </div>
              </div>
            <?php
          }
          ?>
        </div>
      </div>
    </nav>
    <br><br>
    <?php

    if (isset($_SESSION['msg'])) {
      if($_SESSION['msg'] == 'jogo_comprado'){
        $html = '
        <div class="alert alert-success alert-dismissible fade show">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Compra executada com Sucesso!</strong> O jogo foi adicionado a sua Biblioteca!
        </div><br><br><br>';
        echo $html;
        unset($_SESSION['msg']);
      }
            
    }
    else{
      $html = '<br><br><br>';
                echo $html;
    }
    ?>