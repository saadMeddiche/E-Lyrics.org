<?php
class Album
{
    static public function getAll()
    {

        $requete = "SELECT * FROM `albums` INNER JOIN `artists` ON albums.ID_Artist = artists.ID_Artist";

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

    static public function add($data)
    {
        $requete = "INSERT INTO `albums`(`Name_Album`,`ID_Artist`) VALUES ";

        for ($i = 1; $i <= $data["HowManyalbums"]; $i++) {

            if ($data["HowManyalbums"] == $i) {
                $requete .= "(?,?)";
            } else {
                $requete .= "(?,?),";
            }
        }


        $stmt = DB::connect()->prepare($requete);

        $stmt->execute($data["albums"]);
    }

    static public function update($data)
    {
        $requete = "UPDATE albums SET Name_Album=:Name_Album WHERE ID_Album=:ID_Album";

        $stmt = DB::connect()->prepare($requete);

        $stmt->bindParam(':ID_Album', $data['id']);
        $stmt->bindParam(':Name_Album', $data['Album']);


        $stmt->execute();
    }

    static public function delete($id)
    {
        $stmt = DB::connect()->prepare("DELETE FROM `albums` WHERE ID_Album =:id");
        $stmt->execute([":id" => $id]);
    }
    
    static public function search($data)
    {
        $search = $data["search"];

        $requete = "SELECT * FROM `albums` WHERE Name_Album LIKE ? ";

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute(["%" . $search . "%"]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
