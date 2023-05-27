<?php
namespace tests;

use App\controller\ContactController;
use App\helpers\T9;
use PHPUnit\Framework\TestCase;



class ContactControllerTest extends TestCase{
    use T9;

    
    public function testgetInput()
    {
        $testInputs = "683";
        $contact = new ContactController();
        $input = $contact->getInput($testInputs);
        $this->assertIsArray($input);
    }
    public function testgetCombination()
    {
        $testInputs = "683";
        $contact = new ContactController();
        $testedValue = $contact->getCombinations($testInputs);
        $this->assertEquals(27, count($testedValue));              

    }
    public function testsearchData()
    {
        $testInputs = "683";
        $contact = new ContactController();
        $sql = $contact->getSqlStatement($testInputs);
        // $this->assertIsString($sql);
        $this->assertEquals($this->getSqlStatementDataExample(), $sql);              
    }


    public function getSqlStatementDataExample()
    {
        return  "SELECT * FROM contact WHERE first_name LIKE '%mtd%' OR first_name LIKE '%mte%' OR first_name LIKE '%mtf%' OR first_name LIKE '%mud%' OR first_name LIKE '%mue%' OR first_name LIKE '%muf%' OR first_name LIKE '%mvd%' OR first_name LIKE '%mve%' OR first_name LIKE '%mvf%' OR first_name LIKE '%ntd%' OR first_name LIKE '%nte%' OR first_name LIKE '%ntf%' OR first_name LIKE '%nud%' OR first_name LIKE '%nue%' OR first_name LIKE '%nuf%' OR first_name LIKE '%nvd%' OR first_name LIKE '%nve%' OR first_name LIKE '%nvf%' OR first_name LIKE '%otd%' OR first_name LIKE '%ote%' OR first_name LIKE '%otf%' OR first_name LIKE '%oud%' OR first_name LIKE '%oue%' OR first_name LIKE '%ouf%' OR first_name LIKE '%ovd%' OR first_name LIKE '%ove%' OR first_name LIKE '%ovf%' OR last_name LIKE '%mtd%' OR last_name LIKE '%mte%' OR last_name LIKE '%mtf%' OR last_name LIKE '%mud%' OR last_name LIKE '%mue%' OR last_name LIKE '%muf%' OR last_name LIKE '%mvd%' OR last_name LIKE '%mve%' OR last_name LIKE '%mvf%' OR last_name LIKE '%ntd%' OR last_name LIKE '%nte%' OR last_name LIKE '%ntf%' OR last_name LIKE '%nud%' OR last_name LIKE '%nue%' OR last_name LIKE '%nuf%' OR last_name LIKE '%nvd%' OR last_name LIKE '%nve%' OR last_name LIKE '%nvf%' OR last_name LIKE '%otd%' OR last_name LIKE '%ote%' OR last_name LIKE '%otf%' OR last_name LIKE '%oud%' OR last_name LIKE '%oue%' OR last_name LIKE '%ouf%' OR last_name LIKE '%ovd%' OR last_name LIKE '%ove%' OR last_name LIKE '%ovf%'";
    }

}