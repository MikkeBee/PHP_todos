<?php
include './db.php';

$query = "SELECT * FROM todos ORDER BY 'date' desc";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Nothing to get');
};

 if (isset($_POST['submit'])){
     $task = $_POST['task'];
     $date = date("Y-m-d H:i:s");

     $query = "INSERT INTO todos(task,date) VALUES('$task','$date')"; 
     $result = mysqli_query($connection, $query);

     if(!$result){
         die("Could not post. Sorry.");
      }
 }

?>


    <div class="container">
      <form action="create.php" method="POST" class="form">
        <textarea rows="5"
            cols="50"
            id="task"
            name="task"></textarea>
        <div>
          <button type="submit" name="submit" class="btn">Send Message!</button>
        </div>
      </form>
    </div>
