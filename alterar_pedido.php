<?php
include "autoload.php";
use Lib\Pedido;

Pedido::auth(); //verifica se o usuario esta logado usando o metodo estatico

$pedido = new Pedido();
//aqui a variavel recebe a instancia

if($_POST) { //se houver submissao no form
	
	//se houver sucesso na execucao do metodo insert dentro do objeto pedido
	if( $pedido->update( "pedido", $_POST, "id=$_GET[id]" ) ) {
		//insert($tabela, $post, $onde)
		//eu decido o onde no parametro do metodo
		
		//redireciona pra pagina de consulta
		header( "Location: consulta_pedido.php" );
	} else {
		//ou retorna mensagem de erro
		echo $msg = "Falha ao alterar pedido.";
	}
}

$array = $pedido->findOne("pedido","id=$_GET[id]");
//carregar os dados do pedido atual (pego pelo id)

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Alterar Pedido</h1>
        
        <div class="form-group">
          <label>Produto</label>
          <input type="text" name="id_produto" class="form-control" placeholder="Produto" value="<?php echo $array['id_produto']; ?>">
        </div>
        <div class="form-group">
          <label>Cliente</label>
          <input type="text" name="id_cliente" class="form-control" placeholder="Cliente" value="<?php echo $array['id_cliente']; ?>">
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
      </div>
        
<?php include ('layout/footer.php'); ?>