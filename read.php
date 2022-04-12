<?php 
include './db.php';

$query = "SELECT * FROM todos ORDER BY 'date' desc";
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
    echo "<li class='listItem'> <p>ID: $id </p> <p> $task</p> <p> $date</p> </li>";
}
 ?></div>