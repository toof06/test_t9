<?php
namespace tests;

use App\controller\ContactController;
use App\helpers\T9;
use db\DatabaseConnection;
use PHPUnit\Framework\TestCase;



class ContactControllerTest extends TestCase{
    use T9;


    public function testsearchData()
    {
        $fackData = "683";
        $contact = new ContactController();
        $sql = $contact->getCombinations($fackData);
        $db = DatabaseConnection::getInstance()->getConnection();
        $result = $db->query($sql);
        $this->assertEquals($this->getExampleData(), $result->fetchAll());
          
    }

    public function getExampleData()
    {
        return  Array (
                0 => Array (
                        'id' => 2,
                        'first_name' => 'toufik',
                        'last_name' => 'Ben',
                        'phone_number' => '017655443322',
                        0 => 2,
                        1 => 'toufik',
                        2 => 'Ben',
                        3 => '017655443322'
                    )
                );
    }

}