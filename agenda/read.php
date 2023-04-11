<?php include('connect.php');

$sql = 'SELECT * FROM Agenda';
$stmt = $conn->prepare($sql);
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>My Agenda</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid nav justify-content-center">
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="create.php">ADD new contact</a>
  </li>
</ul>
  </div>
</nav>
<div class="container my-5 text-center">
      <h1>My contacts</h1>
</div>
        <div class="card col-md-10 mt-5 mx-auto">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Number</th> 
      <th scope="col">Address</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody> 
    <?php foreach($contacts as $friend):?>
   <tr>
    <td><?= $friend->ID; ?></th>
    <td><?= $friend->name; ?></td>
    <td><?= $friend->email; ?></td>
    <td><?= $friend->number; ?></td>
    <td><?= $friend->address; ?></td> 
    <td> 
    <button class="btn btn-primary"><a href="update.php?ID=<?= $friend->ID; ?>" class="text-light text-decoration-none">UPDATE</a></button>
    <button class="btn btn-danger"><a href="delete.php?ID=<?= $friend->ID; ?>" class="text-light text-decoration-none">DELETE</a></button>
    <button class="btn btn-info"><a href="vcard.php?ID=<?= $friend->ID; ?>" class="text-light text-decoration-none">INFO CARD</a></button>
  </td>
  </tr> 
  <?php endforeach; ?>
</table>
    </div>
    </div>
</body>
</html>
