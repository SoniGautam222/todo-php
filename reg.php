<?php
$connection=new mysqli('localhost','root','','form');

if(isset($_POST['reg'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $age=$_POST['age'];
    if($name!="" & $email!="" & $password!="" ){

    $cmd="insert into reg (name,email,pass,age) values ('$name','$email','$password','$age')";
    $command=mysqli_query($connection,$cmd);
    if(isset($command)){ ?>
    <script>
        alert("Registration Successfull!");
    </script>
    <?php }  
   else{ ?> 
        <script>
        alert("Registration Unsuccessfull!");
    </script>
    <?php }
}
}

if(isset($_POST['login'])){
    header("location: login.php");
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
    <h1>Registration Form</h1>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Enter your name" ><br>
        <input type="email" name="email" placeholder="Enter your email" ><br>
        <input type="password" name="password" placeholder="Enter your password" ><br>
        <input type="number" name="age" placeholder="Enter your age" >
        <input type="submit" name="reg" value="Register">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>