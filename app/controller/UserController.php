<?php

class UserController extends Controller{

    public function registration(){
        $this->renderView('user/registration');
        
        if(!empty($_POST)){
            $user = new User();
            if($user->unique($_POST) == 0){
                $user->addUser($_POST);
                $this->renderView('user/registration', array('result' => $user->result)); //не понимаю зачем второй атрибут???
                return; //и что мы здесь возвращаем???
            }
            else{
                echo "Данный E-mail занят!";
            }
        }
    }
    
    public function login(){
        $authUser = new User();
        $authUser->auth($_POST); //метод авторизации с параметром пост
        $data = $authUser->showData; //через него получаем данные с базы - мыло, пароль и др.
        
        if (!empty($_POST) && $_POST['eMail'] == $data['e_mail'] && $_POST['password'] == $data['pass']) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['userName'] = $data['user_name'];
            $this->renderView('user/login', array('result' => $authUser->authResult));
            return;
        }
        if (!empty($_POST) && $_POST['eMail'] != $data['e_mail']) {
            $this->renderView('user/login', array('result' => 'Неверно введено имя или пароль!'));
            return;
        }
        if (empty($_POST) && !empty($_SESSION['id']) && !empty($_SESSION['userName'])) {
            $this->renderView('user/login', array('result' => $authUser->authResult));
        }
        $this->renderView('user/login');
    }
}