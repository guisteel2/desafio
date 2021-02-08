<?php include './template/header.php'; 
require __DIR__.'/../vendor/autoload.php';
use App\controller\produto;


if(isset($_GET['busca'])){
  $produtos = produto::listaProdutos($_GET['busca']);
  unset($_GET['busca']);
}else{
  $produtos = produto::listaProdutos();
}

if(isset($_GET['deletar']) & is_numeric($_GET['deletar'])){
  $excluir = produto::deletar($_GET['deletar']);
  if($excluir){ ?>
    <script type="text/javascript">
              <?php unset($_GET['deletar']); ?>
                alert('produto excluido com sucesso!');  
                window.location.href = '/assets/products.php';         
    </script>
    <?php }
} ?>

<!-- Main Content -->
<main class="content" >
  <div class="header-list-page">
    <h1 class="title">Produtos  <a href="/assets/addProduct.php" class="btn-action">Adicionar novo produto</a></h1>
  </div>
  <div class="Busca">
    <form action="/assets/products.php" method="get">
      <input type="text" name="busca" placeholder="Buscar"  id="sku" class="input-text"/> 
      <input class="btn-submit btn-action" type="submit" value="Buscar" style="width: 27%;"/>
    </form>
  </div>
  <table class="data-grid">
    <tr class="data-row">
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Nome</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Codigo(SKU)</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Descricao</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Preco</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Quantidade</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Categoria</span>
      </th>

      <th class="data-grid-th">
          <span class="data-grid-cell-content">Ações</span>
      </th>
    </tr>

    <?php foreach($produtos as $produtos){ ?>
      <tr class="data-row">

      <td class="data-grid-td">
          <span class="data-grid-cell-content"><?= $produtos->Nome?></span>
      </td>
      <td class="data-grid-td">
          <span class="data-grid-cell-content"><?= $produtos->SKU ?></span>
      </td>
      <td class="data-grid-td">
          <span class="data-grid-cell-content"><?= $produtos->descricao ?></span>
      </td>
      <td class="data-grid-td">
          <span class="data-grid-cell-content"><?= $produtos->preco ?></span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content"><?= $produtos->quantidade ?></span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content"><?= $produtos->categoria_id ?></span>
      </td>

      <td class="data-grid-td">
        <div class="actions">
          <div class="action edit"> <a href="/assets/addProduct.php?id=<?= $produtos->id ?>">Editar</a></div> 
          <div class="action edit"> <a href="/assets/products.php?deletar=<?= $produtos->id ?>">Deletar</a></div>             
        </div>
      </td>
      </tr>
    
    <?php } ?>

  </table>
</main>
<!-- Main Content -->

<?php include './template/footer.php'; ?>