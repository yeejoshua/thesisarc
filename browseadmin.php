<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theses Library</title>
    <link rel="stylesheet" href="newstyle.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <a class="nav-link active" aria-current="page" href="browseadmin.php">Browse</a>
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
        <br>
            <h2>Advanced Search</h2>
            <div class="browse-container">
                <div class="main">
                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="search_bar">
                                <form action="" method="GET">
                                    <input type="text" name="search" value="<?php if(isset($_GET['search'])) { echo htmlspecialchars($_GET['search']); } ?>" class="form-control" placeholder="Search">
                                </form>
                            </div>
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" min="2000" max="2050" name="from_year" value="<?= isset($_GET['from_year']) ? htmlspecialchars($_GET['from_year']) : '' ?>" class="form-control" placeholder="From Year">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" min="2001" max="2050"name="to_year" value="<?= isset($_GET['to_year']) ? htmlspecialchars($_GET['to_year']) : '' ?>" class="form-control" placeholder="To Year">
                                        </div>
                                        <div class="col-md-4">
                                            <select name="college" class="form-select">
                                                <option value="">Select Department</option>
                                                <option value="College of Arts and Sciences" <?= (isset($_GET['college']) && $_GET['college'] == 'College of Arts and Sciences') ? 'selected' : '' ?>>College of Arts and Sciences</option>
                                                <option value="College of Business Administration" <?= (isset($_GET['college']) && $_GET['college'] == 'College of Business Administration') ? 'selected' : '' ?>>College of Business Administration</option>
                                                <option value="College of Internal Relations" <?= (isset($_GET['college']) && $_GET['college'] == 'College of Internal Relations') ? 'selected' : '' ?>>College of Internal Relations</option>
                                                <option value="College of Internal Tourism and Hospitality Management" <?= (isset($_GET['college']) && $_GET['college'] == 'College of Internal Tourism and Hospitality Management') ? 'selected' : '' ?>>College of Internal Tourism and Hospitality Management</option>
                                                <option value="College of Technology" <?= (isset($_GET['college']) && $_GET['college'] == 'College of Technology') ? 'selected' : '' ?>>College of Technology</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="course" class="form-select">
                                                <option value="">Select Course</option>
                                                <option value="AB Broadcasting" <?= (isset($_GET['course']) && $_GET['course'] == 'AB Broadcasting') ? 'selected' : '' ?>>AB Broadcasting</option>
                                                <option value="BS Accountancy" <?= (isset($_GET['course']) && $_GET['course'] == 'BS Accountancy') ? 'selected' : '' ?>>BS Accountancy</option>
                                                <option value="BS Information Technology" <?= (isset($_GET['course']) && $_GET['course'] == 'BS Information Technology') ? 'selected' : '' ?>>BS Information Technology</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                            <a href="browseadmin.php" class="btn btn-danger">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Adviser</th>
                                            <th>Department</th>
                                            <th>Course</th>
                                            <th>Date</th>
                                            <th>View</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $con = mysqli_connect("localhost", "root", "", "capstone");

                                        if (!$con) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }

                                        $query = "SELECT * FROM theses WHERE 1=1";
                                        
                                        if (isset($_GET['search']) && !empty($_GET['search'])) {
                                            $search = mysqli_real_escape_string($con, $_GET['search']);
                                            $query .= " AND CONCAT(title, date, author) LIKE '%$search%'";
                                        }

                                        if (isset($_GET['from_year']) && !empty($_GET['from_year']) && isset($_GET['to_year']) && !empty($_GET['to_year'])) {
                                            $from_year = mysqli_real_escape_string($con, $_GET['from_year']);
                                            $to_year = mysqli_real_escape_string($con, $_GET['to_year']);
                                            $query .= " AND YEAR(date) BETWEEN '$from_year' AND '$to_year'";
                                        }

                                        if (isset($_GET['college']) && !empty($_GET['college'])) {
                                            $college = mysqli_real_escape_string($con, $_GET['college']);
                                            $query .= " AND college = '$college'";
                                        }

                                        if (isset($_GET['course']) && !empty($_GET['course'])) {
                                            $course = mysqli_real_escape_string($con, $_GET['course']);
                                            $query .= " AND course = '$course'";
                                        }

                                        $query_run = mysqli_query($con, $query);

                                        if ($query_run) {
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($row['title']) ?></td>
                                                        <td><?= htmlspecialchars($row['author']) ?></td>
                                                        <td><?= htmlspecialchars($row['adviser']) ?></td>
                                                        <td><?= htmlspecialchars($row['college']) ?></td>
                                                        <td><?= htmlspecialchars($row['course']) ?></td>
                                                        <td><?= htmlspecialchars($row['date']) ?></td>
                                                        <td><a href='uploads/<?= htmlspecialchars($row['content']) ?>' class="btn btn-primary btn-sm">View</a></td>
                                                        <td>
                                                            <a href="thesis-view.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-info btn-sm">Details</a>
                                                            <a href="thesis-edit.php?id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="post" class="d-inline">
                                                                <button type="submit" name="delete_thesis" value="<?= htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="8">No Results Found</td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="8">Query Error: <?= mysqli_error($con) ?></td>
                                            </tr>
                                            <?php
                                        }

                                        mysqli_close($con);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
