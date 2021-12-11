<?php
session_start();

    include("connection/config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($name) && !empty($email) && !empty($password) && !is_numeric($name))
        {
            //save to database
            $query = "INSERT INTO users (name, email, password) values ('$name', '$email', '$password')";
            
            mysqli_query($conn, $query);

            header("location: index.php");
            die;
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
    <link rel="stylesheet" href="style/sign_up.css">
    <title>PeakFlow - Sign Up</title>
</head>
<body style="font-family: 'Poppins', sans-serif;">
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
                <div class="left" style="text-align: center; font-size: 14px;">
                    <div class="container" id="illustrator">
                        <img src="assets/img/sign_up.svg" class="img-2" alt="illustrator" width="700px" height="500px">
                    </div>
                    <p style="font-size: 12px;">Already have an account? <span><a href="../php/sign_in.php"  style="color: #341EFF; text-decoration: none; font-weight: 500;">Sign In</a></span></p>

                </div>
                <div class="right">
                    <div class="welcome-text">
                        <h3>Create account</h3>
                        <p class="text">Fill up your details to proceed</p>
                    </div>
                    <div class="form">
                        <form action="" method="POST">
                            <div class="mb-3 pos">
                                <input type="text" name="name" class="form-control inp1" id="exampleInputName" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="mb-3 pos">
                                <input type="password" name="password" class="form-control inp1" id="exampleInputPassword2" placeholder="Password">
                                <input type="password" name="cpassword" class="form-control inp2" id="exampleInputPassword2" placeholder="Confirm Password">
                            </div>
                            <div style="margin-top: 30px;" class="mb-3 form-check">
                            </div>
                            <button type="submit" name="save" class="btn btn-primary" id="sign_up">Create Account</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <script src="js/js/bootstrap.js"></script>
</body>
</html>