<?php
// Start the session
session_start();

include('includes/header.php')?>
<?php
require('../config/dbcon.php');
$db = new db(); 


?>
<div class="container">

    <div class="row">
       <div class="div col-md-12">
        <div class="card-header">
            Products
        </div>
        <div class="card-body">
            <table class="table table-bordered">
            <tr>
                   
                    <th>Product Name</th>
                    <th>price</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $db->getdata("*", "products", ""); // Fetch data from students table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td><img src='assests/images/{$row['image']}'  width='50' height='50'></td>";
                        echo "<td>
                               
                                <a href='edit-product.php?id={$row['id']}' class='btn btn-primary'>Edit</a>
                                <a href='delete_product.php?id={$row['id']}' class='btn btn-danger'>Delete</a>

                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
                <?php
                // Get the session message, if any
                $message = isset($_SESSION['message']) ? $_SESSION['message'] : "";

                // Display the message
                echo $message;

                // // Unset the session message after retrieving it
                unset($_SESSION['message']);

                 
?>
            </tbody>
            </table>
        </div>
       </div>
</div>
</div>


<?php include('includes/footer.php')?>