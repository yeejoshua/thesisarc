<?php
include 'config.php';

if(isset($_POST['submit'])){
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $pass = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    // $image = $_FILES['image']['name'];
    // $image_size = $_FILES['image']['size'];
    // $image_tmp_name = $_FILES['image']['tmp_name'];
    // $image_folder = 'uploaded_img/'.$image;

    $select = mysqli_query($conn, "SELECT * FROM `user_acc` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $message[]= 'User Already Exist';
    }else{
        if($password != $cpassword){
            $message[] = 'Confirm password did not match';
        // }elseif($image_size > 2000000){
        //     $message[] = 'image size is too large!';
        }else{
            $insert = mysqli_query($conn, "INSERT INTO `user_acc`(first_name, last_name, username, email, password) VALUES('$first_name', '$last_name', '$username', '$email', '$pass')") or die('query failed');
            // if($insert){
            //     move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'registered successfully!';
                header('location:login.php');
            //  }else{
            //     $message[] = 'registration failed!';
            //  }
        }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="newstyle.css">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand me-auto" href="#">ThesisArc</a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ThesisArc</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2"  href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="#">Browse</a>
          </li>
        </ul>
      </div>
    </div>
    <a href="login.php" class="login-button">Login</a>
    <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav> 
    <div class="center">
        <h1>Sign Up</h1>
        <form method="post" enctype="multipart/form-data">
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class"message">'.$message.'</div>';
                }
            }
            ?>
            <div class="text_field">
                <input type="text" name="first_name" required>
                <span></span>
                <label>First Name</label>
            </div>
            <div class="text_field">
                <input type="text" name="last_name" required>
                <span></span>
                <label>Last Name</label>
            </div>
            <div class="text_field">
                <input type="email" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="text_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="text_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="text_field">
                <input type="password" name="cpassword" required>
                <span></span>
                <label>Confirm Password</label>
            </div>
            <!-- <div class="text_field">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            </div> -->
            <input type="submit" name="submit" value="Register">
        </form>
        <div class="signup_link">
               
            </div>
    </div>
</body>
</html>