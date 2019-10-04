<?php

namespace Main\Models;

class User
{
    public function createUser($db,$first_name,$last_name,$email,$encrypted_password){
        $db->execute("INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)", [$first_name, $last_name, $email, $encrypted_password]);
    }

    public function register($db)
    {
        if (isset($_POST['submit'])) {
            $first_name = $_POST['first-name'];
            $last_name = $_POST['last-name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password-confirmation'];
          //  echo $this->verifyEmail($email);
            if (($password_confirmation === $password) and ($this->verifyEmail($email))){

                $encrypted_password = sha1($password);
                $this->createUser($db,$first_name,$last_name,$email,$encrypted_password);
                header('Location: /login/success');
            } else {
                header('Location: /register/error');
            }
        }
    }

    public function verifyEmail($email){
        $exp = explode("@", $email);
        if(strpos($exp[1],'.') == false){
            return false;
        }else{
            return true;
        }
    }

    public function login($db)
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $response = $db->query("SELECT * FROM user WHERE email = ? AND password = ?", [$email, sha1($password)]);
            $length = sizeof($response);
            if ($length == 1) {
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $response[0]['id'];
                $_SESSION['first_name'] = $response[0]['first_name'];
                $_SESSION['last_name'] = $response[0]['last_name'];
                $_SESSION['email'] = $response[0]['email'];
                $_SESSION['level'] = (int)$response[0]['level'];
                header('Location: /home/success');
            } else {
                header('Location: /login/error');
            }
        }
    }

}
