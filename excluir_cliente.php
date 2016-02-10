<?php
?>
<?php
include "autoload.php";
use Lib\Cliente;

Cliente::auth(); //verifica se o usuario esta logado usando o metodo estatico

$cliente = new Cliente();
//aqui a variavel recebe a instancia

if( $cliente->delete( "cliente" ) ) {
	//insert($tabela)
	echo "ok";
	//redireciona pra pagina de consulta
	header( "Location: consulta_cliente.php" );
} else {
	//ou retorna mensagem de erro
	echo $msg = "Falha ao excluir cliente.";
}