<?php
namespace App\controller;

use App\helpers\T9;
use db\DatabaseConnection;
use Exception;

class ContactController {
    use T9;
    
  
    /**
     * get all data 
     * @return array
     */
    public static function getAll()
    {
        $db = DatabaseConnection::getInstance()->getConnection();
        $sql = "SELECT * FROM contact ORDER BY id DESC";
        $result = $db->query($sql);
        return $result->fetchAll();
    }

    /**
     * this function make treatment of searching data 
     * @return array 
     */
    public function searchData($posts)
    {
        try {         
            if (str_contains($posts, 0) || str_contains($posts, 1)) {
                dd("please give a valid integer between 2 and 9");
            
            } else {
                $db = DatabaseConnection::getInstance()->getConnection();
                $sql = $this->getCombinations($posts);
                $result = $db->query($sql);
                return $result->fetchAll();          
            }

        } catch (Exception $e) {
            echo "Error caught: " . $e->getMessage();
            header("Refresh: 10");
        }
              
    }

    /**
     * this function insert data 
     * @return boolean  
     */
    public function insertData(array $posts)
    {
        try {         
            $db = DatabaseConnection::getInstance()->getConnection();
            $stmt = $db->prepare("INSERT INTO `contact` (first_name, last_name,phone_number) VALUES (:first_name, :last_name,:phone_number)");
            $stmt->bindParam(':first_name', $posts['first_name']);
            $stmt->bindParam(':last_name', $posts['last_name']);
            $stmt->bindParam(':phone_number', $posts['phone_number']);
            $stmt->execute();

        } catch (Exception $e) {
            echo "Error caught: " . $e->getMessage();
            header("Refresh: 10");
        }
              
    }



}