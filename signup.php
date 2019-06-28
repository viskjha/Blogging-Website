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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>


    <?php 
        $fnameErr=$lnameErr=$unameErr=$emailErr=$numErr=$pass1Err=$pass2Err="";
        $fname=$lname=$uname=$email=$num=$pass1=$pass2="";
        $status=true;
        $msg="";

        if(!empty($_POST))
        {
            if(empty($_POST['fname']))
            {
                $fnameErr = "First Name must be Filled";
                $status=false;
            }
            else {
                $fname=$_POST['fname'];
            }

            if(empty($_POST['lname']))
            {
                $lnameErr = "Last Name must be Filled";
                $status=false;
            }
            else {
                $lname = $_POST['lname'];
            }

            if(empty($_POST['uname']))
            {
                $unameErr = "User Name must be Filled";
                $status=false;
            }
            else {
                $uname =$_POST['uname'];
            }

            if(empty($_POST['email']))
            {
                $emailErr = "Email must be Filled";
                $status=false;
            }
            else {
                $email=$_POST['email'];
            }

            if(empty($_POST['num']))
            {
                $numErr = "Number must be Filled";
                $status=false;
            }
            else {
                $num=$_POST['num'];
            }

            if(empty($_POST['pass1']))
            {
                $pass1Err = "Password must be Filled";
                $status=false;
            }
            else {
                $pass1=sha1($_POST['pass1']);
            }

            if(empty($_POST['pass2']))
            {
                $pass2Err = "Password must be Filled";
                $status=false;
            }
            else {
                $pass2=$_POST['pass2'];
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

                $sql = "INSERT INTO users (first_name, last_name, user_name, email, number, password)
                        values('$fname', '$lname', '$uname', '$email', '$num', '$pass1')";

                        if($conn->query($sql))
                        {
                            $msg = "Register Successfull";
                        }
                        else {
                            echo "ERROR". $sql ."<br>". $conn->error;
                        }
            }
        }
    ?>
    
    <section class="container-form">
        <p class="val-php"><?php echo $msg; ?></p>
        <form id="my-form" action="<?=$_SERVER['PHP_SELF'];?>" name="login" onsubmit="return validateForm()" method="POST">
            <h1>Register</h1>

            <div>
                <label for="">First Name:</label>
                <input type="text" name="fname" placeholder="Enter First Name" id="fname" onblur="validate('fname', 'fnameErr')" onkeypress="validate('fname', 'fnameErr')">
                <p id="fnameErr" style="display:none">*Required</p>
                <p class="val-php"><?php echo $fnameErr; ?></p>
            </div>

            <div>
                <label for="">Last Name:</label>
                <input type="text" name="lname" placeholder="Enter Last Name" id="lname" onblur="validate('lname', 'lnameErr')" onkeypress="validate('lname', 'lnameErr')">
                <p id="lnameErr" style="display:none">*Required</p>
                <p class="val-php"><?php echo $lnameErr; ?></p>
            </div>

            <div>
                <label for="">User Name:</label>
                <input type="text" name="uname" placeholder="User Name" id="uname" onblur="validate('uname', 'unameErr')" onkeypress="validate('uname', 'unameErr')">
                <p id="unameErr" style="display:none">*Required</p>
                <p class="val-php"><?php echo $unameErr; ?></p>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter Your Email" id="email" onblur="validate('email', 'emailErr')" onkeypress="validate('email', 'emailErr')">
                <p id="emailErr" style="display:none">*Required</p>
                <p class="val-php"><?php echo $emailErr; ?></p>
            </div>

            <div>
                <label for="">Number:</label>
                <input type="number" name="num" placeholder="Enter Your Number" id="num" onblur="validate('num', 'numErr')" onkeypress="validate('num', 'numErr')">
                <p id="numErr" style="display:none">*Required</p>
                <p class="val-php"><?php echo $numErr; ?></p>
            </div>

            <div>
                <label for="">Password</label>
                <input type="password" name="pass1" placeholder="Enter Your Password" id="pass1" onblur="validate('pass1', 'pass1Err')" onkeypress="validate('pass1', 'pass1Err')">
                <p id="pass1Err" style="display:none">*Required</p>
                <p class="val-php"><?php echo $pass1Err; ?></p>
            </div>

            <div>
                <label for="">Re-Enter Password:</label>
                <input type="password" name="pass2" placeholder="Re-Enter Your Password" id="pass2" onblur="validatePass()">
                <p id="pass2Err" style="display:none">*Required</p>
                <p class="val-php"><?php echo $pass2Err; ?></p>
            </div>

            <button class="btn" type="submit" value="submit">Sign Up</button>

            <h3><a href="login.html">Click here for Login</a></h3>

        </form>
    </section>
    

   <script src="./js/validate.js"></script> 
</body>
</html>