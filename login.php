<?php
session_start();
include 'db.php';
require_once 'user.php';
$db = new DB();
$users= new user($db->connect());
if(isset($_POST["login"])){
    extract($_POST);
    $result=$users->Login($username,$password);
    $_SESSION['idUser']=$result['Id'];
    $_SESSION['role']=$result['role_id'];
    $_SESSION['name']=$result['username'];
   
    header("location: ./index.php");
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>User Login</title>
</head>
<body>

<div class="container col-md-5 mt-5">
  <h2>User Login</h2>
  <form  method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit"  name="login" class="btn btn-primary">Login</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
