<?php
include "autoload.php";
use Lib\Produto;

Produto::auth(); //verifica se o usuario esta logado usando o metodo estatico

$produto = new Produto();
//aqui a variavel recebe a instancia

if($_POST) { //se houver submissao no form
	
	//se houver sucesso na execucao do metodo insert dentro do objeto produto
	if( $produto->update( "produto", $_POST, "id=$_GET[id]" ) ) {
		//insert($tabela, $post, $onde)
		//eu decido o onde no parametro do metodo
		
		//redireciona pra pagina de consulta
		header( "Location: consulta_produto.php" );
	} else {
		//ou retorna mensagem de erro
		echo $msg = "Falha ao alterar produto.";
	}
}

$array = $produto->findOne("produto","id=$_GET[id]");
//carregar os dados do produto atual (pego pelo id)

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Alterar Produto</h1>
        
        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $array['nome']; ?>">
        </div>
        <div class="form-group">
          <label>Descrição</label>
          <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="<?php echo $array['descricao']; ?>">
        </div>
        <div class="form-group">
          <label>Preço</label>
          <input type="text" name="preco" class="form-control" placeholder="Preço" value="<?php echo $array['preco']; ?>">
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
      </div>
        
<?php include ('layout/footer.php'); ?>