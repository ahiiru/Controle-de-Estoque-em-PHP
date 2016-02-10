<?php
include "autoload.php";
use Lib\Cliente;

Cliente::auth(); //chamando a funcao estatica de autenticacao: se nao estiver logado, redireciona para a home

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Clientes</h1>
          <p><a class="bt_default bt_add" href="incluir_clientes.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo cliente</a></p>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Alterar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                
				<?php 
                	
                /* gerando a tabela da pagina */
                $obj = new Cliente(); //aqui a variavel recebe a instancia
                $clientes = $obj->findAll("cliente"); //aqui a variavel substitui-se pela array
                
                // Se houver $_POST nessa pagina, ele eh proveniente do submit da barra de busca
                if($_POST) {
                  //Se assim for, ele deve substituir a array com as informacoes enviadas pelo usuario: filtrar por cliente ou descricao
                  $clientes = $obj->findAll("cliente", "nome LIKE '%$_POST[busca]%' OR email LIKE '%{$_POST['busca']}%'");
                }
                	             		
                //Independente do resultado do $_POST, ele obtem a array e distribui
                foreach ($clientes as $cliente):
                ?>
                <tr>
                  <td><?= $cliente['id']; ?></td>
                  <td><?= $cliente['nome']; ?></td>
                  <td><?= $cliente['email']; ?></td>
                  <td><?= $cliente['telefone']; ?></td>
                  <td><a href="alterar_cliente.php?id=<?= $cliente['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                  <td><a href="excluir_cliente.php?id=<?= $cliente['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                </tr>
                <?php 
                  endforeach;
                ?>
                
              </tbody>
            </table>
          </div>
        </div>

<?php include ('layout/footer.php'); ?>