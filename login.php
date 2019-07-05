<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/log-reg.css">
    
</head>
<body>
    <div class="sticky">
        <header>
            <div class="container">
                <div id="branding">
                    <h1><span class="highlite">Vishal</span> Blog Network</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>


    <?php 
        $emailErr=$pass1Err="";
        $email=$pass1="";
        $status=true;
        $msg="";

        if(!empty($_POST))
        {
            if(empty($_POST['email']))
            {
                $emailErr = "Email must be Filled";
                $status=false;
            }
            else {
                $email=$_POST['email'];
            }

            if(empty($_POST['pass1']))
            {
                $pass1Err = "Password must be Filled";
                $status=false;
            }
            else {
                $pass1=sha1($_POST['pass1']);
            }



            $servername="localhost";
            $username="root";
            $password="";
            $db="blog";

            if($status)
            {
                $conn = new mysqli($servername, $username, $password, $db);
                if($conn -> connect_error)
                {
                    die("ERROR: ". $conn->connect_error);
                }

                $sql = "SELECT id,first_name,last_name,user_name,email,number, images FROM users WHERE email='$email' AND password='$pass1'";

                        $result=$conn->query($sql);

                        if($result->num_rows > 0)
                        {
                            $record = $result->fetch_assoc();
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['userDetails'] = $record;
                            header('Location:profile.php');
                        }
                        else {
                            echo "Invalid User Name and Password";
                        }
                        $conn -> close();
            }
        }
    ?>
    
    <section class="container-form">
        <p class="val-php"><?php echo $msg; ?></p>
        <form id="my-form" action="<?=$_SERVER['PHP_SELF'];?>" name="login" onsubmit="return validateForm()" method="POST">
            <h1>Login</h1>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter Your Email" id="email" onblur="validate('email', 'emailErr')" onkeypress="validate('email', 'emailErr')" require>
                <p id="emailErr" style="display:none">*Required</p>
                <p class="val-php"><?php echo $emailErr; ?></p>
            </div>

            <div>
                <label for="">Password</label>
                <input type="password" name="pass1" placeholder="Enter Your Password" id="pass1" onblur="validate('pass1', 'pass1Err')" onkeypress="validate('pass1', 'pass1Err')" require>
                <p id="pass1Err" style="display:none">*Required</p>
                <p class="val-php"><?php echo $pass1Err; ?></p>
            </div>

            <button class="btn" type="submit" value="submit">Login</button>

            <h3><a href="signup.php">Click here for Register</a></h3>

        </form>
    </section>
    

   <script src="./js/vlog.js"></script> 
</body>
</html>