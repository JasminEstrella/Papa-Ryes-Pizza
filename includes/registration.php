<?php

session_start();
include('config.php');

// var_dump($_SESSION);
if ($_SESSION['login']) {
        
    header("Location: http://$host$uri/$extra". "home");
}

var_dump($connection);
?>
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="?action=home" class="logo">Papa Rye's <em> Pizza</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="?action=home">Home</a></li>
                            <li><a href="?action=products">Products</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.html">About Us</a>
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                </div>
                            </li>
                            <li><a href="?action=login">Sign In</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Register an Account <em>HERE</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['register'])) {

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $house_no = $_POST['house_no'];
        $brgy = $_POST['brgy'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(fullname,username,email,phone,house_no,brgy,city,province,password) VALUES (:fullname,:username,:email,:phone,:house_no,:brgy,:city,:province,:password_hash)");
            $query->bindParam("fullname", $fullname, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("phone", $phone, PDO::PARAM_STR);
            $query->bindParam("house_no", $house_no, PDO::PARAM_STR);
            $query->bindParam("brgy", $brgy, PDO::PARAM_STR);
            $query->bindParam("city", $city, PDO::PARAM_STR);
            $query->bindParam("province", $province, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<br><br><br><br><p class="success">Your registration was successful!</p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
    ?>
    <section class="section">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-form">


                        <form id="contact" action="" method="post" name="signup-form">
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>Full Name:</label>
                                     <input type="text" name="fullname">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Username:</label>
                                     <input type="text" name="username" pattern="[a-zA-Z0-9]+" required>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>Email:</label>
                                     <input type="email" name="email" required>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Phone:</label>
                                     <input type="text" name="phone">
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>House No., Street name:</label>
                                     <input type="text" name="house_no">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>Barangay:</label>
                                     <input type="text" name="brgy">
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>City/Municipality:</label>
                                     <input type="text" name="city">
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                     <label>State/Province:</label>
                                     <input type="text" name="province">
                                </div>
                           </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                     <label>Create Password:</label>
                                     <input type="password" name="password" required>
                                </div>
                           </div>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-button">

                                        <div class="float-left">
                                        <button type="submit" name="register" value="register">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>

                    <br>
                </div>  
            </div>
        </div>
    </section>

