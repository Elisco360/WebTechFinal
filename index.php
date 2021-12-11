<?php
session_start();

    include("connection/config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password))
        {
            //read to database
            $query = "SELECT email,password FROM users where email = '$email' limit 1";
            
            $result = mysqli_query($conn, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['id'] = $user_data['id'];
                        header("location: managetasks.php");
                        die;
                    }
                }
            }
            echo "Incorrect email or password!";
        }
        else 
        {
            echo "Please enter valid information!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/css/bootstrap.css">
    <link rel="stylesheet" href="style/sign_in.css">
    <title>PeakFlow - Sign In</title>
</head>
<body style="font-family: 'Poppins';">
    <!--Header-->
    <header style="background-color: white;">
        <nav class="navbar-brand">
            <div class="container" id="logo">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.svg" alt="PeakFlow Logo" width="43" height="40">
                    <span style="color: black;">PeakFlow</span>
                </a>
            </div>
        </nav>
    </header>
    <!--End of Header-->
    <section>
        <div class="wrapper">
            <div class="left">
                <div class="container" id="illustrator">
                    <img src="assets/img/sign_in.svg" class='img1' alt="illustrator" width="700px" height="500px">
                </div>
            </div>
            <div class="right">
                <div class="welcome-text">
                    <h3>Sign in to your<br>account</h3>
                    <small>Fill up your details to proceed</small>
                </div>
                <div class="form">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary" id="sign_in">Sign in to your account</button>
                        <p>Don't have an account? <span><a href="register.php"  style="color: #341EFF; text-decoration: none;  font-size: 13px; font-weight: 500;">Sign Up</a></span></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="js/js/bootstrap.js"></script>
</body>
</html>