<?php
if (isset($_POST["idDelete"])) {
    $order = new SongsController();
    $order->deleteSong();
}

if(isset($_POST["UpdateSong"])){
    $order = new SongsController();
    $order->updateSong();
}

$data = new SongsController();
$Songs = $data->getSongsFromAlbum();


// die(print_r($_SESSION["IdOfArtist"]));

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header text-center">Songs</div>

                <div class="container d-flex justify-content-between align-items-center p-2">
                    <div>
                        <a href="./add?songs=758" class="btn btn-sm btn-primary mr-2 ">
                            <i class="fas fa-plus">
                            </i>
                        </a>
                        <a href="./home" class="btn btn-sm btn-secondary mary mr-2 ">
                            <i class="fas fa-home">
                            </i>
                        </a>

                    </div>
                    <div>
                        <form method="post" class="d-flex flex-row justify-content-end">
                            <input type="text" name="search" placeholder="Recherche">
                            <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                </div>

                <div class="card-body bg-light d-flex flex-wrap gap-3">
                    <?php foreach ($Songs as $Song) : ?>
                        <div class="card w-20" style="width: 18rem;">
                            <form method="post">
                                <input type="hidden" name="idDelete" value="<?php echo  $Song->ID_Song ?>">
                                <button class="btn btn-sm btn-danger" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-x"></i></button>
                            </form>
                            <div class="card-body text-center">
                                <h5 class="card-title" id="NameOfSong<?php echo  $Song->ID_Song ?>"><?php echo $Song->Name_Song ?></h5>
                                <input type="hidden" id="WordsOfSong<?php echo  $Song->ID_Song ?>" value="<?php echo $Song->Words_Song ?>">
                            </div>

                            <button onclick="fillSong(<?php echo  $Song->ID_Song ?>)" data-bs-toggle="modal" href="#exampleModalToggle" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>

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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group p-2">
                        <label for="Song">Song</label>
                        <input type="text" name="Song" id="Song" class="form-control" placeholder="Song">
                        <input type="hidden" name="ID_Song" id="ID_Song">
                    </div>
                    <div class="form-group p-2">
                        <label for="Words">Words</label>
                        <textarea style="height:150px" type="text" name="Words" id="words" class="form-control" placeholder="words"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="UpdateSong" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>