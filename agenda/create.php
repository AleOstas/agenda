<?php include('connect.php');

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $address = $_POST['address']; 

  $sql = 'INSERT INTO Agenda (name, email, number, address) VALUES(:name, :email, :number, :address)';
  $stmt = $conn->prepare($sql);

      if($stmt->execute([':name' => $name, ':email' => $email, ':number' => $number, ':address' => $address])) {
        header('location: read.php');
 }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Agenda</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid nav justify-content-center">
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="read.php">Contacts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vcard.php">Info Card</a>
  </li>
</ul>
  </div>
</nav>
    <div class="card col-md-5 mt-5 mx-auto"> 
    <h2 class="card-header text-center">ADD CONTACT</h2>
    <div class="card-body">
      </div>
    <form class="form" method="post" onsubmit="return validate();">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" id="fname" class="form-control" placeholder="Enter your name" name="name"  autocomplete="off" required>
  </div>
<div class="mb-3">
    <label>E-mail</label>
    <input type="email" id="emailA" class="form-control" placeholder="Enter your email" name="email"  autocomplete="off" required>
  </div> 
  <div class="mb-3">
    <label>Number</label>
    <input type="text" id="mobile" class="form-control" placeholder="Enter number" name="number" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Address</label>
    <input type="text" id="address" class="form-control" placeholder="Enter your address" name="address" autocomplete="off" required>
  </div>
  <div class="d-grid col-1 mx-auto mt-3">
  <button type="submit" class="btn btn-primary" value="Submit" name="submit">Submit</button>
  </div>
</form>
<script src="validation.js" type="text/JavaScript"></script>
    </div>
    </div>
    </div>
  </body>
</html>