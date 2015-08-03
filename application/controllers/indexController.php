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

    public function init() {
        if (!session::check('user')) {
            $this->redirect(Request::createUrl('login', 'login'));
        }
    }

    public function indexAction() {
        $this->view->msg = "Wel Come";
        $this->render('index/index');
    }

}
