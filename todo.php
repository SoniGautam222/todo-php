<?php
 session_start();
 $username = $_SESSION['user'];
//  echo $username;
$server='localhost';
$user='root';
$password='';
$database='todo';



$connection=new mysqli($server,$user,$password,$database);

if(isset($_POST['sub'])){
   
    $title=$_POST['title'];
    $task=$_POST['task'];
    $cmd="insert into task(title,task,user) values ('$title','$task','$username')";
    $add=mysqli_query($connection,$cmd);
    if(isset($add)){ ?>
    <script>
        alert("data inserted successfully!");
    </script>
       <?php
    }else{ ?>
        <script>
        alert("Error occurred!");
    </script>
  <?php  }
}
$ret="select * from task where user='$username'";
$obj=mysqli_query($connection,$ret);

// for deletion
if(isset($_POST['delete'])){
    $number=$_POST['id'];
    $comm="delete from task where number=$number";
    $del=mysqli_query($connection,$comm);
    if(isset($del)){
        echo "delete !";
        header("location: ./todo.php");
    }
}


if(isset($_POST['update'])){
    $id = $_POST["id"];
header("Location: ./updatePage.php?id=".urlencode($id));

}
if(isset($_POST['logout'])){
    session_destroy();
    header("location:reg.php");
}

$num = 0;

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
        <input type="text" id="t" name="title" placeholder="Enter the title" >
        <input type="text" name="task" placeholder="Enter the task" >
        <input type="submit" name="sub" value="Add">
        <input type="submit" name="logout" value="Log out">
    </form>
    
    <?php foreach($obj as $v) { $num++; ?>
        
        <div class="card text-center">
  <div class="card-header">
    <?php echo $num; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $v['title']; ?></h5>
    <p class="card-text"><?php echo $v['task']; ?></p>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $v['number'] ?>" >
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <button type="submit" name="delete" class="btn btn-primary">Delete</button>
    <!-- <button type="submit" name="logout" class="btn btn-primary">Log out</button> -->
 </form>
  
  </div>
  <div class="card-footer text-muted">
        <?php echo date(' Y-m-d H:i:s' ) ?>
  </div>
</div>
<?php } ?>

</body>
</html>