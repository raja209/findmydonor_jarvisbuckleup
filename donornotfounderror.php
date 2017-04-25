<?php
/* Displays all error messages */
?>
<!DOCTYPE html>
<html>
<head>
  <title>Donors not found</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Donors not available!</h1>
    <p>
    <?php 
    echo "No suitable donors were found. Please try again later!";
    ?>
    </p>     
    <a href="index.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
