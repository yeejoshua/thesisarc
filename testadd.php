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
?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Thesis</title>
    <link rel="stylesheet" href="newstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <!-- Your HTML code here -->
    <div class="banner">
        <!-- Your banner code here -->
    </div>
    <div class="content">
        <div class="row">
            <div class="column middle">
                <div class="main">
                    <form method="post" enctype="multipart/form-data">
                        <!-- Your form fields here -->
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- JavaScript for alert -->
    <script>
        // Check if the URL contains a success message
        const urlParams = new URLSearchParams(window.location.search);
        const successMessage = urlParams.get('success');
        
        // If there's a success message, show it in an alert
        if (successMessage === 'true') {
            alert('Thesis registered successfully!');
        }
    </script>
</body>
</html>
