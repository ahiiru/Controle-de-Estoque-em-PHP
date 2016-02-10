<?php
include "autoload.php";
use Lib\Cliente;

Cliente::auth(); //verifica se o usuario esta logado usando o metodo estatico

$cliente = new Cliente();
//aqui a variavel recebe a instancia

if($_POST) { //se houver submissao no form
	
	//se houver sucesso na execucao do metodo insert dentro do objeto cliente
	if( $cliente->update( "cliente", $_POST, "id=$_GET[id]" ) ) {
		//insert($tabela, $post, $onde)
		//eu decido o onde no parametro do metodo
		
		//redireciona pra pagina de consulta
		header( "Location: consulta_cliente.php" );
	} else {
		//ou retorna mensagem de erro
		echo $msg = "Falha ao alterar cliente.";
	}
}

$array = $cliente->findOne("cliente","id=$_GET[id]");
//carregar os dados do cliente atual (pego pelo id)

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Alterar Cliente</h1>
        
        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $array['nome']; ?>">
        </div>
        <div class="form-group">
          <label>E-mail</label>
          <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo $array['email']; ?>">
        </div>
        <div class="form-group">
          <label>Telefone</label>
          <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="<?php echo $array['telefone']; ?>">
        </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
      </div>
        
<?php include ('layout/footer.php'); ?>