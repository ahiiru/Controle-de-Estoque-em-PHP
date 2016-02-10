  <body>
    <form method="post" action="">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Navegação</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="consulta_produto.php">Controle de Estoque</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="hidden-sm hidden-md hidden-lg"><a href="#">Produtos</a></li>
              <li class="hidden-sm hidden-md hidden-lg"><a href="#">Clientes</a></li>
              <li class="hidden-sm hidden-md hidden-lg"><a href="#">Pedidos</a></li>
              <li class="f-login"><span class="hidden-sm hidden-md hidden-lg">Login: </span><?= $_SESSION['email']; ?></li><li><a href="logout.php">Sair</a></li>
            </ul>
            <?php if (($page == 'consulta_produto.php') || ($page == 'consulta_cliente.php') || ($page == 'consulta_pedido.php')) { ?>
            <div class="navbar-form navbar-right">
              <input type="text" class="form-control" placeholder="Pesquisar..." name="busca">
            </div>
            <?php } ?>
          </div>
        </div>
      </nav>
      
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li<?php if (($page == 'consulta_produto.php') || ($page == 'incluir_produtos.php') || ($page == 'alterar_produto.php')) { ?> class="active"<?php } ?>><a href="consulta_produto.php">Produtos<?php if (($page == 'consulta_produto.php') || ($page == 'incluir_produtos.php') || ($page == 'alterar_produto.php')) { ?> <span class="sr-only">(selecionado)</span><?php } ?></a></li>
            <li<?php if (($page == 'consulta_cliente.php') || ($page == 'incluir_clientes.php') || ($page == 'alterar_cliente.php')) { ?> class="active"<?php } ?>><a href="consulta_cliente.php">Clientes<?php if (($page == 'consulta_cliente.php') || ($page == 'incluir_clientes.php') || ($page == 'alterar_cliente.php')) { ?> <span class="sr-only">(selecionado)</span><?php } ?></a></li>
            <li<?php if (($page == 'consulta_pedido.php') || ($page == 'incluir_pedidos.php') || ($page == 'alterar_pedido.php')) { ?> class="active"<?php } ?>><a href="consulta_pedido.php">Pedidos<?php if (($page == 'consulta_pedido.php') || ($page == 'incluir_pedidos.php') || ($page == 'alterar_pedido.php')) { ?> <span class="sr-only">(selecionado)</span><?php } ?></a></li>
          </ul>
        </div>