<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of indexController
 *
 * @author developer2
 */
class indexController extends BaseController {

    public function indexAction() {
        R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

        //R::freeze( true );
//            $w = R::dispense('whisky');
//            $w->name = 'test';
//            $id = R::store($w);
//            die("OK.\n");
//        $w = R::dispense('test');
//        $w['name'] = 'myname';
//        $w['email'] = 'email';
//        $w['email1'] = 'email';
//        $w['text'] = json_encode(array(1,2,3,4,5,6,7,8,9));
//        $w['created_date'] = date('Y-m-d H:i:s');
//        $id = R::store($w);
//
//        $books = R::findAll('test');
//        
//        
//        foreach ($books as $book) {
//            echo $book->key;
//           
//        }

//        $this->view->data = "from controller";
//        $this->view->footer = "Index footer";
//        $this->view->renderWidget('widget', ['data' => date("Y-m-d H:i:s")]);
        
        
       // $new = htmlspecialchars("", ENT_QUOTES);
        
        $x = date("y-m-d");
        
 
        
        


        $this->render('index');
    }

}
