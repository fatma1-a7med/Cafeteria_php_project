<!DOCTYPE html>
<html>
<head>
    <title>Employee Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
<div class="container">
    <h2>All Users Table</h2>
    <a href="register.php" class='btn btn-primary'>Add new Person</a>
    <table class="table table-light">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>Image</th>
                <!-- <th>Role</th> -->
                <th>Room_Number</th>
                <th>Ext</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            require("db.php");
            $db = new DB();
            $connection = $db->get_connection();

            if ($connection->connect_error){
                die("Failed to connect: " . $connection->connect_error);
            }

            try {
                $result = $db->get_data("users");
                while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$data['name']}</td>";
                    echo "<td>{$data['email']}</td>";
                    echo "<td><img class='img-fluid w-30' src='./imgs/{$data['image']}' alt=''/></td>";
                    echo "<td>{$data['room_id']}</td>";
                    echo "<td>{$data['Ext']}</td>";
                    echo "<td>
                            <a href='delete.php?id={$data['user_id']}' class='btn btn-danger'>DELETE</a>
                            <a href='update.php?id={$data['user_id']}' class='btn btn-success'>Edit</a>
                          </td>";
                    echo "</tr>";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
