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

    static public function update($data)
    {
        $requete = "UPDATE artists SET Name_Artist=:Name_Artist WHERE ID_Artist=:ID_Artist";

        $stmt = DB::connect()->prepare($requete);

        $stmt->bindParam(':ID_Artist', $data['id']);
        $stmt->bindParam(':Name_Artist', $data['Artist']);
       

        $stmt->execute();
    }

    static public function delete($id)
    {
        $stmt = DB::connect()->prepare("DELETE FROM `artists` WHERE ID_Artist =:id");
        $stmt->execute([":id" => $id]);
    }

    static public function search($data)
    {
        $search = $data["search"];

        $requete = "SELECT * FROM `artists` WHERE Name_Artist LIKE ? ";

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute(["%" . $search . "%"]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
