<?php
$server='localhost';
$user='root';
$password='';
$database='todo';

$connection=new mysqli($server,$user,$password,$database);

$id = $_GET['id'];

if(isset($_POST['sub'])){
    $title=$_POST['title'];
    $task=$_POST['task'];
    $cmd="UPDATE task SET title = '$title' , task = '$task' WHERE number=$id ";
    $add=mysqli_query($connection,$cmd);
    if(isset($add)){ 
    echo "<script>
        alert('data inserted successfully!');
    </script>";
    header("location: ./todo.php");
      
    }else{ ?>
        <script>
        alert("Error occurred!");
    </script>
  <?php  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Todo App</h1>
    <form action="" method="post">
        <input type="text" id="t" name="title" placeholder="Enter the title" required>
        <input type="text" name="task" placeholder="Enter the task" required>
        <input type="submit" name="sub" value="Add">
    </form>
</div>

</body>
</html>