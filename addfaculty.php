<?php
include 'config.php';

if(isset($_POST['submit'])){

    $title = mysqli_real_escape_string($conn, $_POST["title"]);   
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $college = mysqli_real_escape_string($conn, $_POST["college"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $filename = $_FILES['file']['name'];
        $folder_path = $targetDir;
        $time_stamp = date('Y-m-d H:i:s');
        
        $insert = mysqli_query($conn, "INSERT INTO `faculty` (title, author, college, date, content) VALUES ('$title', '$author', '$college', '$date', '$filename')") or die('query failed');
        
        if($insert) {
            header("Location: addfaculty.php?success=true");
            exit();
        } else {
            $error_message = "Failed to insert data into database.";
        }
    } else {
        $error_message = "Failed to upload file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty Work</title>
    <link rel="stylesheet" href="newstyle.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        input[type=text], select, input[type=date], input[type=textarea] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            position: relative;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            position: relative;
        }
        input[type=submit]:hover {
            background-color: #45a049;
            position: relative;
        }
        .main {
            display: relative;
            padding-left: 35%;
            justify-content: space-around; 
            margin-top: 2%; 
            position: relative;
            width: 70%;
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="addthesis.php">Add Thesis</a></li>
                                    <li><a class="dropdown-item" href="addfaculty.php">Add Faculty Work</a></li>
                                    <li><a class="dropdown-item" href="addspecialcollection.php">Add Special Collection</a></li>
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
                    <div class="main">
                        <form method="post" enctype="multipart/form-data">
                            <h4>Add Faculty Work</h4>
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Title">
                            <label for="author">Author</label>
                            <input type="text" id="author" name="author" placeholder="Author">
                            <label for="college">Department/Unit</label>
                            <input type="text" id="college" name="college" placeholder="Department/Unit">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date">
                            <label for="file">File</label>
                            <input type="file" id="file" class="form-control-file" name="file" accept=".doc, .docx, .pdf, .jpg, .jpeg, .png">
                            <input type="submit" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none; position: fixed; top: 0; left: 50%; transform: translateX(-50%); z-index: 9999;">
            Faculty work added successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div id="errorMessage" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: <?php echo isset($error_message) ? 'block' : 'none'; ?>; position: fixed; top: 0; left: 50%; transform: translateX(-50%); z-index: 9999;">
            <?php echo $error_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <script>
        // Function to close the success message
        function closeSuccessMessage() {
            document.getElementById('successMessage').style.display = 'none';
        }

        // Check if the URL contains a success message
        const urlParams = new URLSearchParams(window.location.search);
        const successMessage = urlParams.get('success');

        // If there's a success message, show it
        if (successMessage === 'true') {
            document.getElementById('successMessage').style.display = 'block';
        }
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
