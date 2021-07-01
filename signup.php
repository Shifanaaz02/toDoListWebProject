<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .header {
    padding: 30px;
    text-align: center;
    background: #FF616D;
    color: white;
    font-size: 60px;
    font-family: "Georgia",Serif;
    }
    login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
    }
    form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
    }

    #button {
    background-color: wheat;
    color: red;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    }
    form button:hover,.form button:active,.form button:focus {
    background: #FA9191;
    }
    form message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 12px;
    }
    form message a {
    color: #FA9191;
    text-decoration: none;
    }
    form register-form {
    display: none;
    }
    container {
    position: relative;
    z-index: 1;
    max-width: 300px;
    margin: 0 auto;
    }
    container:before, container:after {
    content: "";
    display: block;
    clear: both;
    }
    container info {
    margin: 50px auto;
    text-align: center;
    }
    container info h1 {
    margin: 0 0 15px;
    padding: 0;
    font-size: 36px;
    font-weight: 300;
    color: #1a1a1a;
    }
    container info span {
    color: #4d4d4d;
    font-size: 12px;
    }
    container info span a {
    color: #000000;
    text-decoration: none;
    }
    container info span fa {
    color:#FF616D;
    }
    body {
    background: #FF616D; /* fallback for old browsers */
    background: -webkit-linear-gradient(right, #FF616D, #FF616D);
    background: -moz-linear-gradient(right, #FF616D,#FF616D);
    background: -o-linear-gradient(right,#FF616D, #FF616D);
    background: linear-gradient(to left, #FF616D, #FF616D);
    font-family: "Roboto", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;      
    }
    </style>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <div class="header">
    <h1 class="header">To Do List</h1>
    </div>
    <div class="container my-4">
     <!-- <h1 class="text-center">Signup to our website</h1> -->
     <form action="/loginsystem/signup.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" id="button" class="btn btn-primary">SignUp</button>
        <p>Already have an account ?<a href="login.php">Login here</a></p>
     </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
