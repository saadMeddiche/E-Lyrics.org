<?php

class Artist
{
    static public function getAll()
    {

        $requete = "SELECT * FROM `artists`";

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function add($data)
    {
        $requete = "INSERT INTO `artists`(`Name_Artist`) VALUES ";

        for ($i = 1; $i <= $data["HowManyArtists"]; $i++) {

            if ($data["HowManyArtists"] == $i) {
                $requete .= "(?)";
            } else {
                $requete .= "(?),";
            }
        }


        $stmt = DB::connect()->prepare($requete);

        $stmt->execute($data["artists"]);
    }

    static public function delete($id)
    {
        $stmt = DB::connect()->prepare("DELETE FROM `artists` WHERE ID_Artist =:id");
        $stmt->execute([":id" => $id]);
    }
}
