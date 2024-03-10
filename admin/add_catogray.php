<?php include('includes/header.php')?>

<?php
require('../config/dbcon.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    
    // Create database object
    $database = new db();
    
    // Insert data into the database
    $tableName = 'categories';
    $columns = ['name'];
    $values = [$name];
    $result = $database->insert_data($tableName, $columns, $values);
    
    if($result) {
        $_SESSION['message'] = "Category added successfully";
    } else {
        $_SESSION['message'] = "Failed to add category";
    }
}
?>
<div class="container">
    <div class="row">
      <div class ="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                <form method="post">  
                <label for="">Name</label>
                <input type="text"name="name" class="form-control">
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </div>    
                </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>


<?php include('includes/footer.php')?>


