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
    html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  height: 3.125rem;
  padding: .75rem;
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  pointer-events: none;
  cursor: text; /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */
@supports (-ms-ime-align: auto) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
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

<div class="container">
<form name="uploadformular" class="form-signin" action="uploaded.php" method="post" enctype="multipart/form-data">
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Upload</h1>
    <p>Lade eine <code>API/LIB</code> hoch!</p>
  </div>

  <div class="form-label-group">
    <input type="text" name="name" id="name" class="form-control" placeholder="APIname" required autofocus>
    <label for="name">Name der API</label>
  </div>

  <div class="form-label-group">
    <input type="text" name="author" id="author" class="form-control" placeholder="author" required>
    <label for="author">Autor</label>
  </div>
    <div class="form-label-group">
        <input type="text" name="short-description" id="short-description" class="form-control" placeholder="Kurzbeschreibung" required>
        <label for="short-description">Kurzbeschreibung</label>
    </div>
    <div class="form-label-group">
      <textarea name="description" name="description" class="form-control" style="resize: none;" rows="10" cols=30 placeholder="Beschreibung" required></textarea>
    </div>
    <input type="file" name="uploaddatei">
    <input type="file" name="uploaddatei2">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Hochladen</button>
</div>