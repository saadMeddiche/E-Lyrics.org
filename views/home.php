<?php
if (isset($_POST["logout"])) {
    UsersController::logout();
    Redirect::to('home');
}

if (isset($_POST["idDelete"])) {
    $order = new SongsController();
    $order->deleteSong();
}

if (isset($_POST['find'])) {
    $data = new SongsController();
    $songs = $data->findSongs();
} else {
    if (isset($_POST["triage"]) && !isset($_SESSION["before"])) {
        $data = new SongsController();
        $songs = array_reverse($data->getAllSongs());

        $_SESSION["before"] = "haha";
    } else {
        $data = new SongsController();
        $songs = $data->getAllSongs();

        unset($_SESSION["before"]);
    }
}




?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">

                    <form method="post">
                        <button name="logout" class="btn btn-sm btn-secondary mary mr-2 mb-2">
                            <i class="fas fa-user mr-2"><?php echo $_SESSION['username'] ?></i>
                        </button>
                    </form>


                    <a href="./add" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-plus">
                        </i>
                    </a>
                    <a href="./home" class="btn btn-sm btn-secondary mary mr-2 mb-2">
                        <i class="fas fa-home">
                        </i>
                    </a>

                    <form method="post" class="d-flex flex-row justify-content-end" action="">
                        <input type="text" name="search" placeholder="Recherche">
                        <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="d-flex justify-content-between align-items-center">
                                    Song

                                    <form method="post" class="d-flex align-items-center">
                                        <div class="">
                                            <?php if (1 == 0) { ?>
                                                <div class="d-flex align-items-center">
                                                    <i role="button" style="position:absolute;" class="fas fa-caret-up" onclick="document.getElementById('Xs72he').click()"></i>
                                                </div>
                                            <?php } ?>

                                            <?php if (1 == 0) { ?>

                                                <div class="d-flex align-items-center">
                                                    <i role="button" class="fas fa-caret-down" onclick="document.getElementById('Xs72he').click()"></i>
                                                </div>
                                            <?php } ?>

                                        </div>

                                        <button type="submit" name="triage" id="Xs72he" hidden></button>
                                    </form>
                                </th>
                                <th scope="col">Artist</th>
                                <th scope="col">Album</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($songs as $song) : ?>
                                <tr>
                                    <th scope="row" id="NameOfSong<?php echo $song->ID_Song ?>"><?php echo $song->Name_Song ?></th>
                                    <td id="NameOfArtist<?php echo $song->ID_Song ?>"><?php echo $song->Name_Artist ?></td>
                                    <td id="NameOfAlbum<?php echo $song->ID_Song ?>"><?php echo $song->Name_Album ?></td>

                                    <td class="d-flex flex-row gap-2">
                                        <form action="update" method="post">
                                            <input type="hidden" name="idUpdate" value="<?php echo $song->ID_Song ?>">
                                            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                        </form>
                                        <form method="post">
                                            <input type="hidden" name="idDelete" value="<?php echo $song->ID_Song ?>">
                                            <button class="btn btn-sm btn-danger" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <input type="hidden" name="wordsOfSong" id="wordsOFSong<?php echo $song->ID_Song ?>" value="<?php echo $song->Words_Song ?>">
                                        <button onclick="fillHome(<?php echo $song->ID_Song ?>)" class="btn btn-sm btn-success" data-bs-toggle="modal" href="#exampleModalToggle"><i class="fa fa-eye"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

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
                </div>
                <div class="form-group p-2">
                    <label for="Album">Album</label>
                    <input type="text" name="Album" id="Album" class="form-control" placeholder="Album">
                </div>
                <div class="form-group p-2">
                    <label for="Artist">Artist</label>
                    <input type="text" name="Artist" id="Artist" class="form-control" placeholder="Artist">
                </div>
                <div class="form-group p-2">
                    <label for="Words">Words</label>
                    <textarea style="height:150px;" type="text" name="Words" id="Words" class="form-control" placeholder="Words"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
            </div>
        </div>
    </div>
</div>