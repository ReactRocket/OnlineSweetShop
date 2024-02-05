<?php
require('connect.php');

if (isset($_POST['add'])) {
  $query = "INSERT INTO `tblsweet`(`sweetname`, `price`, `qty`) VALUES ('$_POST[sname]','$_POST[sprice]','$_POST[sqty]')";
  $result = mysqli_query($mysql, $query);

  if ($result) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Successfully!!!</strong> Inserted
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
  } else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>WRONG!!!</strong> Not Inserted!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
  }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">
    <h1 class="text-center text-warning">ONLINE SWEET STORE</h1>

    <div class="container">
        <div class="container d-flex justify-content-between">
            <input type="submit" value="Add Sweet" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
            <a href="index.php" value="Cancel" class=" btn btn-danger text-white" name='cancel'>Logout</a>

        </div>
        <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New Sweet</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Sweet-Name</label>
                                <input type="text" class="form-control" name="sname">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Price</label>
                                <input type="number" class="form-control" name="sprice">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Quaninty</label>
                                <input type="number" class="form-control" name="sqty">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" name="add">ADD</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--  -->
        <?php
    require('connect.php');
    $q = "SELECT * FROM tblsweet";
    $result = mysqli_query($mysql, $q) or die("Query Failed!");
    if (mysqli_num_rows($result) > 0) {

      echo '<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Sweet-Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
     
    </tr>
  </thead>';

      while ($r = mysqli_fetch_array($result)) {
        echo "<tbody>
    <tr>
      <td>$r[1]</td>
      <td>$r[2]</td>
      <td>$r[3]</td>
    </tr>
  </tbody>";
      }

      echo '</table>';
    }
    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>