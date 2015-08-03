<?php

class loginController extends BaseController {

    public function loginAction() {
        $this->setlayout('oneCol');
        $this->render('login/login');
    }

    public function indexAction() {
        $this->forward('login');
    }

    public function dologinAction() {
        session::set('user', ['sanil']);
        Notification::setMessage("WelCome Back !");
        $this->redirect(Request::createUrl('index', 'index'));
    }

    public function logoutAction() {
        session::flush();
        $this->redirect(Request::createUrl('login', 'login'));
    }

}
