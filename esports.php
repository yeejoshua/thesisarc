<?php
    include 'config.php';
    session_start(); 
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['role'];

    if(!isset($role)){
        header('location:login.php');
    }
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to retrieve theses where course is AB Broadcasting
    $sql = "SELECT title, author, adviser, college, course, date,content, id FROM theses WHERE course = 'BS Esports'";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThesisArc</title>
    <link rel="stylesheet" href="newstyle.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
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
    </div>

    <section class="hero-section">
        <!-- Hero section content -->
    </section>

    <div class="content">
        <div class="row">
            <div class="column middle">
                <h2>BS Esports</h2>
                <section class="index-category">
                    <?php
                        // Check if there are results
                        if ($result->num_rows > 0) {
                            // Output table header
                            echo "<table class='table'>";
                            echo "<thead><tr><th>Title</th><th>Author</th><th>Adviser</th><th>College</th><th>Course</th><th>Date</th></th><th>File</th></tr></thead>";
                            echo "<tbody>";
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                // Display thesis information in table rows
                                echo "<tr><td>" . $row["title"] . "</td><td>" . $row["author"] . "</td><td>" . $row["adviser"] . "</td><td>" . $row["college"] . "</td><td>" . $row["course"] . "</td><td>" . $row["date"] . "</td><td><a href='uploads/" . htmlspecialchars($row['content']) . " class='btn btn-primary btn-sm'>View</a></td><td><a href='thesis-view.php?id=" . htmlspecialchars($row['id']) . " class='btn btn-info btn-sm'>Details</a></td></tr>";
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "No theses found for the course 'BS Esports'.";
                        }
                    ?>
                </section>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
