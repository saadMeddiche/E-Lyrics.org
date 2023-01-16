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

    //https://stackoverflow.com/questions/15209414/how-can-i-do-three-table-joins-in-an-update-query
    static public function update($data)
    {

        // $requete = "UPDATE songs s JOIN albums al ON s.ID_Album = al.ID_Album SET s.Name_Song=:Name_Song, s.Words_Song=:Words_Song, al.Name_Album=:Name_Album WHERE s.ID_Song =:ID_Song";

        $requete = "UPDATE songs s JOIN albums al JOIN artists ar ON s.ID_Album = al.ID_Album AND al.ID_Artist = ar.ID_Artist SET s.Name_Song=:Name_Song, s.Words_Song=:Words_Song, al.Name_Album=:Name_Album ,ar.Name_Artist=:Name_Artist WHERE s.ID_Song =:ID_Song";

        $stmt = DB::connect()->prepare($requete);

        $stmt->bindParam(':ID_Song', $data['id']);
        $stmt->bindParam(':Name_Song', $data['Song']);
        $stmt->bindParam(':Words_Song', $data['Words']);
        $stmt->bindParam(':Name_Artist', $data['Artist']);
        $stmt->bindParam(':Name_Album', $data['Album']);

        $stmt->execute();
    }

    static public function searchEmploye($data)
    {
        $search = $data["search"];

        $requete = "SELECT * FROM `songs` INNER JOIN `albums` JOIN `artists` ON songs.ID_Album = albums.ID_Album and albums.ID_Artist = artists.ID_Artist WHERE artists.Name_Artist LIKE ? OR songs.Name_Song LIKE ? OR albums.Name_Album LIKE ?";

        $stmt = DB::connect()->prepare($requete);

        $stmt->execute(["%" . $search . "%", "%" . $search . "%", "%" . $search . "%"]);
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
