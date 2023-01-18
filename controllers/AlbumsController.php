<?php

class AlbumsController
{

    public function getAllAlbums()
    {
        $artists = Album::getAll();
        return $artists;
    }

    public function getArtistAlbums()
    {
        $artists = Album::getAllArtist($_SESSION["IdOfArtist"]);
        return $artists;
    }

    public function addAlbums()
    {

        $arr_albums = [];


        for ($i = 1; $i <= $_POST["Train"]; $i++) {

            array_push($arr_albums, $_POST["Album" . $i]);
            array_push($arr_albums, $_SESSION["IdOfArtist"]);
        }

        $data = array(
            'albums' => $arr_albums,
            'HowManyalbums' => $_POST["Train"]
        );

        Album::add($data);
    }

    public function deleteAlbum()
    {
        if (isset($_POST["idDelete"])) {
            Album::delete($_POST["idDelete"]);
        }
    }
}
