
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Witi Odczyniki</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />

  </head>


  <body>



    <main>

      <a class="btn btn btn-success ms-5"  href="help_form.php" class="item-more">Dodaj +</a>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "help_db";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }else {
    echo "
    <div href='#' class='d-flex flex-row bd-highlight mb-3 justify-content-sm-between table-list bg-dark text-light'>
      <div class='p-2 bd-highlight'>id</div>
      <div class='p-2 bd-highlight'>date</div>
      <div class='p-2 bd-highlight'>name</div>
      <div class='p-2 bd-highlight'>need</div>
      <div class='p-2 bd-highlight'>contacts</div>
      <div class='p-2 bd-highlight'>status</div>
      <div class='p-2 bd-highlight'>comments</div>
    </div>";
  }

  $sql = "SELECT * FROM `help_ukr`";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      echo "
        <div class='d-flex flex-row bd-highlight mb-3 justify-content-sm-between table-list list-group-item list-group-item-action'>
          <div class='p-2 bd-highlight'>{$row['id']}</div>
          <div class='p-2 bd-highlight'>{$row['date']}</div>            
          <div class='p-2 bd-highlight'>{$row['name']}</div>
          <div class='p-2 bd-highlight'>{$row['need']}</div>
          <div class='p-2 bd-highlight'>{$row['contacts']}</div>
          <div class='p-2 bd-highlight'>{$row['status']}</div>
          <div class='p-2 bd-highlight'>{$row['comments']}</div>
          </div>";
    }
  }

  else {
    echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
      Nie znaleziono żadnego rekordu.
      </div>";
  }

  $conn->close();
?> 


</main>


  <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>