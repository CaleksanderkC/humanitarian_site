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
    // $servername = "sql108.epizy.com";
    // $username = "epiz_31203125";
    // $password = "8U9NKPeF98aB2V";
    // $dbname = "epiz_31203125_help_db";


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "help_db";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }else {

      echo "
      <div class=' table-list d-flex flex-row bd-highlight mb-3 justify-content-sm-between bg-dark text-light'>
          <div class='p-2 bd-highlight w5p' >id</div>
          <div class='p-2 bd-highlight w15p'>date</div>
          <div class='p-2 bd-highlight w15p'>name</div>
          <div class='p-2 bd-highlight w25p'>need</div>
          <div class='p-2 bd-highlight w15p'>contacts</div>
          <div class='p-2 bd-highlight w15p'>comments</div>
      </div>";
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

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        $color = ($row['status'] == '0') ? 'bd-highlight' : 'bg-secondary text-white';

        $href_id = 'help_info.php?' . $row["id"];

        echo "
          <a href='$href_id' class=' d-flex flex-row $color  mb-3 justify-content-sm-between table-list list-group-item list-group-item-action'>
            <div class='p-2 w5p '>{$row['id']}</div>
            <div class='p-2 w15p'>{$row['date']}</div>            
            <div class='p-2 w15p'>{$row['name']}</div>
            <div class='p-2 w25p'>{$row['need']}</div>
            <div class='p-2 w15p'>{$row['contacts']}</div>
            <div class='p-2 w15p'>{$row['comments']}</div>
          </a>";
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

<!--     <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Custom jumbotron</h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <button class="btn btn-primary btn-lg" type="button">Example button</button>
      </div>
    </div> -->

<!--     <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Change the background</h2>
          <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
      </div>

      
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Add borders</h2>
          <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
          <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
      </div>
      
    </div> -->


</main>


<?php include 'footer.php';?>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>