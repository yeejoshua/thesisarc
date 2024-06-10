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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theses Library</title>
    <link rel="stylesheet" href="newstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom CSS for Content Section */
        .content {
            padding-top: 80px; /* Ensure content is below the navbar */
            padding-bottom: 50px;
            background-color: #f8f9fa; /* Light gray background */
        }

        .content h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #dc3545; /* Red color for headings */
        }

        .content ul {
            list-style-type: none;
            padding-left: 0;
        }

        .content ul li {
            margin-bottom: 5px;
        }

        .content ul li a {
            color: black;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .content ul li a:hover {
            color: #0056b3; /* Darker blue on hover */
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
                            <a class="nav-link active" aria-current="page" href="indexadmin.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="browseadmin.php">Browse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="addthesis.php">Manage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="adminpanel.php">Admin</a>
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
    <div class="content">
        <div class="row">
            <div class="column middle">
                <div class="w3-row w3-padding-64">
                    <div class="w3-twothird w3-container">
                        <!-- Content Goes Here -->
                    </div>
                    <h3>College of Arts and Sciences</h3>
                    <ul>
                        <li><a href="broadcasting.php">Broadcasting</a></li>
                        <li><a href="comm.php">Communication</a></li>
                        <li><a href="journalism.php">Journalism</a></li>
                        <li><a href="lm.php">Legal Management</a></li>
                        <li><a href="mma.php">Multimedia Arts</a></li>
                        <li><a href="psychology.php">Major in Psychology</a></li>
                        <li><a href="es.php">Environmental Science and Sustainability</a></li>
                    </ul>
                    <h3>College of Business Administration</h3>
                    <ul>
                        <li><a href="accountancy.php">Accountancy</a></li>
                        <li><a href="ba.php">Business Administration</a></li>
                        <li><a href="ca.php">Customs Administration</a></li>
                        <li><a href="ma.php">Management Accounting</a></li>
                    </ul>
                    <h3>College of International Tourism and Hospitality Management</h3>
                    <ul>
                        <li><a href="fs.php">Foreign Service</a></li>
                    </ul>
                    <h3>College of Technology</h3>
                    <ul>
                        <li><a href="cs.php">Computer Science</a></li>
                        <li><a href="it.php">Information Technology</a></li>
                        <li><a href="esports.php">Esports</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
