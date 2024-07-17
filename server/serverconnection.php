<?php

    class DataBaseConnection{
        public $hostName;
        public $userName;
        public $password;
        public $db_name;
        public $connect;
        public function __construct($hostName, $userName, $password, $db_name){
            $this->hostName = $hostName;
            $this->userName = $userName;
            $this->password = $password;
            $this->db_name = $db_name;

            $this->connect = mysqli_connect($hostName, $userName, $password, $db_name);

            if (!$this->connect) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                // echo "Connected successfully";
            }

        }
       public function insert($name, $phone, $email, $pass, $conPassword){
        $sql = "INSERT INTO user_signup_info(name, phone_number, email, password, confirm_password) VALUES ('$name','$phone','$email','$pass','$conPassword')";

        if(mysqli_query($this->connect, $sql) == True){
            // echo "Inserted";
        }else{
            echo "Error: " + mysqli_error($this->connect);
        }
       }
       public function select(){
        $query = "SELECT * FROM user_signup_info";
        $conn = mysqli_query($this->connect, $query);

        if($conn == True){
            // echo "Selected";
        }else{
            echo "Error: " + mysqli_error($this->connect);
        }
        return $conn;
       
       }
       public function edit($id){
        $query = 'SELECT * FROM user_signup_info WHERE id = ' . $id;

        $conn = mysqli_query($this->connect, $query);

        if($conn == True){
            // echo "Edited";
        }else{
            echo "Error: " + mysqli_error($this->connect);
        }
        return $conn;
       }
       public function EditSubmit($name, $phoneNumber, $email, $password, $id){
        $query = "UPDATE user_signup_info SET name = '$name', phone_number = '$phoneNumber', email = '$email', password = '$password' WHERE id = $id";

        $conn = mysqli_query($this->connect, $query);

        if($conn == True){
            echo "Edit Submitted";
        }else{
            echo "Error: " + mysqli_error($this->connect);
        }
        return $conn;
       }
       public function delete($id){
        $query = 'DELETE FROM user_signup_info WHERE id = ' . $id;

        $conn = mysqli_query($this->connect, $query);

        if($conn == True){
            echo "Deleted";
        }else{
            echo "Error: " + mysqli_error($this->connect);
        }
        return $conn;
       }
    }
    $conn = new DataBaseConnection("localhost", 'root', "", "schedule_manager");
    
?>