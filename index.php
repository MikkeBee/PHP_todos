<!DOCTYPE html>
<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>To do</title>
</head>
<body>
    <div class="addEntry">
        <?php   include './create.php' ?>
    </div>
    <!-- <div class="updateEntry">
        <?php  // include './update.php' ?>
    </div>  -->
    <!-- <div class="deleteEntry"> <?php // include "./delete.php" ?> -->
    </div>
    <div class="listContainer">
        <h2> TODO </h2>
              <?php include "./read.php" ?> 
    </div>
    
</body>
</html>