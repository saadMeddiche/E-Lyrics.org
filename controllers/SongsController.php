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

    public function getSongsFromAlbum()
    {
        $songs = Song::getFromAlbum($_SESSION["IdOfAlbum"]);
        return $songs;
    }

    public function addSongs()
    {
        if (isset($_POST["Ajouter"])) {

            $arr_song = [];


            for ($i = 1; $i <= $_POST["Train"]; $i++) {
                array_push($arr_song, $_POST["Song" . $i]);
                array_push($arr_song, $_POST["Words" . $i]);
                array_push($arr_song, $_POST["Album" . $i]);
            }

            $data = array(
                'songs' => $arr_song,
                'HowManyalbums' => $_POST["Train"]
            );

            Song::add($data);
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

        if (isset($_POST["UpdateSong"])) {
            $data = array(
                'id' => $_POST['ID_Song'],
                'Song' => $_POST['Song'],
                'Artist' => $_SESSION["IdOfArtist"],
                'Album' => $_SESSION["IdOfAlbum"],
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

            $songs = Song::searchSongs($data);
            return $songs;
        }
    }
}
