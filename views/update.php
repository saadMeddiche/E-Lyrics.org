<?php
if (isset($_POST["Update"])) {
    $order = new SongsController();
    $order->updateSong();
}

if (isset($_POST["idUpdate"])) {
    $data = new SongsController();
    $song = $data->getOneSong();
} else {
    Redirect::to("home");
}


?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Modifier le song</div>

                <div class="card-body bg-light">
                    <a href="./home" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-home">

                        </i>
                    </a>
                    <form method="post">
                        <input type="hidden" name="ID_Song" value="<?php echo $song->ID_Song ?>">
                        <div class="form-group p-2">
                            <label for="Artist">Artist</label>
                            <input type="text" name="Artist" class="form-control" placeholder="Artist" value="<?php echo $song->Name_Artist  ?>">
                        </div>
                        <div class="form-group p-2">
                            <label for="Song">Song</label>
                            <input type="text" name="Song" class="form-control" placeholder="Song" value="<?php echo $song->Name_Song ?>">
                        </div>
                        <div class="form-group p-2">
                            <label for="Album">Album</label>
                            <input type="text" name="Album" class="form-control" placeholder="Album" value="<?php echo $song->Name_Album ?>">
                        </div>
                        <div class="form-group p-2">
                            <label for="Words">Words</label>
                            <textarea style="height:150px" type="text" name="Words" class="form-control" placeholder="Words" value="<?php echo $song->Words_Song ?>"><?php echo $song->Words_Song ?></textarea>
                        </div>

                        <div class="form-group p-2">
                            <button type="submit" name="Update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>