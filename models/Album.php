<?php
class Album
{
    static public function getAll()
    {

        $requete = "SELECT * FROM `albums`";

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getAllArtist($idOfArtist)
    {
        $requete = "SELECT * FROM `albums` WHERE ID_Artist=:ID_Artist";

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute(['ID_Artist' => $idOfArtist]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // static public function add($data)
    // {
    //     $requete = "INSERT INTO `artists`(`Name_Artist`) VALUES ";

    //     for ($i = 1; $i <= $data["HowManyArtists"]; $i++) {

    //         if ($data["HowManyArtists"] == $i) {
    //             $requete .= "(?)";
    //         } else {
    //             $requete .= "(?),";
    //         }
    //     }


    //     $stmt = DB::connect()->prepare($requete);

    //     $stmt->execute($data["artists"]);
    // }

    // static public function delete($id)
    // {
    //     $stmt = DB::connect()->prepare("DELETE FROM `artists` WHERE ID_Artist =:id");
    //     $stmt->execute([":id" => $id]);
    // }
}
