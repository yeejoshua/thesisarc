<?php

include 'config.php';
session_start();
$user_role = $_SESSION['role'];

if(!isset($user_role)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThesisArc</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="newstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="banner">
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand me-auto" href="index.php">ThesisArc</a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ThesisArc</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="browse.php">Browse</a>
          </li>
        </ul>
      </div>
    </div>
    <a href="logout.php" class="login-button">Logout</a>
    <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>  
<section class="hero-section">
<div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Welcome to ThesisArc: A Web-based Thesis Library Database Management</h1>
</div>
</section>      
<div class="content">
    <div class="row">
  <!-- <div class="column side">
    <h2>Side</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
  </div> -->
  
  <div class="column middle">
    <br>
    <h2>Browse Research and Scholarship</h2>
        <section class="index-category">
        <a href="theses.php" class="index-category-box">
        <h3>Theses and Dissertations</h3>
        </a>
        <a href="facultyresearch.php"class="index-category-box">
        <h3>Faculty Research and Creative Works</h3>
        </a>
        <a href="archival.php"class="index-category-box">
        <h3>Archival and Special Collections</h3>
        </a>
        <a href="collections.php"class="index-category-box">
        <h3>All Collections</h3>
        </a>
        <a href="guides.php"class="index-category-box">
        <h3>Research Guides</h3>
        </a>
        </section>
  </div>
  
  <!-- <div class="column side">
    <h2>Search</h2>
    <form method="post">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search">
    </form>
    <br>
    <br>
    <h2>Most Viewed Research</h2>
    <p>Thesis Library Database Management</p>
  </div> -->
</div>
</div>
  
    
            
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
</body>
</html>