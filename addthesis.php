<?php
include 'config.php';

if(isset($_POST['submit'])){

    $title = mysqli_real_escape_string($conn, $_POST["title"]);   
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $college = mysqli_real_escape_string($conn, $_POST["college"]);
    $course = mysqli_real_escape_string($conn, $_POST["course"]);
    $abstract = mysqli_real_escape_string($conn, $_POST["abstract"]);
    $adviser = mysqli_real_escape_string($conn, $_POST["adviser"]);
    $date = mysqli_real_escape_string($conn,$_POST["date"]);
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
      $filename = $_FILES['file']['name'];
      $folder_path = $targetDir;
      $time_stamp = date ('Y-m-d H:i:s');
    }
 
    $insert = mysqli_query($conn, "INSERT INTO `theses`(title, author, college, course, abstract, adviser, date, content) VALUES('$title','$author','$college', '$course', '$abstract', '$adviser', '$date', '$filename')") or die('query failed');
    if($insert){

      header("Location: addthesis.php?success=true");
      exit();
  
}
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Thesis</title>
    <link rel="stylesheet" href="newstyle.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    position: relative;
 
  }
    input[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    position: relative;
    
  }
    input[type=textarea] {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc; 
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
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
            <a class="nav-link mx-lg-2"  href="indexadmin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="browseadmin.php">Browse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="addthesis.php">Manage</a>
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
  <!-- <div class="column side">
    <h2>Side</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
  </div> -->
  
  <div class="column middle">
    <div class="main">
    <form method="post" enctype="multipart/form-data">
    <h4>Add Thesis</h4>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Thesis Title">
    <label for="author">Name of Researchers</label>
    <input type="text" id="author" name="author" placeholder="Name of Researchers">
    <label for="college">College</label>
    <select id="college" name="college" placeholder="Select College">
      <option value="College of Arts and Sciences">College of Arts and Sciences</option>
      <option value="College of Business Administration">College of Business Administration</option>
      <option value="College of International Relations">College of International Relations</option>
      <option value="College of International Tourism and Hospitality Management">College of International Tourism and Hospitality Management</option>
      <option value="College of Technology">College of Technology</option>
    </select>
    <label for="course">Course</label>
    <select id="course" name="course" placeholder="Select Course">
      <option value="AB Broadcasting">AB Broadcasting</option>
      <option value="AB Communication">AB Communication</option>
      <option value="AB Journalism">AB Journalism</option>
      <option value="AB Legal Management">AB Legal Management</option>
      <option value="AB Multimedia Arts">AB Multimedia Arts</option>
      <option value="BS Major in Psychology">BS Major in Psychology</option>
      <option value="BS Environmental Science and Sustainability">BS Environmental Science and Sustainability</option>
      <option value="BS Accountancy">BS Accountancy </option>
      <option value="BS Business Administration ">BS Business Administration</option>
      <option value="BS Customs Administration">BS Customs Administration</option>
      <option value="BS Management Accounting">BS Management Accounting</option>
      <option value="AB Foreign Service">AB Foreign Service</option>
      <option value="BS International Hospitality Management">BS International Hospitality Management</option>
      <option value="BS International Tourism Management ">BS International Tourism Management </option>
      <option value="BS Information Technology">BS Information Technology</option>
      <option value="BS Computer Science">BS Computer Science</option>
      <option value="BS Accountancy">BS Accountancy</option>
      <option value="BS Esports">BS Esports</option>
    </select>
    <label for="abstract">Abstract</label>
    <input type="textarea" id="abstract" name="abstract" placeholder="Abstract">
    <label for="adviser">Adviser</label>
    <input type="text" id="adviser" name="adviser" placeholder="Adviser">
    <label for="date">Date</label>
    <input type="date" id="date" name="date" placeholder="date">
    <label for="content">File</label>
    <input type="file" id="content" class="form-control-file" name="file" accept=".doc, .docx, .pdf">
    <input type="submit" name="submit" value="Submit">
       </form>
</div>
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
</div>
    <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none; position: fixed; top: 0; left: 50%; transform: translateX(-50%); z-index: 9999;">
    Thesis added successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>