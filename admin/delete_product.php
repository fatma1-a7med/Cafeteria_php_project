<?php
// Include the file containing the db class
require('../config/dbcon.php');

// Create database object
$database = new db();

if(isset($_GET["id"])) 
{
    $id = $_GET['id'];
    $result = $database->delete("products", "id = $id");
    if ($result) {
        
        // Redirect to the product listing page after successful deletion
        header("Location: products.php");

        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Failed to delete product.";
    }
} 
else {
    echo "ID is missing from the URL.";
}
?>
