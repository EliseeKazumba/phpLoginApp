<?php
require 'db.php';
$message = '';
if (isset ($_POST['todos'])  && isset($_POST['due']) ) {
  $todos = $_POST['todos'];
  $due = $_POST['due'];
  $sql = 'INSERT INTO todolist(todos, due) VALUES(:todos, :due)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':todos' => $todos, ':due' => $due])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a todo</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="todos">Todos</label>
          <input type="text" name="todos" id="todos" class="form-control">
        </div>
        <div class="form-group">
          <label for="due">Due</label>
          <input type="date" name="due" id="due" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
