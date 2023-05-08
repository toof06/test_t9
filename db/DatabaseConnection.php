<?php
namespace db;


use PDO;
use PDOException;

class DatabaseConnection extends PDO {
    private $host;
    private $username;
    private $password;
 

    private static $instance;
    private $connection;
    
    // Constructor is declared private to prevent creating new instances
    private function __construct() 
    {
        $this->host     = "localhost";
        $this->username = "root";
        $this->password = "";
    

        try {
            if(!$this->connection) {
                
                $this->connection = new PDO("mysql:host=$this->host;", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Read the .sql file
                $sql = file_get_contents('db_bosh_test.sql', __DIR__);
                // execute it
                $this->connection->exec($sql);
            }
            
           
          } catch(PDOException $e) {
            
            echo "Connection failed: " . $e->getMessage();
          }
        
    }
    
    // Use static method to get a singleton instance of DatabaseConnection
    public static function getInstance() {      
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    // Getter method for the database connection object
    public function getConnection() {
        return $this->connection;
    }
    
   
}
