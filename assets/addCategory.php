<?php 
include './template/header.php'; 
require __DIR__.'/../vendor/autoload.php';
use App\controller\categoria;
$return = $_SERVER['HTTP_REFERER']; 

if(strpos($return, '/assets/addCategory.php') !== false){
  $return = "/assets/categories.php";
}

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  $desc_htm = "Novo Categoria";
  $desc_url = "/assets/addCategory.php";
}else{
  $categoria = categoria::listaCategorias($_GET['id']);
  $desc_htm = "Editar Categoria: ". $categoria[0]->nome;
  $desc_url = "/assets/addCategory.php?edit=".$_GET['id'];
}

if(count($_POST) > 0 ){

  if(isset($_GET['edit'])){
    $cadastroP = categoria::editar($_GET['edit'] , $_POST);
  }else{
    $cadastroP = categoria::cadastrar($_POST);
  }
  
  if($cadastroP == 'Por favor preencha todos os campos!'){?>
        <script type="text/javascript">
          alert('Por favor preencha todos os campos');
        </script>
    <?php }
    else {?>
        <script type="text/javascript">
              alert('categoria salvo com sucesso!');
              <?php if(isset($_GET['edit'])){ ?>
                window.location.href = '/assets/categories.php';
              <?php } ?>
              
            </script>
  <?php }
} ?>

  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item"><?= $desc_htm ?></h1>
    
    <form method="post" action="<?= $desc_url ?>" >
      <div class="input-field">
        <label for="category-name" class="label">Nome</label>
        <input type="text" name="nome" id="category-name" class="input-text" value="<?=isset($categoria[0]->nome) ? $categoria[0]->nome : ''; ?>" />
        
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Codigo</label>
        <input type="number" name="cod" id="category-code" class="input-text"  value="<?=isset($categoria[0]->codigo) ? $categoria[0]->codigo : ''; ?>" />
        
      </div>
      <div class="actions-form">
        <a href="<?= $return ?>" class="action back">Voltar</a>
        <input class="btn-submit btn-action"  type="submit" value="Salvar Categoria" />
      </div>
    </form>
  </main>
  <!-- Main Content -->

  <?php include './template/footer.php'; ?>
