<?php
   session_start();
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
            <img src="./imgs/profil.jpg" alt="Avatar">

            <?php

                if($_SESSION['loggedIn']===true)
                {
                    echo "<h2>". $_SESSION['userDetails']['first_name']. " ";
                    echo $_SESSION['userDetails']['last_name']."</h2>";


                    echo "<h3>". "ID : " .$_SESSION['userDetails']['id']."<br>";

                    echo "Email : " .$_SESSION['userDetails']['email']."<br>";

                    echo "User Name : " .$_SESSION['userDetails']['user_name']."<br>";

                    echo "Number : " .$_SESSION['userDetails']['number']."<br>";
                    
                }
                else {
                    header('Location: login.php');
                }
                
            ?>


        </div>

        <div>
            <h1>This is My First Blog</h1>
            <small>21/06/2019</small><br><br>

            <p>Web Development tutorials, source code and reviews
            Welcome to The Web Development Blog where I share my ideas on working with WordPress, Ubuntu, PHP and a lot of other
            “geeky” stuff.</p>
            <p>I’m Olaf Lederer and most of the tutorials and code that I share are used in my own projects. Through the years, I have
            received so much support and guidance from other webmasters that I started the Web Development Blog to in turn help
            others. As part of my ‘day job’, I am continually researching SEO, web hosting and tech stuff. I’ll share my views on
            web hosting issues, various online services and other assorted web programming topics.</p>
            
            <p>From time to time, I’ll invite some of my friends to guest post and as always, everyone is welcome to join the
            discussion.</p>
            
            <p>Web Development Blog
            Website Development
            All about Website Development
            Website development is the one topic that ties together everything I discuss here on Web Development Blog. Much of what
            we do as web professionals goes beyond writing lines of code. I’ll be sharing ideas and tips on running a web
            development business, site design and usability, image use and tools that make creating websites easier.</p>
            
            <p>PHP Script & Tutorials
            Web Development Blog PHP Scripts & Tutorials
            All of my PHP tutorials are based on scripts that I am using on my own website projects. I try to keep my PHP code
            simple without complex code structures but with smart and easy functions. I wrote most of the code discussed on the Web
            Development Blog , but I also like to talk about 3rd party scripts that I frequently use.</p>
            
            <p>WordPress Development
            WordPress Development
            Over the past few years, I am finding myself using WordPress more frequently in building my own websites and sites for
            my customers. WordPress becomes more powerful with each update and it’s easy to add more features. I write about cool
            WordPress plugins that I’ve found and share the modifications I have implemented in my own WordPress projects.
            
            Web Hosting
            Website Hosting Reviews & Tutorials
            Without web hosts, there would be no websites. Within the past few years, the hosting business has changed. There are
            many Cloud hosting providers and Linux hosting on Ubuntu is easier than ever before. I maintain several Ubuntu-based
            virtual servers and share my experience here on the Web Development Blog as often as possible.</p>
            
            <p>Shopping Cart Templates
            Shopping Cart Templates
            Choose a premium shopping cart template and add a new design to your web shop within hours. There are templates for
            Magento Commerce, osCommerce, Zen-Cart, WooCommerce, Opencart and several other eCommerce platforms. All templates come
            together with the full demo content and a layered PhotoShop (.psd) file for your own modifications.
            
            
            Web Development tutorials, source code and reviews
            Welcome to The Web Development Blog where I share my ideas on working with WordPress, Ubuntu, PHP and a lot of other
            “geeky” stuff.
            I’m Olaf Lederer and most of the tutorials and code that I share are used in my own projects. Through the years, I have
            received so much support and guidance from other webmasters that I started the Web Development Blog to in turn help
            others. As part of my ‘day job’, I am continually researching SEO, web hosting and tech stuff. I’ll share my views on
            web hosting issues, various online services and other assorted web programming topics.</p>
            
        </div>
    </div>


    
    
</body>
</html>