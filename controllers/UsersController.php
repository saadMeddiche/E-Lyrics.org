<?php
class UsersController
{
    public function authentification()
    {
        $result = User::login($_POST["username"]);

        if ($_POST['password'] === $result->Password_User) {

            $_SESSION['logged'] = true;
            $_SESSION['username'] = $result->Name_User;

            Redirect::to('home');
        } else {
            Redirect::to('login');
        }
    }
}
