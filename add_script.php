<?php
  include 'connection_data.php';

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $status = 0;
  $current_date = date('Y-m-d H:i:s');

  $sql = "INSERT INTO `help_ukr` (`id`, `date`, `name`, `need`, `contacts`, `status`, `comments`)
    VALUES
    (NULL, '$current_date', '{$_REQUEST['name']}', '{$_REQUEST['need']}',
    '{$_REQUEST['contacts']}', {$status}, '{$_REQUEST['comments']}' );";


  if ($conn->query($sql) === TRUE) {
    echo "Rekord został dodany pomyślnie";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

  header("Location: index.php");
  die();
?>