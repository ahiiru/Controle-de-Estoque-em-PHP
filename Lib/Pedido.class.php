<?php
namespace Lib;

class Pedido extends Banco // detalhes dos pedidos
{
	protected $tabela = "usuarios"; //nome da tabela
	 
	protected $dados = array (
		'id'		=>	null,
		'email'		=>	null,
		'senha'		=>	null,
	);

	//ao criar uma instancia de pedido, nada vai acontecer porque o banco de dados so conecta quando se cria uma instancia do banco
	//mesmo sendo herdeiro, o construct funciona somente localmente
	//por isso podemos mandar que o construct do pai seja executado, mesmo sem criar uma instancia do pai, ao instanciar o filho
	public function __construct()	
	{
		parent::__construct();
	}
	
	public function logar($email, $senha)
	{
		$resul = $this->findOne($this->tabela, "email='$email' and senha='$senha'");
		//executa o metodo de buscar UM registro no banco de dados usando a tabela descrita nessa classe e no local descrito por extenso no parametro do metodo, que completaria o sentido da query
		//retorna falso ou array populado
		//podemos entrar com return direto ou alimentar uma variavel
		
		//havendo array, cria session utilizando todo o conteudo da array como parametro
		if ($resul) {
			$this->session($resul);
			//isso eh importante para que eu possa recuperar o e-mail do usuario depois
		}
		
		return $resul;
		//retorna a array para dar continuidade 
	}
	protected function session(array $array) 
	{
		$_SESSION['email'] = $array['email']; //armazena o e-mail do usuario logado na $_SESSION
		$_SESSION['logado'] = true; //armazena o estado do usuario na $_SESSION
	}
	static public function auth()
	{
		if(!$_SESSION['logado']) {
			header("location: index.php");
		}
	}
}