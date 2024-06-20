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
        </ul>
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
            <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <h4>User Add 
                            <a href="adminpanel.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label">First Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label">Last Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label">Email</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" name="save_user" class="btn btn-primary">Save User</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                </div>
            </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
