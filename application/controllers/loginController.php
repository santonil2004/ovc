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
