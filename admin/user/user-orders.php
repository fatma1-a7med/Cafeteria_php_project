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
			  <img src="./images/profile1.jpg" width="50" height="50" >
			  <p class="mt-3 mx-2">Islam Asker</p>
			</div>
		  </div>
		</div>
	  </nav>

    <main class="my-orders mt-5">
      <section class="main-padding">
        <div class="container">
          <h1>My Orders</h1>
          <!-- date-picker -->
          <form action="" class="mt-5">
            <div class="row">
              <div class="col-sm-6">
                <div class="from-group">
                  <label for="start">Date from:</label>
                  <input type="date" class="form-control start" name="start" />
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="end">Date to:</label>
                  <input type="date" class="form-control end" name="end" />
                </div>
              </div>
            </div>
          </form>
          
        </div>
      </section>

      <section class="main-padding" class="mt-5">
        <div class="container">
          <!-- user-orders -->
          <div class="user-orders">
            <!-- ! table one  -->
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Order Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- * first order -->
                <tr class="order">
                  <td>
                    <span>2019/03/10 10.30 AM</span>
					<button class="toggle-details btn btn-link"><i class="fas fa-plus-square"></i></button>

                  </td>
                  <td>Processing</td>
                  <td><span>55</span> EGP</td>
                  <td><button class="cancel btn btn-danger">Cancel</button></td>
                </tr>
                <tr class="order-details" style="display: none;">
					<!-- ! table two -->
                  <td colspan="4">
                    <div class="row">
                      <!-- each-item -->
                      <div class="col-sm-3">
                        <div class="each-order">
                          <img
                            src="./images/hot drinks/cup-tea-with-lemon-cinnamon.jpg"
                            class="w-100"
                            alt=""
                          />
                          <h5>tea</h5>
                          <input type="text" name="tea" value="15" hidden />
                          <span>15 LE</span>
                          <span>2</span>
                        </div>
                      </div>
                      <!-- each-item -->
                      <div class="col-sm-3">
                        <div class="each-order">
                          <img
                            src="./images/hot drinks/front-view-cup-cappuccino-with-bear-pattern.jpg"
                            class="w-100"
                            alt=""
                          />
                          <h5>tea</h5>
                          <input type="text" name="tea" value="15" hidden />
                          <span>15 LE</span>
                          <span>3</span>
                        </div>
                      </div>
                      <!-- each-item -->
                      <div class="col-sm-3">
                        <div class="each-order">
                          <img
                            src="./images/hot drinks/high-angle-coffee-cup-with-cinnamon-sticks-star-anise.jpg"
                            class="w-100"
                            alt=""
                          />
                          <h5>tea</h5>
                          <input type="text" name="tea" value="15" hidden />
                          <span>15 LE</span>
                          <span>5</span>
                        </div>
                      </div>
                      <!-- each-item -->
                      <div class="col-sm-3">
                        <div class="each-order">
                          <img
                            src="./images/hot drinks/hot-chocolate-served-with-cookies.jpg"
                            class="w-100"
                            alt=""
                          />
                          <h5>tea</h5>
                          <input type="text" name="tea" value="15" hidden />
                          <span>15 LE</span>
                          <span>1</span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <!-- ! ./table three -->
								</tr>
								<!-- * ./first order -->

								<!-- * second order -->
								<tr class="order">
										<td>
											<span>2019/03/10 10.30 AM</span>
											<button class="toggle-details btn btn-link"><i class="fas fa-plus-square"></i></button>
										</td>
										<td>Out for Delivery</td>
										<td><span>100</span> EGP</td>
										<td>
											<!-- <button class="cancel btn btn-danger">Cancel</button> -->
										</td>
								</tr>
								<tr class="order-details" style="display: none;">
									<!-- ! table two -->
									<td colspan="4">
										<div class="row">
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/cup-tea-with-lemon-cinnamon.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>2</span>
												</div>
											</div>
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/front-view-cup-cappuccino-with-bear-pattern.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>3</span>
												</div>
											</div>
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/top-view-hot-espresso-along-with-brown-coffee-seeds-cinnamon-wooden-brown-floor.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>5</span>
												</div>
											</div>
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/side-view-cup-coffee-latte.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>1</span>
												</div>
											</div>
										</div>
									</td>
									<!-- ! ./table three -->
								</tr>
								<!-- * ./second order -->

								<!-- * Third order -->
								<tr class="order">
										<td>
											<span>2019/03/10 10.30 AM</span>
											<button class="toggle-details btn btn-link"><i class="fas fa-plus-square"></i></button>
										</td>
										<td>Done</td>
										<td><span>100</span> EGP</td>
										<td>
											<!-- <button class="cancel btn btn-danger">Cancel</button> -->
										</td>
								</tr>
								<tr class="order-details" style="display: none;">
									<!-- ! table two -->
									<td colspan="4">
										<div class="row">
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/hot-chocolate-served-with-cookies.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>2</span>
												</div>
											</div>
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/high-angle-coffee-cup-with-cinnamon-sticks-star-anise.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>3</span>
												</div>
											</div>
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/front-view-cup-cappuccino-with-bear-pattern.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>5</span>
												</div>
											</div>
											<!-- each-item -->
											<div class="col-sm-3">
												<div class="each-order">
													<img
														src="./images/hot drinks/cup-tea-with-lemon-cinnamon.jpg"
														class="w-100"
														alt=""
													/>
													<h5>tea</h5>
													<input type="text" name="tea" value="15" hidden />
													<span>15 LE</span>
													<span>1</span>
												</div>
											</div>
										</div>
									</td>
									<!-- ! ./table three -->
								</tr>
								<!-- * ./Third order -->
              </tbody>
            </table>
						<!-- ! ./table one  -->
						
						<!-- total-price -->
						<div class="total-price d-flex justify-content-evenly">
								<h3>Total</h3>
								<h3>EGP <span>200</span></h3>
						</div>
						<!-- ./total-price -->
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
