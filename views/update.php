<?php
if (isset($_POST["Update"])) {
    $order = new SongsController();
    $order->updateSong();
}

if (isset($_POST["idUpdate"])) {

    $data = new SongsController();
    $song = $data->getOneSong();

    $data = new AlbumsController();
    $albums = $data->getAllAlbums();
} else {
    Redirect::to("home");
}


?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header big-title text-center">Modifier le song</div>

                <div class="card-body bg-light">
                    <a href="./home" class="btn btn-sm btn-success mr-2 mb-2 Home-Button">
                        <i class="fas fa-home">

                        </i>
                    </a>

                    <form method="post">
                        <input type="hidden" name="ID_Song" value="<?php echo $song->ID_Song ?>">
                        <div class="form-group p-2">
                            <label for="Album">Album </label>
                            <select class="form-select" name="Album" aria-label="Default select example" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                                <option value="<?php echo $song->ID_Album ?>" selected><?php echo $song->Name_Album ?> [<?php echo $song->Name_Artist ?>]</option>
                                <?php foreach ($albums as $album) :
                                    if ($song->ID_Album != $album->ID_Album) { ?>
                                        <option value="<?php echo $album->ID_Album ?>"><?php echo $album->Name_Album ?> [<?php echo $album->Name_Artist ?>]</option>

                                <?php }
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group p-2">
                            <label for="Song">Song</label>
                            <input type="text" name="Song" class="form-control" placeholder="Song" value="<?php echo $song->Name_Song ?>" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                        </div>
                        <div class="form-group p-2">
                            <label for="Words">Words</label>
                            <textarea type="text" name="Words" class="form-control" placeholder="Words" value="<?php echo $song->Words_Song ?>" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;height:150px;"><?php echo $song->Words_Song ?></textarea>
                        </div>

                        <div class="form-group p-2">
                            <button type="submit" name="Update" class="btn btn-primary" style="background-color:#03C988;color:white;font-weight:bold;border:4px solid #1C82AD;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>