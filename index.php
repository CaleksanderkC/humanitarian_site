<!DOCTYPE HTML>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Zmien</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>

<?php include 'header.php';?>


<main class="container mt-2">
  <?php

    include 'connection_data.php';
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM `help_ukr` ORDER BY `status`;";

    if (isset($_REQUEST['search']) && $_REQUEST['search'] != '') {

        $search = $_REQUEST['search'];

        $sql = "SELECT * FROM `help_ukr`
          WHERE name LIKE '%{$search}%'
          OR need Like '%{$search}%'
          OR contacts Like '%{$search}%'
          ORDER BY `status`;";
    }


    $result = $conn->query($sql);

    echo " <div class='row align-items-md-stretch'> ";
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        $color = ($row['status'] == '0') ? 'bd-highlight' : 'bg-secondary text-white';

        $href_id = 'help_info.php?' . $row["id"];


        echo "
          <div class='col-md-4 mt-3'>
            <div class='h-100 text-dark bg-light rounded-3'>
              <div  class='d-flex flex-column'>

                <a href='$href_id' class='link-dark t-d-n'>

                  <div class='p-2 align-items-start justify-content-around'>
                    {$row['date']}
                  </div>
                  <div class='p-2'>{$row['need']}</div>
                  <div class='p-2 align-items-end t-a-c text-white bg-secondary bg-gradient'>{$row['name']}</div>

                </a>

              </div>
            </div>
          </div>
        ";

      }
    }

    else {
      echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
          Nie znaleziono żadnego rekordu.
        </div>";
    }

    echo "</div>";

    $conn->close();
  ?>

</main>


<?php include 'footer.php';?>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>