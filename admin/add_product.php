<?php include('includes/header.php')?>

<?php
// Include the file containing the db class
require('../config/dbcon.php');

// Create database object
$database = new db();

// Check if the form is submitted
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status= $_POST['status'];
    $categoryid	= $_POST["category_id"];  // get
    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_destination = 'assests/images/' . $file_name;

        // Move the uploaded file to the destination folder
        if (!move_uploaded_file($file_tmp, $file_destination)) {
            $errors['image'] = "Failed to move uploaded file.";
        }
    } else {
        $errors['image'] = "Image upload failed.";
    }

    // Create database object
    $database = new db();

    // Insert data into the database
    $tableName = 'products';
    $columns = ['name', 'price', 'image', 'category_id', 'status']; 
    $values = [$name, $price, $file_name, $categoryid, $status]; 
    $result = $database->insert_data($tableName, $columns, $values);

    if($result) {
        $_SESSION['message'] = "Product added successfully";
    } else {
        $_SESSION['message'] = "Failed to add Product";
    }
}
?>

<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" enctype="multipart/form-data">  
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group row">
                                    <label for="price ">Price</label>
                                    <div class="col-md-6 input-group">
                                        <input class="form-control"
                                            type="number"
                                            name="price"
                                            min="0.00"
                                            max="10000.00"
                                            placeholder="0.0"
                                        />
                                        <span class="input-group-append m-2 ">EGP</span>
                                    </div>
                                    </div>
                                <div class="form-group row">
                                    <label for="category_id">Category</label>
                                    <div class="col-md-6 input-group">
                                    <select name="category_id" class="form-control"> 
                                        <?php
                                        // Fetch categories from the database
                                        $categories_query = "SELECT * FROM categories";
                                        $categories_result = $database->getdata("*", "categories", "");
                                        if ($categories_result) {
                                            while ($row = $categories_result->fetch_assoc()) {
                                                echo "<option value='".$row['category_id']."'>".$row['name']."</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No categories found</option>";
                                        }
                                        ?>
                                    </select> <span class="input-group-append m-2 "><a href="add_catogray.php">Add New Category</a></span>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="available">Available</option>
                                        <option value="unavailable">Unavailable</option>
                                    </select>
                                </div>
                                <div class="form-group m-2 ">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php')?>
