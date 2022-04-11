<?php 
include './db.php';

$query = "SELECT * FROM todos";
$result = mysqli_query($connection, $query);
// $row = mysqli_fetch_array($result);
if(!$result){
    die('Nothing to get');
};



?>

<div><?php while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $task = $row['task'];
    $date = $row['date'];
    echo "Entry number: $id, Task: $task, Date added: $date <br>";
}
 ?></div>