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

        Db::connect();
        $bean = R::dispense('user'); // the redbean model

        $required = [
            'Name' => 'name', // post key + rule(s)
            'Email' => 'email',
            'User_Name' => ['rmnl', 'az_lower'],
            'Password' => 'password_hash',
        ];

        \RedBeanFVM\RedBeanFVM::registerAutoloader(); // for future use
        $fvm = \RedBeanFVM\RedBeanFVM::getInstance();

        $fvm->generate_model($bean, $required); //the magic

        R::store($bean);


        $val = new validation;
        $val->addSource($_POST)->addRule('email', 'email', true, 1, 255, true)
                ->addRule('password', 'string', true, 10, 150, false);
        $val->run();

        if (count($val->errors)) {

            Debug::r($val->errors);

            foreach ($val->errors as $error) {
                Notification::setMessage($error, Notification::TYPE_ERROR);
            }
            $this->redirect(Request::createUrl('login', 'login'));
        } else {
            Notification::setMessage("Welcome back !", Notification::TYPE_SUCCESS);
            Debug::r($val->sanitized);
            session::set('user', ['sanil']);
            $this->redirect(Request::createUrl('index', 'index'));
        }
    }

    public function logoutAction() {
        session::flush();
        $this->redirect(Request::createUrl('login', 'login'));
    }

}
