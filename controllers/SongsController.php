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

    public function addSongs()
    {
        if (isset($_POST["Ajouter"])) {
            $arr_artist = [];
            $arr_song = [];
            $arr_album = [];
            $arr_words = [];

            for ($i = 1; $i <= $_POST["Train"]; $i++) {

                array_push($arr_artist, $_POST["Artist" . $i]);
                array_push($arr_song, $_POST["Song" . $i]);
                array_push($arr_album, $_POST["Album" . $i]);
                array_push($arr_words, $_POST["Words" . $i]);
            }

            $data = array(
                'artists' => $arr_artist,
                'songs' => $arr_song,
                'albums' => $arr_album,
                'words' => $arr_words
            );

            Song::add($data);

            // print_r($data['artists'][0]);


            // print_r($arr_artist);
            // print_r($arr_song);
            // print_r($arr_album);
            // print_r($arr_words);

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
