<?php
session_start();
include('config.php');

var_dump($connection);
$category = $connection->prepare("SELECT * FROM menu INNER JOIN category ON menu.category_id = category.category_id");
$category->execute();

/* Begin Paging Info */
$page = 1;
 
if (isset($_GET['page'])) {
    $page = filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
}
$per_page = 12;

$menucount = $connection->prepare("SELECT count(*) as total_products from menu");
$menucount->execute();
$row = $menucount->fetch(PDO::FETCH_ASSOC);
$total_records = $row['total_products'];
$total_pages = ceil($total_records / $per_page);
$offset = ($page-1) * $per_page;

/* End Paging Info */

$limit_menu = $connection->prepare("SELECT * from menu limit $offset, $per_page");
$limit_menu->execute();

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
                        <h2>Our <em>Products</em></h2>
                        <div class="categories mt-3">
                            <a class="category-text" href="#allproducts">All Products</a>
                            <a class="category-text" href="#pizza">Pizza</a>
                            <a class="category-text" href="#pasta">Pasta</a>
                            <a class="category-text" href="#chicken">Chicken</a>
                            <a class="category-text" href="#beverage">Beverages</a>
                            
                            <a class="category-text" href="#others">Others</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">

            <?php while( ($row = $limit_menu->fetch(PDO::FETCH_ASSOC) ) !== false) { ?>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/<?=$row['product_image']?>" alt="">
                        </div>
                        <div class="down-content">
                            <span> <sup>Php </sup><?=$row['price']?>.00
                            </span>

                            <h4><?=$row['product_name']?></h4>

                            <p><?=$row['product_description']?></p>

                            <ul class="social-icons">
                                <li><a href="?action=product-details&id=<?=$row['product_id'];?>">+ Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php } ?>
                
            </div>

            <br>
                
            <nav>
              <ul class="pagination pagination-lg justify-content-center">

              <?php if ($page-1 >= 1) { ?>
                <li class="page-item">
                    <a class="page-link" href="<?=$_SERVER['PHP_SELF']."?action=". $action. "&page=".($page - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Prev</span>
                    </a>
                </li>
            <?php } ?>

            <?php if ($page+1 <= $total_pages) { ?><li class="page-item">
                <li class="page-item"> 
                    <a class="page-link" href="<?=$_SERVER['PHP_SELF']."?action=". $action. "&page=".($page + 1); ?>" aria-label="Next">
                        <span aria-hidden="true"> Next &raquo;</span>
                    </a>
                </li>
            <?php } ?>
                
              </ul>
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->