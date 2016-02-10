<?php
include "autoload.php";
use Lib\Pedido;

Pedido::auth(); //verifica se o usuario esta logado usando o metodo estatico

if($_POST) { //se houver submissao no form
	
	$pedido = new Pedido();
	//aqui a variavel recebe a instancia 

	
	//se houver sucesso na execucao do metodo insert dentro do objeto pedido
	if( $pedido->insert( "pedido", $_POST ) ) {
		//insert($tabela, $post)
		
		//redireciona pra pagina de consulta
		header( "Location: consulta_pedido.php" );
	} else {
		//ou retorna mensagem de erro
		echo $msg = "Falha ao inserir pedido.";
	}
}

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Incluir Pedido</h1>
        
        <div class="form-group">
          <label>Produto</label>
          <input type="text" name="id_produto" class="form-control" placeholder="Produto">
        </div>
        <div class="form-group">
          <label>Cliente</label>
          <input type="text" name="id_cliente" class="form-control" placeholder="Cliente">
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
      </div>

<?php include ('layout/footer.php'); ?>
