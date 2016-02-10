<?php
include "autoload.php";
use Lib\Produto;

Produto::auth(); //chamando a funcao estatica de autenticacao: se nao estiver logado, redireciona para a home

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Produtos</h1>
          <p><a class="bt_default bt_add" href="incluir_produtos.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo produto</a></p>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Preço</th>
                  <th>Alterar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                
				<?php 
				
				/* gerando a tabela da pagina */
				$obj = new Produto(); //aqui a variavel recebe a instancia
				$produtos = $obj->findAll("produto"); //aqui a variavel substitui-se pela array
				
				// Se houver $_POST nessa pagina, ele eh proveniente do submit da barra de busca
				if($_POST) {
				  //Se assim for, ele deve substituir a array com as informacoes enviadas pelo usuario: filtrar por produto ou descricao
				  $produtos = $obj->findAll("produto", "descricao LIKE '%$_POST[busca]%' OR nome LIKE '%{$_POST['busca']}%'");
				}
				
				//Independente do resultado do $_POST, ele obtem a array e distribui
				foreach ($produtos as $produto):
				?>
				<tr>
				  <td><?= $produto['id']; ?></td>
				  <td><?= $produto['nome']; ?></td>
				  <td><?= $produto['descricao']; ?></td>
				  <td>R$ <?= $produto['preco']; ?></td>
				  <td><a href="alterar_produto.php?id=<?= $produto['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
				  <td><a href="excluir_produto.php?id=<?= $produto['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
				</tr>
				<?php 
				  endforeach;
				?>
                
              </tbody>
            </table>
          </div>
        </div>

<?php include ('layout/footer.php'); ?>