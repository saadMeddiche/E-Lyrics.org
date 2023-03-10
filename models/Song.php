<?php
class Song
{

    static public function getAll()
    {
        $requete = "SELECT * FROM `songs` INNER JOIN `albums` JOIN `artists` ON songs.ID_Album = albums.ID_Album and albums.ID_Artist = artists.ID_Artist ORDER BY  Name_Song";
        $stmt = DB::connect()->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getFromAlbum()
    {
        $requete = "SELECT * FROM `songs` WHERE ID_Album=:Id_Album";
        $stmt = DB::connect()->prepare($requete);
        $stmt->execute(['Id_Album' => $_SESSION["IdOfAlbum"]]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getSong($data)
    {
        $requete = "SELECT * FROM `songs` INNER JOIN `albums` JOIN `artists` ON songs.ID_Album = albums.ID_Album and albums.ID_Artist = artists.ID_Artist WHERE ID_Song = " . $data["id"];
        $stmt = DB::connect()->prepare($requete);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    static public function add($data)
    {
        $requete = "INSERT INTO `songs`(`Name_Song`,`Words_Song`,`ID_Album`) VALUES ";

        for ($i = 1; $i <= $data["HowManyalbums"]; $i++) {

            if ($data["HowManyalbums"] == $i) {
                $requete .= "(?,?,?)";
            } else {
                $requete .= "(?,?,?),";
            }
        }

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute($data["songs"]);
    }

    //https://stackoverflow.com/questions/15209414/how-can-i-do-three-table-joins-in-an-update-query
    static public function update($data)
    {

        // $requete = "UPDATE songs s JOIN albums al ON s.ID_Album = al.ID_Album SET s.Name_Song=:Name_Song, s.Words_Song=:Words_Song, al.Name_Album=:Name_Album WHERE s.ID_Song =:ID_Song";

        $requete = "UPDATE songs SET Name_Song=:Name_Song, Words_Song=:Words_Song, ID_Album=:ID_Album  WHERE ID_Song =:ID_Song";

        $stmt = DB::connect()->prepare($requete);

        $stmt->bindParam(':ID_Song', $data['id']);
        $stmt->bindParam(':Name_Song', $data['Song']);
        $stmt->bindParam(':Words_Song', $data['Words']);
        $stmt->bindParam(':ID_Album', $data['Album']);

        $stmt->execute();
    }

    static public function delete($id)
    {
        $stmt = DB::connect()->prepare("DELETE FROM `songs` WHERE ID_Song =:id");
        $stmt->execute([":id" => $id]);
    }

    static public function searchSongs($data)
    {
        if (isset($_POST["findSongOfAnAlbum"])) {
            $search = $data["search"];

            $requete = "SELECT * FROM `songs` WHERE ID_Album=? AND Name_Song LIKE ? ";

            $stmt = DB::connect()->prepare($requete);

            $stmt->execute([$_SESSION["IdOfAlbum"], "%" . $search . "%"]);

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            $search = $data["search"];

            $requete = "SELECT * FROM `songs` INNER JOIN `albums` JOIN `artists` ON songs.ID_Album = albums.ID_Album and albums.ID_Artist = artists.ID_Artist WHERE artists.Name_Artist LIKE ? OR songs.Name_Song LIKE ? OR albums.Name_Album LIKE ?";

            $stmt = DB::connect()->prepare($requete);

            $stmt->execute(["%" . $search . "%", "%" . $search . "%", "%" . $search . "%"]);

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
}
