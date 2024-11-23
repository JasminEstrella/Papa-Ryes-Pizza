<?php

    session_start();
    // session_unset();
    include('config.php');
    // var_dump($_SESSION);
   
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
                            <li><a href="?action=registration">Sign Up for an Account</a></li>
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

        <?php

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo '<p class="error">Username password combination is wrong!</p>';
            } else {
                if (password_verify($password, $result['password'])) {
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $result['username'];
                    header("Location: http://$host$uri/$extra". "home");
                } else {
                    echo '<p class="error">Username password combination is wrong!</p><br>';
                }
            }
        }
    ?>
            
        <div class="row">
                <div class="col-md-12">
                    <div class="contact-form d-flex justify-content-center">
                        <form id="" action="" method="post" name="signin-form">
                           <div class="row">
                                <label class="text-white">Username</label>
                                <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                           </div>
                           <div class="row">
                                <label class="text-white">Password</label>
                                <input type="password" name="password" required />
                           </div>
                            <br>
                           <div class="row">
                                <div class="main-button">
                                    <div class="float-left">
                                    <button type="submit" name="login" value="login">Log In</button>
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


