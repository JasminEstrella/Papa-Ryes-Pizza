<?php
    session_start();
    
    include('../config.php');
    var_dump($connection);
    $query = $connection->prepare("SELECT * FROM menu INNER JOIN category ON menu.category_id = category.category_id");
    $query->execute();
    

?>

<?php //foreach($settings_config['navigation'] as $nav_tab => $nav_value): ?>
            <div class="tab-content active" id="products-settings">
                

            <div class="container">
    <!-- <h3>Hi, <?=$_SESSION['username'];?>!</h3> -->
    <div class="mb-3">
        <h4>Products List</h4>
    </div>

    <div class="table-content my-4 table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
                while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th scope="row"><?=$row['product_id']?></th>
                    <td><?=$row['product_name']?></td>
                    <td>Php <?=$row['price']?>.00</td>
                    <td><?=$row['category_name']?></td>
                    <td><?=$row['remarks']?></td>
                    <td>
                        <a class="edit">Edit</a> | 
                        <a class="delete">Delete</a>
                    </td>
                </tr>

            <?php }

            ?>
                
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary add-product-btn" data-toggle="modal" data-target="#addProducts"> + Add more products </button>

    <!-- Modal -->
    <div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-labelledby="addProductsLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductsLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php 
                        if (isset($_POST['submitproduct'])) {

                            $product_name = $_POST['name'];
                            $product_description = $_POST['description'];
                            $category_id = $_POST['category_id'];
                            $price = $_POST['price'];
                            $product_image = $_POST['image'];
                            $remarks = $_POST['remarks'];
                            // $created_date = $_POST['created_date'];
                            // $updated_date = $_POST['updated_date'];
                            
                            // $query = $connection->prepare("SELECT * FROM menu");
                            // $query->execute();
                            
                            // // if ($query->rowCount() == 0) {
                                $product_query = $connection->prepare("INSERT INTO menu(category_id, product_image, product_name, product_description, price, remarks) VALUES (:category_id,:product_image,:product_name,:product_description,:price:remarks)");
                                // var_dump($product_query);
                                $product_query->bindParam("product_name", $product_name, PDO::PARAM_STR);
                                $product_query->bindParam("product_description", $product_description, PDO::PARAM_STR);
                                $product_query->bindParam("category_id", $category_id, PDO::PARAM_STR);
                                $product_query->bindParam("product_image", $product_image, PDO::PARAM_STR);
                                $product_query->bindParam("price", $price, PDO::PARAM_STR);
                                $product_query->bindParam("remarks", $remarks, PDO::PARAM_STR);
                                // $product_query->execute();
                                var_dump($product_query);
                            //     if ($result) {
                            //         echo '<br><br><br><br><p class="success">New product is successfully added!</p>';
                            //     } else {
                            //         echo '<p class="error">Something went wrong!</p>';
                            //     }
                            
                            // // }
                        }

                        ?>
                    <form id="add-products" action="" method="post" name="add-products-form">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 col-auto">
                                <label>Product/Menu Name</label><br>
                                <input type="text" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <label>Product Description:</label><br>
                                <textarea name="description" id="description" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <label>Category:</label><br>
                                <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option selected disabled>Select Category</option>
                                    <option value="1">Pizza</option>
                                    <option value="2">Pasta</option>
                                    <option value="3">Chicken</option>
                                    <option value="4">Beverage</option>
                                    <option value="5">Others</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <label>Extras:</label><br>
                                <select class="form-select form-select-lg mb-3" multiple aria-label=".form-select-lg example">
                                    <option selected disabled>Select Extras</option>
                                    <option value="1">Cheese</option>
                                    <option value="2">Pepperoni</option>
                                    <option value="3">Mayonnaise</option>
                                    <option value="4">Sour Cream</option>
                                    <option value="5">Beef Meat</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <label>Price:</label><br>
                                <input type="number" name="price" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <label>Upload image:</label><br>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <label>Availability:</label><br>
                                <select name="remarks" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option selected disabled>Select Availability:</option>
                                    <option value="1">Available</option>
                                    <option value="2">Coming Soon</option>
                                    <option value="3">Unavailable</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-button">

                                    <div class="float-left">
                                    <button type="submit" class="btn btn-primary" name="submitproduct" value="submitproduct">Add New Product</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>            
        <?php //endforeach;?>

        </div>
    </div>
</div>

