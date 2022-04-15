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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akshar&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="index.css">
    <title>To do</title>
</head>
<body>
  <header>
<h1> TO DO </h1>
<h3>An app by Jenna, Mikke & Oscar</h3>
</header>
    <div class="container">
        
          <form action="index.php" method="POST" class="form">
            <textarea
                id="task"
                name="task"></textarea>
            
              <button type="submit" name="submit" class="btn">Add item to the list</button>
            
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
         <input class="inputButton" type="submit" name="delete" value="Delete">
    </form>

</div>
 <?php } ?> 
 </div>
</body>
</html>