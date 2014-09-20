<?php

class UserController extends Controller{

    public function registration(){
        
        if(!empty($_POST)){
            $user = new User();
            if($user->unique($_POST) == 0){
                $user->addUser($_POST);
                return $this->renderView('user/registration', array('result' => $user->result));
            }
            else{
                header('Refresh: 5');
                return $this->renderView('user/registration', 
                                        array('result' => "Данный E-mail занят! Через 5 сек Вы будете перенаправлены на страницу "
                                            . "регистрации. <a href='index.php?r=user&a=registration'>Не ждать!</a>"));
            }
        }
    $this->renderView('user/registration');
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
        
    public function logout(){
        $userLogOut = new User;
        $userLogOut->goOut();
        $this->renderView('user/logout');
    }
}