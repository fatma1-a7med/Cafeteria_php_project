<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script>
        function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("confirm_password").value;
            if (a!=b) {
               alert("Passwords do no match");
               return false;
            }
        }
     </script>


</head>
<body>
  <?php
  $errors = [];
  if(isset($_GET['errors'])){
      $errors = json_decode($_GET['errors'], true);
  }
  ?>  

  <div class="container">
    <h1>User Registration</h1>
    <form class="p-3 m-4" action="insert.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="mb-3 col-6">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">
          <?php if(isset($errors['name'])): ?>
            <div class="text-danger"><?= $errors['name'] ?></div>
          <?php endif; ?>
        </div>
        <div class="mb-3 col-6">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email">
          <?php if(isset($errors['email'])): ?>
            <div class="text-danger"><?= $errors['email'] ?></div>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
       
        <div class="mb-3 col-6">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 col-6">
          <label for="confirm_password" class="form-label">Confirm_Password</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>
      </div>

      <div class="row">
        <div class="mb-3 col-6">
          <label for="room_id" class="form-label">Rom_Id</label>
          <input type="text" class="form-control" id="room_id" name="room_id">
          <?php if(isset($errors['room_id'])): ?>
            <div class="text-danger"><?= $errors['room_id'] ?></div>
          <?php endif; ?>
        </div>
        <div class="mb-3 col-6">
          <label for="Ext" class="form-label">Ext</label>
          <input type="text" class="form-control" id="Ext" name="Ext">
          <?php if(isset($errors['Ext'])): ?>
            <div class="text-danger"><?= $errors['Ext'] ?></div>
          <?php endif; ?>
        </div>
      </div>

      <div class="row">
        <div class="mb-3 col-6">
          <label for="iamge" class="form-label">Upload Image</label>
          <input type="file" class="form-control" id="image" name="image">
          <?php if(isset( $errors['image_type'])): ?>
            <div class="text-danger"><?=  $errors['image_type'] ?></div>
          <?php endif; ?>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
