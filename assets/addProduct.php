<?php 
  include './template/header.php';
  require __DIR__.'/../vendor/autoload.php';
  use App\controller\produto;
  use App\controller\categoria;

  $return = $_SERVER['HTTP_REFERER'];
  $categoria = categoria::listaCategorias();

  if(strpos($return, '/assets/addProduct.php') !== false){
    $return = "/assets/products.php";
  }

  if(!isset($_GET['id'])){
    $desc_htm = "Novo Produto";
    $desc_url = "/assets/addProduct.php";
  }else{
    $produto = produto::listaProdutos($_GET['id']);
    $desc_htm = "Editar Produto : ". $produto[0]->Nome;
    $desc_url = "/assets/addProduct.php?edit=".$_GET['id'];
  }

  if(count($_POST) > 0 ){
    
    if(isset($_GET['edit'])){
      $cadastroP = produto::editar($_GET['edit'] , $_POST);
    }else{
      $cadastroP = produto::cadastrar($_POST);
    }
    // echo '<pre>'; print_r($cadastroP); echo '</pre>';
    // echo '<pre>'; print_r('><><>'); echo '</pre>';
    if($cadastroP == 'Produto salvo com sucesso!'){?>
              <script type="text/javascript">
                alert('Produto salvo com sucesso!');
                <?php if(isset($_GET['edit'])){ ?>
                  window.location.href = '/assets/products.php';
                <?php } ?>
              </script>
      <?php }
    else { ?>
          <script type="text/javascript">
            var teste = "Por favor preencher todos os campos e adicionar uma foto para o produto";
            alert(teste);
          </script>
    <?php }
  } 
?>
  
<!-- Main Content -->
<main class="content" style="height: auto!important;">
  <h1 class="title new-item"><?= $desc_htm ?></h1>
  <div class="Ajuste">
    <form method="post" action="<?= $desc_url ?>" enctype="multipart/form-data">
      <div class="input-field">
        <div class="form-group" style="text-align: center;">
          <strong>Foto Do Cliente</strong>
          <div class="center">
              <div class="form-input" >
                  <label for="file-ip-1">Procurar img</label>
                  <input type="file" id="file-ip-1" accept="image/*" name="image" onchange="showPreview(event);">
                  <div class="preview">
                          <?php if($produto[0]->url){?>
                            <img id="file-ip-1-preview" src="<?= $produto[0]->url ? $produto[0]->url : ''  ?>" > 
                          <?php }else{ ?>
                            <img id="file-ip-1-preview" style="display: none;" src="" > 
                            <?php } ?>  
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="input-field">
        <label for="sku" class="label">Codigo(SKU)</label>
        <input type="number" name="codigo" id="sku" class="input-text" value="<?=$produto[0]->SKU ? $produto[0]->SKU : '' ?>"/> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Nome</label>
        <input type="text" name="nome" id="name" class="input-text" value="<?=$produto[0]->Nome ? $produto[0]->Nome : '' ?>"/> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Preco</label>
        <input type="number" step="0.01" name="preco" id="price" class="input-text" value="<?=$produto[0]->preco ? $produto[0]->preco : '' ?>"/> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantidade</label>
        <input type="number" name="qtd" id="quantity" class="input-text" value="<?=$produto[0]->quantidade ? $produto[0]->quantidade : '' ?>"/> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categoria</label>
        <select id="category" name="categoria" class="input-text" style="height: 50px!important; width: 72%;">
        <?php foreach($categoria as $categoria){?>
          <option value="<?= $categoria->id ?>" <?= $produto[0]->categoria_id == $categoria->id ? 'selected':'' ?> ><?=  $categoria->nome ?> </option>
        <?php } ?>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Descricao</label>
        <textarea id="description" name="descricao" class="input-text"><?=$produto[0]->descricao ? $produto[0]->descricao : '' ?></textarea>
      </div>
      <div class="actions-form">
        <a href="<?= $return ?>" class="action back">Voltar</a>
        <input class="btn-submit btn-action" type="submit" value="Salvar Produto" />
      </div>
    </form>
  </div>
  
</main>
<!-- Main Content -->

<?php include './template/footer.php'; ?>

