<?php 
require("../config/dbcon.php");
$db = new DB();
$connection = $db->getconnection();
if ($connection->connect_error){
	die("Failed to connect: " . $connection->connect_error);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>My Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"/>
	<style>
		body{
			background-color: #FBF8F2;
		}
		nav{
			background-color: #93634C;
			color: #FBF8F2;
		}
		.navbar a{
			
			color: #FBF8F2;
		}
		.navbar a:hover{
			color: #FBF8F2;
		}
		h1,h2,h3,h4,h5,th{
			color: #4b281e;
		}
		.each-order img{
			width: 60vw;
			height: 30vh;

		}
	</style>
  </head>

  <body>

	<nav class="navbar navbar-expand-lg ">
		<div class="container-fluid">
		  <a class="navbar-brand" href="#">Cafeteria</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active" aria-current="page" href="#">Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">My Orders</a>
			  </li>
			</ul>
			<div class="d-flex align-items-center">
           <!-- <img "src='./imgs/{$data['image']}'"  width="50" height="50" >-->	
		    <?php
       		     try {
              		  $result = $db->getdata("*","users",1);
						//var_dump($result->fetch_array(MYSQLI_ASSOC));
            		    while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                  
                    echo "<img class='img-fluid w-30' src='../admin/assests/images/{$data['image']}' alt='' width='50' height='50'/>";
					echo "<p class='mt-3 mx-2'>{$data['name']}</p>";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            } 
            /* 
			echo "<img class='img-fluid w-30' src='../admin/assests/images/$profile_pic' alt='$username' width='50' height='50'/>";
			echo "<p class='mt-3 mx-2'>$username</p>"; */
			 

            ?>
			 
			</div>
		  </div>
		</div>
	  </nav>

    <main class="my-orders mt-5">
      <section class="main-padding">
        <div class="container">
          <h1>My Orders</h1>
          <!-- date-picker -->
          <form action="" method="post" class="mt-5">
            <div class="row">
              <div class="col-sm-6">
                <div class="from-group">
                  <label for="start">Date from:</label>
                  <input type="date" class="form-control start" name="start" pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD" />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end">Date to:</label>
                  <input type="date" class="form-control end" name="end" pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD"/>
                </div>
              </div>
            </div>
			<input type="submit" class="btn btn-primary" value="Filter"/>
          </form> 
          
        </div>
      </section>
<!-- orders -->
 <section class="main-padding" class="mt-5">
        <div class="container">
<!-- user-orders -->
          <div class="user-orders">
<!-- ! table -->
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Order Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Amount</th>
<!--                   <th scope="col">Ext</th>
 -->                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- order -->
                
				<?php
       		     try {
					       // Check if start and end dates are provided
    if( !empty($_POST['start']) && !empty($_POST['end'])) {
        $dateFrom = $_POST['start'];
        $dateTo = $_POST['end'];
        
        // Call the function to get orders within the specified date range
        $result = $db->getOrdersByDateRange($dateFrom, $dateTo);
		while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<tr class='order'>";
			echo "<td>"; 
			echo "<span>{$data['order_date']}</span>";
			echo "<button class='toggle-details btn btn-link'><i class='fas fa-plus-square'></i></button>";
			echo "</td>";
			echo "<td>{$data['order_status']}</td>";
			echo "<td><span>{$data['total_price']}</span> EGP</td>";
			/* echo "<td>1020</td>"; */
			if($data['order_status']=="Processing"){
				echo "<td><button class='cancel btn btn-danger'>Cancel</button></td>";
			}	
			echo " </tr>";	
	}
	//echo "<h1>".$result."</h1>";
    }  else {
    // If start and end dates are not provided, fetch all orders
    $result = $db->getdata("*", "orders", "");
	//var_dump($result->fetch_array(MYSQLI_ASSOC));

	while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
		echo "<tr class='order'>";
		echo "<td>"; 
		echo "<span>{$data['order_date']}</span>";
		echo "<button class='toggle-details btn btn-link'><i class='fas fa-plus-square'></i></button>";
		echo "</td>";
		echo "<td>{$data['order_status']}</td>";
		echo "<td><span>{$data['total_price']}</span> EGP</td>";
		/* echo "<td>1020</td>"; */
		if($data['order_status']=="Processing"){
			echo "<td><button class='cancel btn btn-danger'>Cancel</button></td>";
		}	
		echo " </tr>";	
}
$item = $db->getdata("*","products",1);
				//echo var_dump($item->fetch_array(MYSQLI_ASSOC));					
				while ($data_item = $item->fetch_array(MYSQLI_ASSOC)) {
					echo '<tr class="order-details" style="display: none;">';
				
                echo ' <td colspan="4">';
				echo '  <div class="row">';
			      // each-item
                   echo  ' <div class="col-sm-3">';
				   echo ' <div class="each-order">';
				   echo  "<img src='../admin/assests/images/{$data_item['image']}' class='w-100' alt='{$data_item['name']}' />";
				   echo  "<h5>{$data_item['name']}</h5>";
				   echo '<input type="text" name="tea" value="15" hidden />';
				   echo "<div class='d-flex justify-content-between'>";
                  		 echo "<h6>{$data_item['price']} LE</h6>";
				 		// echo "<h6 class='mx-4'>{$data_item['quantity']}</h6>";
				   echo "<div>";
				   echo '</div>';
				   echo' </div>';
                      
				   echo '</div>';
				   echo '</td>';
				   echo '</tr>';
				}
}
              		  
					
				
				
               } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
              }
            ?>
                  
               
                
              </tbody>
            </table>
<!-- end of table -->
						
<!-- total-price -->
			<div class="total-price d-flex justify-content-evenly">
					<h3>Total</h3>
					<h3>EGP <span>200</span></h3>
			</div>
<!-- end of total-price -->
          </div>
        </div>
      </section>
    </main>
<!-- Include jQuery before Bootstrap's JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var toggleButtons = document.querySelectorAll('.toggle-details');
    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var icon = button.querySelector('i');
            var detailsRow = button.closest('tr').nextElementSibling;
            if (icon.classList.contains('fa-plus-square')) {
                icon.classList.remove('fa-plus-square');
                icon.classList.add('fa-minus-square');
                detailsRow.style.display = 'table-row';
            } else {
                icon.classList.remove('fa-minus-square');
                icon.classList.add('fa-plus-square');
                detailsRow.style.display = 'none';
            }
        });
    });
});

</script>
  </body>
</html>
