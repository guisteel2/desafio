<?php include './template/header.php'; $return = $_SERVER['HTTP_REFERER']; ?>
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Category</h1>
    
    <form>
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" id="category-name" class="input-text" />
        
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" id="category-code" class="input-text" />
        
      </div>
      <div class="actions-form">
        <a href="<?= $return ?>" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
  </main>
  <!-- Main Content -->

  <?php include './template/footer.php'; ?>
