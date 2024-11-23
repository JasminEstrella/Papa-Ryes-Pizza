<?php
session_start();
include('config.php');
// var_dump($_SESSION);
$prod_id = $_GET['id'];

$menu_category = $connection->prepare("SELECT * FROM menu WHERE product_id=$prod_id");
$menu_category->execute();

$product_details = $menu_category->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['addtocart'])) {
    
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];
    $_SESSION['checkout'] = true;
    
    // // $cart_query = $connection->prepare("INSERT INTO checkout_cart(user_id)VALUES($user_id)");
    
    $cart_item = $connection->prepare("INSERT INTO cart_items(product_id, quantity) VALUES($prod_id, $quantity)");
    $add_cart = $cart_item->execute();
    // $get_cart = $connection->prepare("SELECT * FROM cart_items");
    // $get_cart_item->execute();
    // $cart_details = $get_cart_item->fetch(PDO::FETCH_ASSOC);
    var_dump($add_cart);
    // $cart_id = $add_cart['id'];
    // // $get_checkout_item = $connection->prepare("SELECT * FROM cart_items WHERE id=$cart_id");
    // $checkout_query = $connection->prepare("INSERT INTO checkout_cart(user_id,item_id)VALUES($user_id,$cart_id)");
    // $result = $checkout_query->execute();
    // var_dump($checkout_query);
    // if ($result) {
    //     echo "success";
    // }
}
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
                            <li><a href="?action=products" class="active">Products</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.html">About Us</a>
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                    <a class="dropdown-item" href="terms.html">Terms</a>
                                </div>
                            </li>
                            <?php if ($_SESSION['login']) { ?>
                                <li><a href="?action=home">Checkout</a></li>
                                <li><a href="javascript:void(0);" class="greet-text">Hi, <?=$_SESSION['username'];?>!</a></li>
                                <li><a href="?action=logout">Logout</a></li>
                                <?php
                                if ($_SESSION['user_id'] == 9) { ?>
                                    <li><a href="?action=settings">Settings</a></li>
                                <?php }?>
                            <?php } else { ?>
                                
                                <li><a href="?action=login">Sign in</a></li>
                            <?php }?>
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


    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><?=$product_details['product_name'];?></h2>
                        <h2><em><sup>Php </sup><?=$product_details['price'];?>.00</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section">
        <div class="container">
            <br>
            <br>

            <div class="row">
              <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner image-container">
                    <div class="carousel-item active">
                      <img class="d-block w-100 detail-image" src="assets/images/<?=$product_details['product_image'];?>" alt="First slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                <br>
              </div>

              <div class="col-md-4">
                <div class="contact-form">

                  <form action="" id="contact" name="add-to-cart-form" method="post">
                    <div class="form-group">
                      <p><?=$product_details['product_description'];?></p>
                    </div>
                    
                    <!-- <label>Extras:</label>

                    <select>
                        <option value="0">Extra A</option>
                        <option value="1">Extra B</option>
                        <option value="2">Extra C</option>
                    </select> -->

                    <div class="row">
                      <div class="col-md-6">
                        <label>Quantity</label>

                        <input name="quantity" type="number" placeholder="1" min="1" step="1">
                      </div>
                    </div>
                    
                    <div class="main-button">
                        <button type="submit" name="addtocart" value="addtocart">Add to cart</button>
                    </div>
                  </form>
                </div>

                <br>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
    