<?php include './db.php';

$query = "SELECT * FROM todos";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Query failed');
}
?>

<h1>Update Task</h1>
<form>
<select name="id" id="">
        <?php
        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            echo "<option value='$id'>$id</option>";
        }    
        ?>    
    </select>
    <textarea></textarea>
    <button>Update</button>
</form>