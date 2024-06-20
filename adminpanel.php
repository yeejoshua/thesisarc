<?php 
        include 'config.php';
        session_start(); 
        $user_id = $_SESSION['user_id'];
        $role = $_SESSION['role'];

        if(!isset($role)){
            header('location:login.php');
        };
        
        // if(!isset($user_id)){
        //     header('location:index.php');
        // }
 ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theses Library</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="newstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  .btn.btn-primary.float-end {
    margin-right: 7%;
  }
  .login-button {
    position: absolute;
    right: 20px;
        }
</style>
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
            <a class="nav-link mx-lg-2" href="indexadmin.php">Home</a>
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
      <li><a class="dropdown-item" href="addthesis.php">Add Faculty Work</a></li>
      <li><a class="dropdown-item" href="addthesis.php">Add Special Collection</a></li>
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
<!-- <section class="hero-section">
<div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Welcome to ThesisArc: A Web-based Thesis Library Database Management</h1>
</div>
</section>       -->
<div class="content">
    <div class="row">
  <!-- <div class="column side">
    <h2>Side</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
  </div> -->
  
  <div class="column middle">
  <div class="container">
<div class="main">
<div class="col-md-12">
    <div class="card mt-4">
    <div class="card-header-float-left">
      <br>
      <br>
                        <h4>Users
                            <a href="user-create.php" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
        <div class="search_bar">
            <form action="" method="GET">
                <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search">
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $con= mysqli_connect("localhost", "root","","capstone");

                        // if(isset($_GET['search']))
                        // {
                        //     $filtervalues = $_GET['search'];
                        //     $query = "SELECT * FROM user_acc WHERE CONCAT(first_name,last_name,username,email) LIKE '%$filtervalues%'";
                        //     $query_run = mysqli_query($con,$query);

                        //     if(mysqli_num_rows($query_run) > 0)
                        //     {
                        //         foreach($query_run as $user)
                        //         {
                            $query = "SELECT * FROM user_acc";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $user)
                                {
                                    ?>
                      <tr>                            
                                <td><?= $user['first_name']?></td>
                                <td><?= $user['last_name'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <a href="user-view.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="user-edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <form action="code.php" method="post" class="d-inline">
                                    <button type="submit" name="delete_user" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                        <tr>
                        <td colspan="4">No Results Found</td>
                        </tr>
                                <?php
                            }
                        // }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
  </div>
  
  <!-- <div class="column side"> -->
    <!-- <h2>Search</h2>
    <form method="post">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search">
    </form>
    <br>
    <br> -->
    <!-- <h2>Most Viewed Research</h2>
    <p>Thesis Library Database Management</p> -->
  <!-- </div> -->
</div>
</div>
  
    
            
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
</body>
</html>