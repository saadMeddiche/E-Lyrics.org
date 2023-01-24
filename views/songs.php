<?php
if (!isset($_SESSION["IdOfAlbum"])) {
    Redirect::to('home');
}
if (isset($_POST["idDelete"])) {
    $order = new SongsController();
    $order->deleteSong();
}

if (isset($_POST["UpdateSong"])) {
    $order = new SongsController();
    $order->updateSong();
}

if (isset($_POST["findSongOfAnAlbum"])) {
    $data = new SongsController();
    $Songs = $data->findSongs();
} else {
    $data = new SongsController();
    $Songs = $data->getSongsFromAlbum();
}



// die(print_r($_SESSION["IdOfArtist"]));

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header text-center big-title">Songs From <?php echo $_SESSION["NameOfAlbum"] ?></div>

                <div class="container d-flex flex-wrap justify-content-md-between justify-content-center align-items-center p-2 gap-2">
                    <div>
                        <a href="./add?songs=758" class="btn btn-sm btn-success mr-2 Add-Button">
                            <i class="fas fa-plus">
                            </i>
                        </a>
                        <a href="" class="btn btn-sm btn-success mary mr-2 Home-Button">
                            <i class="fas fa-repeat">
                            </i>
                        </a>
                        <a href="./albums" class="btn btn-sm btn-success mary mr-2 " style="border:3px solid #1C82AD;">
                            <i class="fas fa-arrow-left">
                            </i>
                        </a>

                    </div>
                    <div>
                        <form method="post" class="d-flex flex-row justify-content-md-end justify-content-center">
                            <input class="input-search rounded-start input-search-artists" type="text" name="search" placeholder="Search...">
                            <button class="btn btn-success btn-sm icon-search rounded-end" name="findSongOfAnAlbum" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                </div>

                <div class="card-body bg-light d-flex justify-content-center flex-wrap gap-3">
                    <?php foreach ($Songs as $Song) : ?>
                        <div class="card w-20 media-query-cards justify-content-between" style="width: 18rem;">
                            <form method="post">
                                <input type="hidden" name="idDelete" value="<?php echo  $Song->ID_Song ?>">
                                <button class="btn btn-sm btn-primary trash-button-of-card" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-trash"></i></button>
                            </form>
                            <div class="card-body text-center">
                                <h5 class="card-title" id="NameOfSong<?php echo  $Song->ID_Song ?>"><?php echo $Song->Name_Song ?></h5>
                                <input type="hidden" id="WordsOfSong<?php echo  $Song->ID_Song ?>" value="<?php echo $Song->Words_Song ?>">
                            </div>

                            <button onclick="fillSong(<?php echo  $Song->ID_Song ?>)" data-bs-toggle="modal" href="#exampleModalToggle" class="btn btn-sm btn-success update-button-od-card"><i class="fa fa-edit"></i></button>

                        </div>
                    <?php endforeach; ?>
                </div>



            </div>
        </div>

    </div>
</div>

<form method="POST">
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border:5px solid #1C82AD;">
                <div class="modal-header" style="border-bottom:4px solid #1C82AD; background-color:#03C988;">
                    <button type="button" class="" data-bs-dismiss="modal" aria-label="Close" style="background-color:#1C82AD; color:white; border-radius:5px; border:2px solid white;"><i class="fas fa-x"></i></button>

                </div>
                <div class="modal-body">
                    <div class="form-group p-2">
                        <label for="Song">Song</label>
                        <input type="text" name="Song" id="Song" class="form-control" placeholder="Song" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold; pointer-events: none;">
                        <input type="hidden" name="ID_Song" id="ID_Song">
                    </div>
                    <div class="form-group p-2">
                        <label for="Words">Words</label>
                        <textarea type="text" name="Words" id="words" class="form-control" placeholder="words" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold; pointer-events: none; height:150px;"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:4px solid #1C82AD;background-color:#03C988;">
                    <button type="submit" name="UpdateSong" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" style="background-color:#1C82AD; border:4px solid #1C82AD;"><b>Update</b></button>
                </div>
            </div>
        </div>
    </div>
</form>