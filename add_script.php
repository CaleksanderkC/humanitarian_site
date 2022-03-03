<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "help_db";


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $status = $_REQUEST['status'] == '1' ? 1 : 0;

  $sql = "INSERT INTO `help_ukr` (`id`, `date`, `name`, `need`, `contacts`, `status`, `comments`) VALUES (NULL, '{$_REQUEST['date']}', '{$_REQUEST['name']}', '{$_REQUEST['need']}', '{$_REQUEST['contacts']}', {$status}, '{$_REQUEST['comments']}' );";


  if ($conn->query($sql) === TRUE) {
    echo "Rekord został dodany pomyślnie";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();

  header("Location: index.php");
  die();

?>