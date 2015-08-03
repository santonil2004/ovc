<?php

/**
 * Notification class for flash messege
 * @package Model
 * @example notification::setMessage('some msg');
 * @author Sanil Shrestha <web.developer.sanil@gmail.com>
 */
class Notification {

    CONST TYPE_ERROR = 'error';
    CONST TYPE_SUCCESS = 'success';
    CONST TYPE_WARNING = 'warning';

    /**
     * set flash messege
     * @param type $message
     * @param type $type
     */
    public static function setMessage($message, $type = self::TYPE_ERROR) {
        $message = array('message' => $message, 'type' => $type);

        $notifications = Session::get('notification_message');

        if (!is_array($notifications)) {
            $notifications = array();
        }

        array_push($notifications, $message);

        Session::set('notification_message', $notifications);
    }

    /**
     * get appropriate template 
     * @param type $message
     * @return string
     */
    public static function getTemplate($message) {
        $type = $message['type'];
        $msg = $message['message'];

        switch ($type) {
            case self::TYPE_ERROR;
                $class = 'alert-danger';
                break;
            case self::TYPE_SUCCESS;
                $class = 'alert-success';
                break;
            case self::TYPE_WARNING;
                $class = 'alert-warning';
                break;
            default:
                $class = 'alert-info';
                $type = 'error';
                break;
        }
        $html = '<div class="alert ' . $class . '">';
        $html.='<span style="float:left" class="notificaion-hide"><img src="assets/images/' . $type . '.png"></span>';
        $html.='<strong style="padding:0px 10px;">' . $msg . '</strong>';
        $html.='<span style="float:right" class="notificaion-hide"><img src="assets/images/close.png"></span>';
        $html.='</div>';

        return $html;
    }

    /**
     * get flash messege
     */
    public static function getMessage() {
        if (Session::check('notification_message')) {
            $notifications = Session::get('notification_message');

            foreach ($notifications as $notification) {
                echo self::getTemplate($notification);
            }

            Session::delete('notification_message');
        }
    }

    /**
     * delete flash messege
     */
    public static function deleteMessage() {
        if (SessionClass::check('notification_message')) {
            SessionClass::delete('notification_message');
        }
    }

}
