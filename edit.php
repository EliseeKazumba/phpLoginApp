<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM todolist WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['todos'])  && isset($_POST['due']) ) {
  $todos = $_POST['todos'];
  $due = $_POST['due'];
  $sql = 'UPDATE todos SET todos=:todos, due=:due WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':todos' => $todos, ':due' => $due, ':id' => $id])) {
    header("Location: index.php");
  }
}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="todos">Todo</label>
          <input value="<?= $person->todos; ?>" type="text" name="todos" id="todos" class="form-control">
        </div>
        <div class="form-group">
          <label for="due">Due</label>
          <input type="date" value="<?= $person->due; ?>" name="due" id="due" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
