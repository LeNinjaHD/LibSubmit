<?php
require('mysql.php');
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
          <li class="nav-item">
            <a class="nav-link" href="upload.php">Hochladen</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="register.html">Registrieren</a>
          </li>-->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Browse - PHP</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Java</a>
          <a href="#" class="list-group-item">PHP</a>
          <a href="#" class="list-group-item">Other</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="900x350.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="900x350.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="900x350.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
        <?php
        $statement = $pdo->prepare("SELECT * FROM resources");
        $statement->execute();
        while($row = $statement->fetch()) {
          $price = $row['price'];
          if($price == 0) {
            $price = "FREE";
          } else {
            $price = $price ."€";
          }
          $link = 'download.php?id='.$row["id"];
          echo '<div class="col-lg-4 col-md-6 mb-4">';
          echo '<div class="card h-100">';
          echo '<a href="download.php?id='.$row["id"].'"><img class="card-img-top" src="'.$row['pic'] .'" alt=""></a>';
          echo '<div class="card-body"><h4 class="card-title">';
          echo '<a href="resource.php?id='.$row["id"] .'">'.$row["username"] .'</a></h4>';
          echo '<h5>'.$row["author"] .'</h5>';
          echo '<p class="card-text">'.$row["shortdescription"] .'</p>';
          echo '</div><div class="card-footer"><small class="text-muted">';
          echo '<h6>'.$price .'</h6>';
          echo '</small></div></div></div>';
          echo '<div class="modal fade" id="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">';
          echo '<div class="modal-dialog" role="document">';
          echo '<div class="modal-content"><div class="modal-header">';
          echo '<h5 class="modal-title" id="staticBackdropLabel">'.$row["username"] .' - '.$row["author"] .'</h5>';
          echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">';
          echo $row["rdescription"];
          echo '</div><div class="modal-footer"><a href="download.php?id='.$row["id"].'"><button type="submit" class="btn btn-success">Download</button></a><button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button></div></div></div></div>';
        }
        ?>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark footer">
    <div class="container">
      <p class="m-0 text-white">Copyright &copy; LeNinjaHD 2020</p><!--text-center-->
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
/*require("mysql.php");
$id = $_GET["id"];

$statement = $pdo->prepare("SELECT * FROM resources WHERE id = ?");
$statement->execute(array($id));
while($row = $statement->fetch()) {
    echo $row['name']." - ".$row['author']."<br />";
    echo "Beschreibung: ".$row['description']."<br /><br />";
 }*/
?>