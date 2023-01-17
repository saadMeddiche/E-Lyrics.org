<?php
class UsersController
{
    public function NoEmptyInputs()
    {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            return false;
        } else {
            return true;
        }
    }

    public function valideName()
    {
        if (!preg_match("/^[a-zA-Z\s]*$/", $_POST["username"])) {
            return false;
        } else {
            return true;
        }
    }

    public function LengthName()
    {
        if (strlen($_POST["username"]) > 20) {
            return false;
        } else {
            return true;
        }
    }

    public function LengthPassword()
    {
        if (strlen($_POST["password"]) < 8) {
            return false;
        } else {
            return true;
        }
    }

    public function NotTheSame()
    {
        if ($_POST["password"] === $_POST["username"]) {
            return false;
        } else {
            return true;
        }
    }

    public function confirmationOfLogin()
    {
        if ($this->NoEmptyInputs() === false) {
            $_SESSION["messageOfLogin"] = "Please fill the blancs with your information first";
            Redirect::to("login");
            exit();
        }

        if ($this->valideName() === false) {
            $_SESSION["messageOfLogin"] = "Remembere ! The username should contain only  a-z and A-Z";
            Redirect::to("login");
            exit();
        }



        if ($this->LengthName() === false) {
            $_SESSION["messageOfLogin"] = "The username shouldn't be more then 20 lettere";
            Redirect::to("login");
            exit();
        }

        if ($this->LengthPassword() === false) {
            $_SESSION["messageOfLogin"] = "The Password shouldn't be Less then 8";
            Redirect::to("login");
            exit();
        }

        if ($this->NotTheSame() === false) {
            $_SESSION["messageOfLogin"] = "The Password and the Username shouldn't be The same";
            Redirect::to("login");
            exit();
        }
    }

    public function authentification()
    {

        $this->confirmationOfLogin();

        $result = User::login($_POST["username"]);

        if ($result == null) {

            $_SESSION["messageOfLogin"] = "This username do not exist";

            Redirect::to('login');

            exit();
        }


        if ($_POST['password'] === $result->Password_User) {

            $_SESSION['logged'] = true;
            $_SESSION['username'] = $result->Name_User;

            Redirect::to('home');
        } else {

            $_SESSION["messageOfLogin"] = "The Password Is incorrect";
            Redirect::to('login');

            //I don't know why i need exit() , i just try it and it worked :D
            exit();
        }
    }

    static public function logout()
    {
        session_destroy();
    }
}
