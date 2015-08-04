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
class migrationController extends BaseController {

    public function init() {
        
    }

    public function usersAction() {
        $users = R::xdispense( 'users' );
    }

}
