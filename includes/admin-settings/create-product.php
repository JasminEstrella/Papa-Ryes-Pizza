
<?php //foreach($settings_config['navigation'] as $nav_tab => $nav_value): ?>
            <div class="tab-content active" id="create-product">
                
<h5 class="modal-title" id="addProductsLabel">Add Product</h5>

<?php 
    session_start();
    include('includes/config.php');
    
    if (isset($_POST['submitproduct'])) {
        $product_name = $_POST['name'];
        $product_description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $product_image = $_POST['image'];
        $remarks = $_POST['remarks'];

        $product_query = $connection->prepare("INSERT INTO menu(category_id, product_image, product_name, product_description, price, remarks) VALUES (:category_id,:product_image,:product_name,:product_description,:price,:remarks)");
        $product_query->bindParam("product_name", $product_name, PDO::PARAM_STR);
        $product_query->bindParam("product_description", $product_description, PDO::PARAM_STR);
        $product_query->bindParam("category_id", $category_id, PDO::PARAM_STR);
        $product_query->bindParam("product_image", $product_image, PDO::PARAM_STR);
        $product_query->bindParam("price", $price, PDO::PARAM_STR);
        $product_query->bindParam("remarks", $remarks, PDO::PARAM_STR);
        $result = $product_query->execute();

        if ($result) {

            echo '<br><br><div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>'. $product_name . '</strong> is added successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            
        } else {
            echo '<p class="error">Something went wrong!</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
        }
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
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <label>Availability:</label><br>
                <select name="remarks" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected disabled>Select Availability:</option>
                    <option value="available">Available</option>
                    <option value="comingsoon">Coming Soon</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="main-button">

                    <div class="float-left">
                    <button type="submit" class="btn btn-primary" id="submitproduct" name="submitproduct" value="submitproduct">Add New Product</button>
                </div>
            </div>
        </div>
        
    </form>
            </div>            
        <?php //endforeach;?>

        </div>
    </div>
</div>
