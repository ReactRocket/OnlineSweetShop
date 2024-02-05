<?php
require('connect.php');

if (isset($_POST['login'])) {
  $query = "SELECT * FROM tbladmin WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
  $result = mysqli_query($mysql, $query);

  if (mysqli_num_rows($result) == 1) {

    header("location: addsweet.php");
  } else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>WRONG!!!</strong> username or password
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
  }
} else {
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">
  <h1 class="text-center text-warning">ONLINE SWEET STORE</h1>

  <div class="container " style="width:500px; margin-top:8pc;">
    <form method="post" class="border border-warning p-4 rounded">
      <div class="form" class="mt-5 ms-auto">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control my-2">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control my-2">
        </div>
      </div>
      <div class="container d-flex justify-content-between">
        <input type="submit" value="Login" class="mt-5 btn btn-warning text-white" name='login'>
        <a href="index.php" value="Cancel" class="mt-5 btn btn-danger text-white" name='cancel'>Cancel</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
</body>

</html>