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

    <div class="container">
        <form method="post">
            <div class="row">

                <h4 for="recipient-name">Search Sweet's By Price</h4>

                <div class="col-6">
                    <div class="mb-3">
                        <input type="number" class="form-control" name="sfrom" placeholder="From" required>
                    </div>
                </div>
                <div class="col-6">

                    <div class="mb-3">
                        <input type="number" class="form-control" name="sto" placeholder="To" required>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-between">
                <input type="submit" value="Search" class="btn btn-warning" name="search">
                <a class="btn btn-warning" href="adminlogin.php">Admin_login</a>
            </div>

        </form>
    </div>

    <?php
    require('connect.php');
    if (isset($_POST['search'])) {
        $q = "SELECT * FROM tblsweet WHERE price BETWEEN $_POST[sfrom] AND $_POST[sto]";
        $result = mysqli_query($mysql, $q);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='container'>";
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
            echo "</div>";
        } else {
            echo '<div class=" container my-5 alert alert-light w-70" role="alert">
            No Records Found!
          </div>';
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>