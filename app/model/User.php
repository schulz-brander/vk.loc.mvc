<?php

class User extends DB{

    const DB_TABLE = 'users';

    public $db = false;
    public $result = false;
    public $authResult = false;
    public $showData = false;

    public function addUser($data) {
            $insert = $this->db->prepare('insert into ' . self::DB_TABLE . ' (user_name, e_mail, pass, dob) values (:userName, :eMail, :password, :dob)');
            $insert->bindParam(':userName', $data['userName']);
            $insert->bindParam(':eMail', $data['eMail']);
            $insert->bindParam(':password', $data['password']);
            $insert->bindParam(':dob', $data['dob']);
            
            try{
                $insert->execute();
                $this->result = 'Здравствуйте, ' . $data['userName'] . '. Вы успешно зарегистрировались!';
            } catch(Exception $e) {
                $this->result = $e->getMessage();
            }
    }

    public function unique($data){
            $check = $this->db->query('SELECT id FROM users WHERE e_mail="' . $data['eMail'] . '"');
            $rows = $check->rowCount();
            return $rows;
    }
    
    public function auth($data){
            $get = $this->db->prepare("SELECT id, user_name, e_mail, pass FROM users WHERE e_mail=:eMail AND pass=:password");
            $get->bindParam(':eMail', $data['eMail']);
            $get->bindParam(':password', $data['password']);
            $get->execute();
            $get->setFetchMode(PDO::FETCH_ASSOC);
            $this->showData = $get->fetch();
            
            if(empty($_SESSION['id']) && empty($_SESSION['userName'])){
                try{
                    $this->authResult = '(showData) Здравствуйте, ' . $this->showData['user_name'] . '! Ваш ID ' . $this->showData['id'];
                } catch(Exception $e) {
                    $this->authResult = $e->getMessage();
                }
            }else{
                $this->authResult = '(SESSION) Здравствуйте, ' . $_SESSION['userName'] . '! Ваш ID ' . $_SESSION['id'];
            }
    }
}