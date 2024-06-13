<?php
    include("./server/serverconnection.php");
?>
<?php

    if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["submit"])){
        $full_name = $_POST["name"];
        $phone_number = $_POST["p-number"];
        $email = $_POST["mail"];
        $passwordCheck = $_POST["password"];
        $confirm_pass = $_POST["passConfirm"];

        if(empty($full_name) || empty($phone_number) || empty($email) || empty($passwordCheck) || empty($confirm_pass)){
            echo "Please fill out all the fields!";
        }else{
            $query = "INSERT INTO user_signup_info(name, phone_number, email, password, confirm_password) VALUES ('$full_name','$phone_number','$email','$passwordCheck','$confirm_pass')";

            $sendData = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if($sendData){
                header("Location: index.php");
            }else{
                echo "Failed! to send Data";
                die();
            }
        }  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Form</title>
    <link rel="stylesheet" href="./allstyles/style.css">
</head>
<body>
  <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="./server/datatable.php">Data Table</a></li>
        </ul>
    </div>
    <div class="container">
        <h2 class="container-form-title">Sign up</h2>

        <form action="index.php" method="post" enctype="multipart/form-data" id="regis-main-form">
            <div>
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" autofocus required placeholder="Enter your full name..">
            </div>
            <div>
                <label for="p-number">Phone number</label>
                <input type="text" name="p-number" id="p-number" required placeholder="Enter your contact number..">
            </div>
            <div>
                <label for="mail">E-mail</label>
                <input size="20" type="email" name="mail" id="mail" required placeholder="E-mail please...">
            </div>
            <div>
                <label for="pass">Password</label>
                <input type="password" name="password" id="pass1" minlength="4" maxlength="20" required placeholder="Enter the security keys..">
            </div>
            <div>
                <label for="pass">Confirm Password</label>
                <input type="password" name="passConfirm" id="pass2" minlength="4" maxlength="20" required placeholder="Retype your password">
            </div>
            <p class="btn"><button type="submit" name="submit" value="submit" >Submit</button></p>
            <a href="#" class="cs-btn">Login here</a>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>