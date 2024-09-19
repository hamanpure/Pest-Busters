<?php
   $Username = $_POST['Username'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   $conn = new mysqli('localhost','root','','registration');
   if($conn->connect_error){
        die('connection Failed :'.$conn->connect_error);
   }else{
        $stmt = $conn->prepare("insert into register(username,email,password) values(?,?,?)");
        $stmt->bind_param("sss",$Username,$email,$password);
        $stmt->execute();
        echo "registration successfully";
        $stmt->close();
        $conn->close();
   }
?>