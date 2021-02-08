
<?php include './template/header.php'; 
require __DIR__.'/../vendor/autoload.php';
use App\controller\categoria;

if(isset($_GET['busca'])){
  $catetgoria = categoria::listaCategorias($_GET['busca']);
  unset($_GET['busca']);
}else{
  $catetgoria = categoria::listaCategorias();
}


if(isset($_GET['deletar']) & is_numeric($_GET['deletar'])){
  $excluir = categoria::deletar($_GET['deletar']);
  echo '<pre>'; print_r($excluir); echo '</pre>';
  if($excluir){ ?>
    <script type="text/javascript">
              <?php unset($_GET['deletar']); ?>
                alert('categoria excluida com sucesso!');  
                window.location.href = '/assets/categories.php';
                          
    </script>
    <?php }
} 

?>

<!-- Main Content -->
<main class="content">
  <div class="header-list-page">
    <h1 class="title">Categorias <a href="/assets/addCategory.php" class="btn-action">Adicionar novo Categoria</a></h1>
  </div>
  <div class="Busca">
    <form action="/assets/categories.php" method="get">
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
          <span class="data-grid-cell-content">Codigo</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Ações</span>
      </th>
    </tr>
    <?php foreach($catetgoria as $catetgoria){ ?>
    
      <tr class="data-row">
        <td class="data-grid-td">
            <span class="data-grid-cell-content"><?= $catetgoria->nome ?></span>
        </td>
      
        <td class="data-grid-td">
            <span class="data-grid-cell-content"><?= $catetgoria->codigo ?></span>
        </td>
      
        <td class="data-grid-td">
          <div class="actions">
            <div class="action edit"> <a href="/assets/addCategory.php?id=<?= $catetgoria->id ?>">Editar</a></div> 
            <div class="action edit"> <a href="/assets/categories.php?deletar=<?= $catetgoria->id ?>">Deletar</a></div>             
          </div>
        </td>
      </tr>
    <?php } ?>
  </table>
</main>
<!-- Main Content -->

<?php include './template/footer.php'; ?>
