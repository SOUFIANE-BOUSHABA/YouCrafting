<?php 
include 'db.php';
require_once 'user.php';
if(isset($_POST["regester"])){
    extract($_POST);
    $db = new DB();
   $users= new user($db->connect());

    $result=$users->Registre($firstname,$lastname,$username,$password,$email,$role_id);
    if($result) header('location:./login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>User Registration</title>
</head>
<body>

<div class="container col-md-5 mt-5">
  <h2>User Registration</h2>
  <form  method="post">
    <div class="mb-3">
      <label for="firstname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstname" name="firstname" required>
    </div>
    <div class="mb-3">
      <label for="lastname" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lastname" required>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="role_id" class="form-label">Role ID</label>
      <input type="text" class="form-control" id="role_id" name="role_id" required>
    </div>
    <button type="submit"  name="regester" class="btn btn-primary">Register</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
