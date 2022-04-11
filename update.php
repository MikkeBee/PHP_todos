<?php include './db.php';

$query = "SELECT * FROM todos";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Query failed');
}
?>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $query = "UPDATE todos SET task='$task' WHERE id = $id";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Update query failed" . mysqli_error($connection));
    }
  }
?>

<h1>Update Task</h1>
<form action="update.php" method="post">
<select name="id" id="">
        <?php
        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            echo "<option value='$id'>$id</option>";
        }    
        ?>    
    </select>
     
    <textarea id="task" name="task"></textarea>
    <input type="submit" name="submit" value="Update">
</form>