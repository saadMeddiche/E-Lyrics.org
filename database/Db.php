<?php

class DB
{

    static public function connect()
    {


        try {

            $dbname = "e-lyrics.org";
            $username = 'root';
            $password = '';

            //PDO is an extention that help us to make a connection with the data base 
            $db       = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

            // $db->exec('set names utf8');

            return $db;
        } catch (PDOException $e) {

            print $e->getMessage();
            die();
        }
    }
}
