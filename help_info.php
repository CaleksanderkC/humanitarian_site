<!DOCTYPE html>
<html lang="pl">

<head>
  <title>Zmien</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <meta charset="utf-8">
</head>

<body>

<?php include 'header.php';?>

<main>

<?php
  include 'connection_data.php';

  $conn = new mysqli($servername, $username, $password, $dbname);
  
  if ($conn->connect_error){ die("Connection failed: " . $conn->connect_error); }

  $id = $_SERVER['QUERY_STRING'];

  if($id == ""){ die("Błąd"); }

  $sql = "SELECT * FROM `help_ukr` WHERE(id = {$id});";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div class='border-bottom p-3'>id:  {$row["id"]} </div>";
      echo "<div class='border-bottom p-3'>date:  {$row["date"]} </div>";
      echo "<div class='border-bottom p-3'>name: {$row["name"]} </div>";
      echo "<div class='border-bottom p-3'>need:  {$row["need"]} </div>";
      echo "<div class='border-bottom p-3'>contacts:  {$row["contacts"]} </div>";
      echo "<div class='border-bottom p-3'>status:  {$row["status"]} </div>";
      echo "<div class='border-bottom p-3'>comments:  {$row["comments"]} </div>";

      echo '<a class="btn btn-danger "  href="index.php">Delete</a>';
      echo '<a class="btn btn-success"  href="">Edit</a>'; // edit.php?' . $row["id"] . '
    }
  }
  else { echo "0 results"; }

  $conn->close();
?>


</main>


<?php include 'footer.php';?>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
