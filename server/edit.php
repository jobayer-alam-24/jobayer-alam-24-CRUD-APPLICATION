<?php
include("serverconnection.php");
?>
<?php
    $id = $_POST["id"];
    $query = 'SELECT * FROM user_signup_info WHERE id = ' . $id;
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $phoneNumber = $row['phone_number'];
        $email = $row['email'];
        $password = $row['password'];
    }

    //update query....
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['fullname'];
        $phoneNumber = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "UPDATE user_signup_info SET name = '$name', phone_number = '$phoneNumber', email = '$email', password = '$password' WHERE id = $id";

        $submit = mysqli_query($conn, $query);
        if($submit){
            header("Location: datatable.php");    
        }
        else{
            $message = "There is something wrong with the Updation";
            echo '<script>alert("' . $message . '")</script>';
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data fetch from Database</title>
  <link rel="stylesheet" href="../allstyles/style2.css" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success mb-5">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1dcc28;">
        <div class="container">
            <!-- Brand removed -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 1.2rem;" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" style="font-size: 1.2rem;" href="datatable.php">Data Table</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Heading -->
    <div class="container mt-5">
        <h2 class="text-center text-white">Edit Database Form</h2>
    </div>

    <!-- Registration Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-info text-white">
                        <h2>Edit Data</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phoneNumber; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-info btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
