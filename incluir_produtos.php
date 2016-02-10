<?php
include "autoload.php";
use Lib\Produto;

Produto::auth(); //verifica se o usuario esta logado usando o metodo estatico

if($_POST) { //se houver submissao no form
	
	$produto = new Produto();
	//aqui a variavel recebe a instancia 

	
	//se houver sucesso na execucao do metodo insert dentro do objeto produto
	if( $produto->insert( "produto", $_POST ) ) {
		//insert($tabela, $post)
		
		//redireciona pra pagina de consulta
		header( "Location: consulta_produto.php" );
	} else {
		//ou retorna mensagem de erro
		echo $msg = "Falha ao inserir produto.";
	}
}

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Incluir Produto</h1>
        
        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Nome">
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="descricao" class="form-control" placeholder="Descrição">
        </div>
        <div class="form-group">
          <label>Preço</label>
          <input type="text" name="preco" class="form-control" placeholder="Preço">
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
      </div>

<?php include ('layout/footer.php'); ?>