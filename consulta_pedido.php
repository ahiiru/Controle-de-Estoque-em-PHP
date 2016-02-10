<?php
include "autoload.php";
use Lib\Pedido;

Pedido::auth(); //chamando a funcao estatica de autenticacao: se nao estiver logado, redireciona para a home

?>

<?php include ('layout/header.php'); ?>

<?php include ('layout/nav.php'); ?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Pedidos</h1>
          <p><a class="bt_default bt_add" href="incluir_pedidos.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo pedido</a></p>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Produto</th>
                  <th>Cliente</th>
                  <th>Alterar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                
              <?php 
              
              /* gerando a tabela da pagina */
              $obj = new Pedido(); //aqui a variavel recebe a instancia
              $pedidos = $obj->findAll("pedido"); //aqui a variavel substitui-se pela array
              
              // Se houver $_POST nessa pagina, ele eh proveniente do submit da barra de busca
              if($_POST) {
                //Se assim for, ele deve substituir a array com as informacoes enviadas pelo usuario: filtrar por pedido ou descricao
                $pedidos = $obj->findAll("pedido", "id_produto LIKE '%$_POST[busca]%' OR id_cliente LIKE '%{$_POST['busca']}%'");
              }
              
              //Independente do resultado do $_POST, ele obtem a array e distribui
              foreach ($pedidos as $pedido):
              ?>
              <tr>
                <td><?= $pedido['id']; ?></td>
                <td><?= $pedido['id_produto']; ?></td>
                <td><?= $pedido['id_cliente']; ?></td>
                <td><a class="bt_default" href="alterar_pedido.php?id=<?= $pedido['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                <td><a class="bt_default" href="excluir_pedido.php?id=<?= $pedido['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
              </tr>
              <?php 
                endforeach;
              ?>
              
              </tbody>
            </table>
          </div>
        </div>

<?php include ('layout/footer.php'); ?>