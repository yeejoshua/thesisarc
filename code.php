<?php
session_start();
require 'config.php';

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM user_acc WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: adminpanel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: adminpanel.php");
        exit(0);
    }
}
if(isset($_POST['delete_thesis']))
{
    $theses_id = mysqli_real_escape_string($con, $_POST['delete_thesis']);

    $query = "DELETE FROM theses WHERE id='$theses_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: browseadmin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: browseadmin.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['id']);

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "UPDATE user_acc SET first_name= '$first_name', last_name='$last_name', username='$username', email='$email' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: adminpanel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: adminpanel.php");
        exit(0);
    }
}
if(isset($_POST['update_thesis']))
{
    $theses_id = mysqli_real_escape_string($con, $_POST['id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $college = mysqli_real_escape_string($con, $_POST['college']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $abstract = mysqli_real_escape_string($con, $_POST['abstract']);
    $adviser = mysqli_real_escape_string($con, $_POST['adviser']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    $query = "UPDATE theses SET title= '$title', author='$author', college='$college', course='$course', abstract='$abstract', adviser='$adviser', date='$date' WHERE id='$theses_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: browseadmin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: browseadmin.php");
        exit(0);
    }
}


if(isset($_POST['save_user']))
{
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "INSERT INTO user_acc (first_name,last_name,username,email) VALUES ('$first_name','$last_name','$username','$email')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User Created Successfully";
        header("Location: user-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Created";
        header("Location: user-create.php");
        exit(0);
    }
}

?>