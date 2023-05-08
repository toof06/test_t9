<?php


require_once __DIR__."/vendor/autoload.php";

use App\controller\ContactController;




if (!empty($_POST) && isset($_POST)) :

    //search method 
    if(isset($_POST['search'])) {
        $searchData = $_POST['search'];
        $contacts = new ContactController();
        $datas = $contacts->searchData($searchData);
        include __DIR__."/src/template/layout.php";
    }else {
        $contact = new ContactController();
        $contact->insertData($_POST);
        if(true) {
            $datas = ContactController::getAll();
            include __DIR__."/src/template/layout.php";
        }else {
            dd("something was wrong, please try again ");
        }
                
    }
    
else :
    $datas = ContactController::getAll();
    require __DIR__."/src/template/layout.php";
    
endif;