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
$sql = "SELECT * FROM collection";
$result = mysqli_query($conn, $sql);

// Check for query execution and result
if (!$result) {
    die('Error fetching data: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theses Library</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="newstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom CSS for Content Section */
        .content {
            padding-top: 500px; /* Ensure content is below the navbar */
            padding-bottom: 50px;
            background-color: #f8f9fa; /* Light gray background */
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
            <a class="nav-link mx-lg-2" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="browse.php">Browse</a>
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
                        <h3>Archival and Special Collections</h3>
                        <section class="index-category">
                            <?php
                                // Check if there are results
                                if (mysqli_num_rows($result) > 0) {
                                    // Output table header
                                    echo "<table class='table'>";
                                    echo "<tbody>";
                                    // Output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        // Display faculty work information in table rows with preview links
                                        echo "<tr>";
                                        // Add preview of the file if it's an image
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
