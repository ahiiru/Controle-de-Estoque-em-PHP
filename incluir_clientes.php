<?php
include "autoload.php";
use Lib\Cliente;

Cliente::auth(); //verifica se o usuario esta logado usando o metodo estatico

if($_POST) { //se houver submissao no form
	
	$cliente = new Cliente();
	//aqui a variavel recebe a instancia 

	
	//se houver sucesso na execucao do metodo insert dentro do objeto cliente
	if( $cliente->insert( "cliente", $_POST ) ) {
		//insert($tabela, $post)
		
		//redireciona pra pagina de consulta
		header( "Location: consulta_cliente.php" );
	} else {
		//ou retorna mensagem de erro
		echo $msg = "Falha ao inserir cliente.";
	}
}

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Incluir Cliente</h1>
        
        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Nome">
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="email" class="form-control" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label>Preço</label>
          <input type="text" name="telefone" class="form-control" placeholder="Telefone">
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
      </div>

<?php include ('layout/footer.php'); ?>