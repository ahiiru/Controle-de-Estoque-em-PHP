<?php
?>
<?php
include "autoload.php";
use Lib\Pedido;

Pedido::auth(); //verifica se o usuario esta logado usando o metodo estatico

$pedido = new Pedido();
//aqui a variavel recebe a instancia

if( $pedido->delete( "pedido" ) ) {
	//insert($tabela)
	echo "ok";
	//redireciona pra pagina de consulta
	header( "Location: consulta_pedido.php" );
} else {
	//ou retorna mensagem de erro
	echo $msg = "Falha ao excluir pedido.";
}