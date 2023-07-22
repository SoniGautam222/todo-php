<?php
$connection=new mysqli('localhost','root','','form');

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($email!="" && $password!="" ){

    $cmd="select * from reg";
    $command=mysqli_query($connection,$cmd);
    $k=0;
    foreach($command as $value){
        if($value['email']==$email && $value['pass']==$password){
            session_start();
            $_SESSION['user']=$email;
            $k++;
            break;
        }
    }
    if($k==1){
        header("location: todo.php");
    } ?>
     <script> 
        alert("Invalid Credentails");
    </script>
   <?php

    }
}
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login here</h1>
    <form action="" method="post">
      
        <input type="email" name="email" placeholder="Enter your email" ><br>
        <input type="password" name="password" placeholder="Enter your password" ><br>
       
        <input type="submit" style="margin-left:270px"; name="login" value="Login">
    </form>
</body>
</html>