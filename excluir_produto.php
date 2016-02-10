<?php
?>
<?php
include "autoload.php";
use Lib\Produto;

Produto::auth(); //verifica se o usuario esta logado usando o metodo estatico

$produto = new Produto();
//aqui a variavel recebe a instancia

if( $produto->delete( "produto" ) ) {
	//insert($tabela)
	echo "ok";
	//redireciona pra pagina de consulta
	header( "Location: consulta_produto.php" );
} else {
	//ou retorna mensagem de erro
	echo $msg = "Falha ao excluir produto.";
}