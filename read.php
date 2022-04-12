<?php 
include './db.php';

$query = "SELECT * FROM todos ORDER BY 'date' desc";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Nothing to get');
};


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $query = "UPDATE todos SET task='$task' WHERE id = $id";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Update query failed" . mysqli_error($connection));
    }
  };

if (isset($_POST['delete'])) {  
    $id = $row['id']; 
    $query = "DELETE FROM todos WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Delete query failed" . mysqli_error($connection));
    }
  };





?>

<?php while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $task = $row['task'];
    $date = $row['date'];
 ?>
 <div>
     <form action="delete.php" method="post" >
     <select name="id" id="">
         <?= "<option value='$id'>$id</option>" ?>    
     </select>
     <input type="submit" name="submit" value="DELETE">
 </form>

    <form class="listItem" action="update.php" method="post">
         <select name="id" id="">
          <?= "<option value='$id'>$id</option>"?>     
        </select> 
         <input class="textfield" type="text"  value="<?= $task ?>" name="task" /> 
          <p> <?=$date?> </p> 
         <input type="submit" name="update" value="Update">
    </form>
</div>
 <?php } ?>   