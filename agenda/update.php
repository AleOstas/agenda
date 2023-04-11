<?php 
include('connect.php'); 
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="validation.js" type="text/JavaScript"></script>
    <title>Agenda</title>
  </head>
  <body>
    <div class="container">
      <div class="card col-md-5 mt-5 mx-auto"> 
    <h2 class="card-header text-center">UPDATE CONTACT</h2>
    <div class="card-body">
      <?php 
    $ID = $_GET['ID']; 
    $sql = 'SELECT * FROM Agenda WHERE ID = :ID';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':ID' => $ID]);
    $friend = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['submit'])) {

      $name = $_POST['name'];
      $email = $_POST['email'];
      $number = $_POST['number'];
      $address = $_POST['address']; 

      $sql = 'UPDATE Agenda SET name = :name, email = :email, number = :number, address = :address WHERE ID = :ID';
      $stmt = $conn->prepare($sql);

      if($stmt->execute([':name' => $name, ':email' => $email, ':number' => $number, ':address' => $address, ':ID' => $ID])) {

      header('location: read.php');
 }
    }
      ?>
      <form class="form" method="post" onsubmit="return validate();">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?= $friend->name; ?>" required autocomplete="off">
  </div>
<div class="mb-3">
    <label>E-mail</label>
    <input type="email" class="form-control" placeholder="Enter your email" name="email" value="<?= $friend->email; ?>" required autocomplete="off">
  </div> 
  <div class="mb-3">
    <label>Number</label>
    <input type="text" id="mobile" class="form-control" placeholder="Enter your number" name="number" value="<?= $friend->number; ?>" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Address</label>
    <input type="text" class="form-control" placeholder="Enter your address" name="address" value="<?= $friend->address; ?>" required autocomplete="off">
  </div>
  <div class="d-grid col-1 mx-auto mt-3">
  <button type="submit" class="btn btn-primary" name="submit">Update</button> 
  </div>
</form>
<script src="validation.js" type="text/JavaScript"></script>
    </div>
    </div>
    </div>
  </body>
</html>