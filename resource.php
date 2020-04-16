<?php
require("mysql.php");
$id = $_GET['id'];
$statement = $pdo->prepare("SELECT * FROM resources");
$statement->execute();
while($row = $statement->fetch()) {
    $name = $row['username'];
    $author = $row['author'];
    $description = $row['rdescription'];
    $shortdesc = $row['shortdescription'];
    $href = $row['href'];
    $pic = $row['pic'];
    $price = $row['price'];
    $date = $row['uploaded'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LibSubmit - Browse</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style>
    .footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      /*height: 60px;*/ /* Set the fixed height of the footer here */
      /*line-height: 60px;*/ /* Vertically center the text there */
      background-color: #f5f5f5;
    }
    </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="./">LibSubmit</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="browse.php">Stöbern</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#">Anmelden</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.html">Registrieren</a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>

<div class="container"><center><p>
<div class="card" style="width: 18rem;">
  <img src="<?php echo $pic; ?>" class="card-img-top" alt="picture">
  <div class="card-body">
    <h5 class="card-title"><?php echo $name .' - '.$author; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $shortdesc; ?></h6>
    <p class="card-text"><?php echo $description .'<br>'.$date; ?></p>
    <a href="download.php?id=<?php echo $id ?>" class="btn btn-success">Download</a>
  </div></center>
</div>
</div>