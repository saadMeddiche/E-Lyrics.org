<?php

class DB
{

    static public function connect()
    {

        try {

            $dbname = "e-lyrics.org";
            $username = 'root';
            $password = '';

            //PDO is an library that help us to make a connection with the data base 
            $db = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

            return $db;
            
        } catch (Exception $e) {
            print $e->getMessage();
            die();
        }
    }
}
