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

        if (isset($_POST["Ajouter"])) {

            $arr_artist = [];


            for ($i = 1; $i <= $_POST["Train"]; $i++) {

                array_push($arr_artist, $_POST["Artist" . $i]);
            }

            $data = array(
                'artists' => $arr_artist,
                'HowManyArtists' => $_POST["Train"]
            );

            Artist::add($data);

            // print_r($data['artists'][0]);


            // print_r($arr_artist);
            // print_r($arr_song);
            // print_r($arr_album);
            // print_r($arr_words);

        }
    }

    public function deleteArtist()
    {
        if (isset($_POST["idDelete"])) {
            Artist::delete($_POST["idDelete"]);
        }
    }
}
