
<?php

class User
{

    static function login($username)
    {

        $requete = "SELECT * FROM `users` WHERE Name_User = :Name_User";
        $stmt = DB::connect()->prepare($requete);

        $stmt->execute([":Name_User" => $username]);

        $user = $stmt->fetch(PDO::FETCH_OBJ);
        
        return $user;
    }
}
