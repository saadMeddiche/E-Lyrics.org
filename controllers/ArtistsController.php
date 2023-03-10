<?php

class ArtistsController
{
    public function getAllArtists()
    {
        $artists = Artist::getAll();
        return $artists;
    }

    public function addArtists()
    {


        $arr_artist = [];


        for ($i = 1; $i <= $_POST["Train"]; $i++) {

            array_push($arr_artist, $_POST["Artist" . $i]);
        }

        $data = array(
            'artists' => $arr_artist,
            'HowManyArtists' => $_POST["Train"]
        );

        Artist::add($data);

        Redirect::to('artists');
    }

    public function updateArtist()
    {
        $data = array(
            'id' => $_POST["IdOfArtist"],
            'Artist' => $_POST["NameOfArtist"]
        );

        Artist::update($data);
    }

    public function deleteArtist()
    {
        if (isset($_POST["idDelete"])) {
            Artist::delete($_POST["idDelete"]);
        }
    }


    public function findArtists()
    {
        if (isset($_POST["search"])) {
            $data = array(
                'search' => $_POST['search']
            );

            $songs = Artist::search($data);
            return $songs;
        }
    }
}
