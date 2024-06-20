<?php
session_start();
require 'config.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="newstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Thesis Edit</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    
</head>
<body>
<div class="banner">
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand me-auto" href="indexadmin.php">ThesisArc</a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ThesisArc</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" aria-current="page" href="indexadmin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="browseadmin.php">Browse</a>
          </li>
          <div class="dropdown mt-0">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="addthesis.php">Add Thesis</a></li>
      <li><a class="dropdown-item" href="addfaculty.php">Add Faculty Work</a></li>
      <li><a class="dropdown-item" href="addcollection.php">Add Special Collection</a></li>
      <li><a class="dropdown-item" href="adminpanel.php">Users</a></li>
    </ul>
        </li>
        </ul>
      </div>
      </div>
    </div>
    <a href="logout.php" class="login-button">Logout</a>
    <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
<div class="content">
    <div class="row"> 
    <div class="column middle">
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
        <div class="card">
    <div class="card-header border-0">
        <h4 class="card-title">Edit Thesis</h4>
    </div>
    <div class="card-body">
        <?php
        if(isset($_GET['id'])) {
            $theses_id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM theses WHERE id='$theses_id'";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0) {
                $theses = mysqli_fetch_array($query_run);
                ?>
                <form action="code.php" method="POST">
                    <input type="hidden" name="id" value="<?= $theses['id']; ?>">

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="<?=$theses['title'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Researcher/s</label>
                        <input type="text" name="author" value="<?=$theses['author'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Adviser</label>
                        <input type="text" name="adviser" value="<?=$theses['adviser'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>College</label>
                        <input type="text" name="college" value="<?=$theses['college'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Course</label>
                        <input type="text" name="course" value="<?=$theses['course'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Abstract</label>
                        <textarea name="abstract" class="form-control"><?=$theses['abstract'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" value="<?=$theses['date'];?>" class="form-control">
                    </div>
                    <button type="submit" name="update_thesis" class="btn btn-primary">
                        Update Thesis
                    </button>
                </form>
                <?php
            } else {
                echo "<h4>No Such Id Found</h4>";
            }
        }
        ?>
    </div>
</div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>