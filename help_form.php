<!DOCTYPE HTML>

<html>

<head>
  <meta charset="utf-8">
  <meta lang="pl">
  <title>Form</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style_s.css" rel="stylesheet">
</head>


<body>

<header>
  
</header>


<main>

    <form class="add-form" action="add_script.php">

    <div class="mb-3">
      <h1 class="h3 mb-3 fw-normal">Add new</h1>
    </div>

    <div class="mb-3">
      <label class="form-label" for="date">Date</label>
      <input type="date" class="form-control" name="date" id="date" required>
    </div>


    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>


    <div class="mb-3">
      <label class="form-label" for="need">Need</label>
      <textarea class="form-control" aria-label="With textarea" name="need" id="need"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label" for="contacts">Contacts</label>
      <input type="text" class="form-control" name="contacts" id="contacts" required>
    </div>


    <div class="mb-3">
      <label class="form-label" for="status">status</label>
      <input type="checkbox"  name="status" id="status" value="1">
    </div>

    <div class="mb-3">
      <label class="form-label" for="comments">comments</label>
      <textarea class="form-control" aria-label="With textarea" name="comments" id="comments"></textarea>
    </div>

    <button class=" btn btn-lg btn-primary" type="submit">Dodaj</button>

  </form>

  </main>

</main>


<footer>
  
</footer>

</body>
</html>
