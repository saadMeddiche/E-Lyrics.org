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
}
