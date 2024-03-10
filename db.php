<?php
class DB {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "cafeteria_project";
    private $connection = "";



    //open connection
    function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

    }

    //get connection
    function get_connection(){
      return  $this->connection;
    }

    //take data from table of database
    function get_data($table_name, $condition = 1){
        return $this-> connection->query("SELECT * FROM $table_name where $condition");
 
     }
 

     function insert_row($table_name, $data) {
      // Check if 'password' and 'confirm_password' fields exist and match
      if (isset($data['password']) && isset($data['confirm_password']) && $data['password'] === $data['confirm_password']) {
          // Hash the password
          $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
  
          // Insert the hashed password into the 'password_hash' column
          $data['password_hash'] = $hashed_password;
  
          // Remove the 'confirm_password' field from the data array
          unset($data['confirm_password']);
      } else {
          // If 'password' and 'confirm_password' do not match or are not set, return false
          return false;
      }
  
      // Prepare keys and values for insertion
      $keys = implode(", ", array_keys($data));
      $values = "'" . implode("', '", array_values($data)) . "'";
  
      // Build the SQL query
      $query = "INSERT INTO $table_name ($keys) VALUES ($values)";
  
      // Execute the query
      return $this->connection->query($query);
  }
  

  function delete_row($table_name, $condition){
    return $this->connection -> query("delete from $table_name where $condition") ;

}


}


?>