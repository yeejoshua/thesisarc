<?php 
    include 'config.php';
    session_start(); 

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['role'])){
        header('location:login.php');
        exit();
    }
  // Fetch faculty works from database
$sql_faculty = "SELECT * FROM faculty";
$result_faculty = mysqli_query($conn, $sql_faculty);

// Check for query execution and result
if (!$result_faculty) {
    die('Error fetching faculty data: ' . mysqli_error($conn));
}

// Fetch special archive collection from database
$sql_collection = "SELECT * FROM collection";
$result_collection = mysqli_query($conn, $sql_collection);

// Check for query execution and result
if (!$result_collection) {
    die('Error fetching collection data: ' . mysqli_error($conn));
}  
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theses Library</title>
    <link rel="stylesheet" href="newstyle.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .content {
            padding-top: 80px;
            padding-bottom: 50px;
            background-color: #f8f9fa;
        }

        .content h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #dc3545;
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
            color: #0056b3;
        }

        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 50%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }
        .collapsible:after {
        content: '\02795'; /* Unicode character for "plus" sign (+) */
        font-size: 13px;
        color: white;
        float: right;
        margin-left: 5px;
        }
        .collapsible.active:after {
        content: "\2796"; /* Unicode character for "minus" sign (-) */
        }

        .active, .collapsible:hover {
            background-color: #555;
        }

        .collapsible-content {
            display: none;
            padding: 0 18px;
            overflow: hidden;
            background-color: #f1f1f1;
        }
        .file-preview {
            width: 20%;
            height: auto;
        }

        .file-preview img {
            width: 10px;
            height: auto;
            display: block;
            margin: auto; /* Center align the image */
        }
        /* Custom CSS for active navigation link */
        .nav-link.active {
            color: #dc3545; /* Red color for active link */
            background-color: transparent; /* Ensure background is transparent */
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
                        <h3>All Collections</h3>
                        <button type="button" class="collapsible">Theses and Dissertations</button>
                        <div class="collapsible-content">
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
                        <button type="button" class="collapsible">Faculty Research and Creative Works</button>
                        <div class="collapsible-content">
                            <h3>Faculty Research and Creative Works</h3>
                            <section class="index-category">
                                <?php
                                if (isset($result_faculty) && mysqli_num_rows($result_faculty) > 0) {
                                    echo "<table class='table'>";
                                    echo "<thead><tr><th>Title</th><th>Author</th><th>Department/Unit</th><th>Date</th> </tr></thead>";
                                    echo "<tbody>";
                                    while ($row = mysqli_fetch_assoc($result_faculty)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["author"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["college"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["date"]) . "</td>";
                                        

                                        echo "</tr>";
                                    }
                                    echo "</tbody></table>";
                                } else {
                                    echo "<p>No faculty work found.</p>";
                                }
                                ?>
                            </section>
                        </div>
                        <button type="button" class="collapsible">Special Archive and Collection</button>
                        <div class="collapsible-content">
                            <h3>Special Archive and Collection</h3>
                            <section class="index-category">
                                <?php
                                if (isset($result_collection) && mysqli_num_rows($result_collection) > 0) {
                                    echo "<table class='table'>";
                                    echo "<tbody>";
                                    while ($row = mysqli_fetch_assoc($result_collection)) {
                                        echo "<tr>";
                                        $file_extension = strtolower(pathinfo($row['content'], PATHINFO_EXTENSION));
                                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                            echo "<td><img src='uploads/" . htmlspecialchars($row['content']) . "' class='file-preview' alt='Preview'></td>";
                                        } else {
                                            echo "<td>No preview available</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    echo "</tbody></table>";
                                } else {
                                    echo "<p>No collection found.</p>";
                                }
                                ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var coll = document.getElementsByClassName("collapsible");
    for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
