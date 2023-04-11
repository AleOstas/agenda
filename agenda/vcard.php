<?php include('connect.php');

$ID = $_GET['ID'];
$sql = 'SELECT * FROM Agenda WHERE ID = :ID';
$stmt = $conn->prepare($sql);
$stmt->execute([':ID' => $ID]);
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
    <title>Contact details</title>
</head>
<body>
<div class="card col-md-5 my-4 mx-auto"> 
    <h3 class="card-header text-center">Contact details</h3>
    <div class="card-body">
    <?php foreach($contacts as $friend): ?>
  <?= $friend->name; ?>
  <?php endforeach;?>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $friend->email; ?></li>
    <li class="list-group-item"><?= $friend->number; ?></li>
    <li class="list-group-item"><?= $friend->address; ?></li>
  </ul>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
  <button class="btn btn-primary me-md-2"><a href="read.php"class="text-light text-decoration-none" type="button">Back</a></button>
</div>
  </div>
</body>
</html>