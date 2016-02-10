<?php
namespace Lib;
//o namespace afeta tudo abaixo dele, mas nao pode afetar as classes nativas do PHP
//Por isso o PHP determina um namespace global, padrao, root, para as classes nativas: o \
//Para "escapar" um namespace com uma funcao nativa do PHP, ela deve ser chamada com \
//Ex.: /Exception

class Banco
{
	protected $conexao; // Ele vai embutir o objeto do PDO e se tornara acessivel a todos os metodos da classe
	// Se nao fosse por isso, cada metodo precisaria instanciar o PDO, e elas seriam diferentes entre si
	
	public function __construct() 
	{
		
		
		
		try {
			
			$this->conexao = $this->conectar();
			//a \ escapando o namespace no objeto PDO
			$this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
						
		} catch( \Exception $e) { 

			echo "<pre>";
			echo $e->getMessage();
			echo "</pre>";
		}
	}

	private function conectar()
	{
		$dsn = "mysql:host=localhost;dbname=altran_estoque";
		$user = "altran_estoque";
		$pass = "q8FKfW5fyLBru23m";
		
		//retornar nova instancia de PDO (escapando o namespace que eu criei)
		// PDO eh a camada de abstracao pre banco de dados 
		return new \PDO($dsn, $user, $pass);
	}
	
	//Metodo generico para encontrar apenas UM registro
	public function findOne($tabela, $onde)  
	{
		$sql = "SELECT * FROM $tabela WHERE $onde";
		// selecionar tudo de tabela a definir onde local a definir
		
		$state = $this->conexao->query($sql); 
		//retorna um objeto PDO statement
		
		$array = $state->fetch(\PDO::FETCH_ASSOC);
		//resgata a array de dados
		
		return $array;
		//retorna a array
		
		//Jeito monstro que ja retorna a array de dados:
		//return $this->conexao->query($sql)->fetch(\PDO::FETCH_ASSOC);
		
		//o select pode dar errado somente por algum erro no banco
		//o select pode dar certo e ainda assim nao trazer nenhum resultado
		//somente o fetch da falso se estiver sem dados, pois ele precisa popular a array com alguma coisa
	}
	
	//Metodo generico para encontrar apenas UM registro
	public function findAll($tabela, $onde=null)
	{
		$sql = "SELECT * FROM $tabela";
		
		if (!is_null( $onde )) {
			$sql .= " WHERE $onde";
		}
		
		return $this->conexao->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
	
	}
	public function insert($tabela, $post) 
	//Funcao para cadastrar produtos 
	{
		
		// coletando o array resultado do query de select e separando as chaves e os valores
		// isso eh necesario para popular a query de insert com os dados na ordem certa
		foreach($post as $chave => $valor) {
			$campos[] = $chave;
			$valores[] = $valor;
			$int[] = "?";
		}
		// campos sao as chaves e devem entrar em INSERT INTO $tabela(campo1, campo2, campo3)
		$campos = implode(",", $campos);
		// int sao os placeholders do VALUES(?,?,?)
		$int = implode(",", $int);
		
		// Criando a Query
		$sql = "INSERT INTO $tabela($campos) VALUES($int)";
		//INSERT INTO produto(nome, email, senha) VALUES(?,?,?);
		//Vamos usar o placeholder, tecnica do prepared statements 
		
		$state = $this->conexao->prepare($sql); 
		//o $state eh o statement prepare: ele cria o padrao para a query
		/* este objeto de PDO sera preparado com esta query */ 
		
		return $state->execute($valores);
		// objeto de PDO preparado sera executado com a array resultante da consulta inicial
	}
	public function update($tabela, $post, $onde) 
	//Funcao para alterar produtos 
	{
		
		// Para cada resultado da consulta (sera apenas UM array nesse caso - UM usuario)
		foreach($post as $chave => $valor) {
		/*
		 * $post = array('id'=>'1', nome'=>'paulo', 'email'=>'paulo@paulo.com', 'senha'=>'123'); 
		 */
			//reune os campos numa soh array escritos concatenados com o =?
			$campos[] = "$chave=?";
			//reune os valores numa soh array
			$valores[] = $valor;
		}
		
		//reune os campos da array, de maneira que fiquem como string:
		//"id=?,nome=?,email=?,senha=?"
		$campos = implode(",", $campos);
		
		// Criando a Query
		$sql = "UPDATE $tabela SET $campos WHERE $onde";
		//"UPDATE produto SET id=?,nome=?,email=?,senha=? WHERE id='$id"
		
		$state = $this->conexao->prepare($sql); 
		//o $state eh o statement prepare: ele cria o padrao para a query
		/* este objeto de PDO sera preparado com esta query */ 
		
		return $state->execute($valores);
		// objeto de PDO preparado sera executado com a array resultante da consulta inicial
	}
	
	public function delete($tabela)
	{
		$sql = "DELETE FROM $tabela WHERE id=?";
		
		$state = $this->conexao->prepare($sql);
		return $state->execute(array($_GET['id']));
	} 
	
} 