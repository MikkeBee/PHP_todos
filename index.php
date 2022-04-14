<?php
include './db.php';

if (isset($_POST['submit'])){
    $task = $_POST['task'];
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO todos(task,date) VALUES('$task','$date')"; 
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Could not post. Sorry.");
     }
};

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];

    $query = "UPDATE todos SET task='$task'  WHERE id = $id";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Update query failed" . mysqli_error($connection));
    }
  };

if (isset($_POST['delete'])) {  
    $id = $_POST['id']; 
    $query = "DELETE FROM todos WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Delete query failed" . mysqli_error($connection));
    }
  };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>To do</title>
</head>
<body>

    <div class="container">
        <h1> TO DO </h1>
          <form action="index.php" method="POST" class="form">
            <textarea rows="5"
                cols="50"
                id="task"
                name="task"></textarea>
            <div>
              <button type="submit" name="submit" class="btn">Send Message!</button>
            </div>
          </form>
    </div>


    <div class="container">
<?php
$query = "SELECT * FROM todos ORDER BY 'date' desc";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Nothing to get');
};
while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $task = $row['task'];
    $date = $row['date'];
 ?>


<div class="tasks">
    <form class="update" action="index.php" method="post">
        <select name="id" id="">
            <?= "<option value='$id'>$id</option>"?>     
        </select> 
        <input class="textfield" type="text"  value="<?= $task ?>"  name="task" /> 
          <p> <?=$date?> </p> 
         <input class="inputButton" type="submit" name="update" value="Update">
         <input class="inputButton" type="submit" name="delete" value="DELETE">
    </form>

</div>
 <?php } ?> 
 </div>
</body>
</html>