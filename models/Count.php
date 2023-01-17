<?php
class Count
{
    static public function count()
    {
        $requete = "SELECT COUNT( DISTINCT Name_Artist) AS Num_Artist , COUNT( DISTINCT Name_Song) AS Num_Song , COUNT( DISTINCT Name_User) AS Num_User FROM  artists , songs,users;";

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
