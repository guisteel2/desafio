<?php

require __DIR__.'/../vendor/autoload.php';

use App\controller\produto;

$produtos = produto::listaProdutos();

// echo '<pre>'; print_r($produtos); echo '</pre>';

?>

<!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Dashboard</h1>
    </div>
    <div class="Ajuste">
      <div class="infor">
        <p>Você tem <?=count($produtos); ?> produtos adicionados a esta loja: </p>
        <a href="./assets/addProduct.php" class="btn-action">Adicionar novo produto</a>
      </div>
      <ul class="product-list">
        <?php foreach ($produtos as $produtos) { ?>
          <li>
            <div class="product-image">
              <img src="<?= $produtos->url ?>" layout="responsive" width="164" height="145" alt="Tênis Runner Bolt" />
            </div>
            <div class="product-info">
              <div class="product-name"><span><?= $produtos->Nome ?></span></div>
              <div class="product-price"><span class="special-price"><?= $produtos->quantidade ?> available</span> <span>R$<?= $produtos->preco ?></span></div>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
  </main>
  <!-- Main Content -->
