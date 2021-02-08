
<?php include './template/header.php'; 
require __DIR__.'/../vendor/autoload.php';
use App\controller\produto;

$produtos = produto::listaProdutos();

echo '<pre>'; print_r($produtos[0]->id); echo '</pre>';
?>

<!-- Main Content -->
<main class="content">
  <div class="header-list-page">
    <h1 class="title">Products</h1>
    <a href="/assets/addProduct.php" class="btn-action">Add new Product</a>
  </div>
  <table class="data-grid">
    <tr class="data-row">
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Name</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">SKU</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Price</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Quantity</span>
      </th>
      <th class="data-grid-th">
          <span class="data-grid-cell-content">Categories</span>
      </th>

      <th class="data-grid-th">
          <span class="data-grid-cell-content">Actions</span>
      </th>
    </tr>
    <tr class="data-row">
      <td class="data-grid-td">
          <span class="data-grid-cell-content">Product 1 Name</span>
      </td>
    
      <td class="data-grid-td">
          <span class="data-grid-cell-content">SKU1</span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content">R$ 19,90</span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content">100</span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content">Category 1 <Br />Category 2</span>
      </td>
    
      <td class="data-grid-td">
        <div class="actions">
          <div class="action edit"><span>Edit</span></div>
          <div class="action delete"><span>Delete</span></div>
        </div>
      </td>
    </tr>
    <tr class="data-row">
      <td class="data-grid-td">
          <span class="data-grid-cell-content">Product 2 Name</span>
      </td>
    
      <td class="data-grid-td">
          <span class="data-grid-cell-content">SKU2</span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content">R$ 59,90</span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content">999</span>
      </td>

      <td class="data-grid-td">
          <span class="data-grid-cell-content">Category 1</span>
      </td>
    
      <td class="data-grid-td">
        <div class="actions">
          <div class="action edit"><span>Edit</span></div>
          <div class="action delete"><span>Delete</span></div>
        </div>
      </td>
    </tr>
  </table>
</main>
<!-- Main Content -->

<?php include './template/footer.php'; ?>