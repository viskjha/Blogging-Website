<?php
    session_start();
	if($_SESSION['loggedIn'] !== true) {
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/nav.css">
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
                        <li><a href="#">contactUs</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>


    <div class="wrapper">
        <div class="imgbox">

        <?php
            $imgs = $_SESSION['userDetails']['images'];
        ?>
            <img src="<?php echo $imgs ?>" alt="Avator">


            <?php
                echo "<h2>". $_SESSION['userDetails']['first_name']. " ";
                echo $_SESSION['userDetails']['last_name']."</h2>";


                echo "<h3>". "ID : " .$_SESSION['userDetails']['id']."<br>";

                echo "Email : " .$_SESSION['userDetails']['email']."<br>";

                echo "User Name : " .$_SESSION['userDetails']['user_name']."<br>";

                echo "Number : " .$_SESSION['userDetails']['number']."<br>";
            ?>

        </div>



        <div>

            <?php
                $titleErr =$desErr="";
                $title = $des="";
                $status=true;
                $id= $_SESSION['userDetails']['id'];
                $postsResult="";

                //Connect To Database
                $servername="localhost";
                $username="root";
                $password="";
                $db="blog";
                $conn = new mysqli($servername, $username, $password, $db);
                //Check Error
                    if($conn->connect_error)
                    {
                        die("Connection Failed: ". $conn->connect_error);
                    }


                if(!empty($_POST))
                {
                    
                    if(empty($_POST['title']))
                    {
                        $titleErr = "Title must be filled";
                        $status=false;
                    }
                    else {
                        $title = $_POST['title'];
                    }

                    if(empty($_POST['des']))
                    {
                        $desErr = "Description must be filled";
                        $status=false;
                    }
                    else {
                        $des = $_POST['des'];
                    }


                if($status)
                {
                    // Insert Into Database
                    $sql="INSERT INTO post (title, description, user_id)
                        values('$title','$des', '$id')";
                    $result = $conn->query($sql);
                    header("location: profile.php");
                    exit;
                }

                }
                
            ?>

            <h2>Create Post</h2>
            <section class="container-form">
                <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" id="my-form">

                <div>
                    <label for="">Title:</label>
                    <input type="text" name="title">
                    <p><?php echo $titleErr; ?></p>
                </div>

                <div>
                    <label for="">Description:</label>
                    <textarea name="des" id="" cols="30" rows="10" class="text-ar"></textarea>
                    <p><?php echo $desErr; ?></p>
                </div>

                <input type="submit" name="submit" value="CREATE POST" class="btn">
            </form>
                
            </section>
            <hr>



            <?php
    
               $sql = "SELECT title, description FROM post INNER JOIN users ON post.user_id = users.id WHERE user_id = $id";
	           $postsResult = $conn->query($sql);

               while($row = $postsResult->fetch_assoc())
                {
                    echo "<div><h1>".$row["title"]."</h1>";
                    echo "<p>".$row["description"]."<p></div>";
                }	
                $conn->close();
    
            ?>
            
        </div>
    </div>
    
</body>
</html>