<?php

class SongsController
{
    public function getAllSongs()
    {
        $songs = Song::getAll();
        return $songs;
    }

    public function getOneSong()
    {
        if (isset($_POST["idUpdate"])) {
            $data = array(
                'id' => $_POST['idUpdate']
            );
            $song = Song::getSong($data);
            return $song;
        }
    }

    public function updateSong()
    {
        if (isset($_POST["Update"])) {
            $data = array(
                'id' => $_POST['ID_Song'],
                'Song' => $_POST['Song'],
                'Artist' => $_POST['Artist'],
                'Album' => $_POST['Album'],
                'Words' => $_POST['Words']
            );

            Song::update($data);
        }
    }

    public function deleteSong()
    {
        if (isset($_POST["idDelete"])) {
            Song::delete($_POST["idDelete"]);
        }
        
    }

    public function findSongs()
    {
        if (isset($_POST["search"])) {
            $data = array(
                'search' => $_POST['search']
            );

            $songs = Song::searchEmploye($data);
            return $songs;
        }
    }
}
