<?php
class Song
{

    static public function getAll()
    {
        $requete = "SELECT * FROM `songs` INNER JOIN `albums` JOIN `artists` ON songs.ID_Album = albums.ID_Album and albums.ID_Artist = artists.ID_Artist";
        $stmt = DB::connect()->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getSong($data)
    {
        $requete = "SELECT * FROM `songs` INNER JOIN `albums` JOIN `artists` ON songs.ID_Album = albums.ID_Album and albums.ID_Artist = artists.ID_Artist WHERE ID_Song = " . $data["id"];
        $stmt = DB::connect()->prepare($requete);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
