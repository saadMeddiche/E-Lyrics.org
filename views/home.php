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
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-between align-items-center gap-2 ">
                        <form method="post" class="d-flex align-items-center w-sm-100 h-100 gap-2">
                            <div class="btn btn-sm btn-success mary mr-2 " style="background-color:#03C988; border:5px solid #1C82AD;">
                                <b><i class="fas fa-user mr-2"></i> <?php echo $_SESSION['username'] ?></b>
                            </div>
                            <button name="logout" class="btn btn-sm btn-success mary mr-2 " style="background-color:#03C988; border:5px solid #1C82AD;">
                                <b>Logout </b>
                            </button>
                        </form>

                        <form method="post" class="d-flex flex-row justify-content-md-end justify-content-center align-items-center" action="">
                            <input class="rounded-start input-search input-search-artists" type="text" name="search" placeholder="Search ...">
                            <button class="btn btn-info btn-sm rounded-end icon-search" name="find" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>


                    <a href="./add" class="btn btn-sm btn-success mr-2 mt-2 Add-Button">
                        <i class="fas fa-plus Add-Button-icon">
                        </i>
                    </a>

                    <a href="./home" class="btn btn-sm btn-success mary mr-2 mt-2 Home-Button">
                        <i class="fas fa-repeat Home-Button-icon">
                        </i>
                    </a>



                    <div style="height:500px; overflow-x: scroll; overflow-y:scroll ">
                        <table class="table" style=" position: sticky; top: 0; width: 100%;">
                            <thead>
                                <tr class="">
                                    <th scope="col" class="titles">
                                        <div class="d-flex justify-content-between align-items-center">
                                            Song
                                            <form method="post" class="d-flex align-items-center">
                                                <div class="">
                                                    <?php if (1 == 1) { ?>
                                                        <div class="d-flex align-items-center" style="font-size: 15px;">
                                                            <i role="button" style="position:absolute;" class="fas fa-caret-up" onclick="document.getElementById('Xs72he').click()"></i>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (1 == 1) { ?>
                                                        <div class="d-flex align-items-center" style="font-size: 15px;">
                                                            <i role="button" class="fas fa-caret-down" onclick="document.getElementById('Xs72he').click()"></i>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <button type="submit" name="triage" id="Xs72he" hidden></button>
                                            </form>
                                        </div>

                                    </th>
                                    <th scope="col" class="titles">Artist</th>
                                    <th scope="col" class="titles">Album</th>
                                    <th scope="col" class="titles">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($songs as $song) : ?>
                                    <tr>
                                        <th scope="row" id="NameOfSong<?php echo $song->ID_Song ?>" class="Rows"><?php echo $song->Name_Song ?></th>
                                        <td id="NameOfArtist<?php echo $song->ID_Song ?>" class="Rows"><?php echo $song->Name_Artist ?></td>
                                        <td id="NameOfAlbum<?php echo $song->ID_Song ?>" class="Rows"><?php echo $song->Name_Album ?></td>

                                        <td class="Rows">
                                            <div class="d-flex flex-row gap-2 ">
                                                <form action="update" method="post">
                                                    <input type="hidden" name="idUpdate" value="<?php echo $song->ID_Song ?>">
                                                    <button class="btn btn-sm btn-warning "><i class="fa fa-edit"></i></button>
                                                </form>
                                                <form method="post">
                                                    <input type="hidden" name="idDelete" value="<?php echo $song->ID_Song ?>">
                                                    <button class="btn btn-sm btn-danger" onclick="var test='Are You Sure To Delete It ?' ; return confirm(test);"><i class="fa fa-trash"></i></button>
                                                </form>
                                                <input type="hidden" name="wordsOfSong" id="wordsOFSong<?php echo $song->ID_Song ?>" value="<?php echo $song->Words_Song ?>">
                                                <button onclick="fillHome(<?php echo $song->ID_Song ?>)" class="btn btn-sm btn-success" data-bs-toggle="modal" href="#exampleModalToggle"><i class="fa fa-eye"></i></button>
                                            </div>

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
</div>

<!-- ============================Mode Of Add Songs In Home Page============================ -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border:5px solid #1C82AD;">
            <div class="modal-header justify-content-center" style="border-bottom:4px solid #1C82AD; background-color:#03C988;">
                <h5 class="modal-title w-75 text-center text-white" id="exampleModalToggleLabel">by</h5>
            </div>
            <div class="modal-body">
                <!-- <div class="form-group p-2">
                    <label for="Artist">Artist</label>
                    <input type="text" name="Artist" id="Artist" class="form-control" placeholder="Artist">
                </div> -->
                <!-- <div class="form-group p-2">
                    <label for="Song">Song</label>
                    <input type="text" name="Song" id="Song" class="form-control" placeholder="Song">
                </div> -->
                <div class="form-group p-2">
                    <label for="Album" style="color: #1C82AD;"><b>Album</b></label>
                    <input type="text" name="Album" id="Album" class="form-control" placeholder="Album" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold; pointer-events: none;">
                </div>
                <div class="form-group p-2">
                    <label for="Words" style="color: #1C82AD;"><b>Words</b></label>
                    <textarea style="height:150px; border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;" type="text" name="Words" id="Words" class="form-control" placeholder="Words"></textarea>
                </div>
            </div>
            <div class="modal-footer " style="border-top:4px solid #1C82AD;background-color:#03C988;">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" style="background-color:#1C82AD; border:4px solid #1C82AD;"><b>Ok</b></button>
            </div>
        </div>
    </div>
</div>
<!-- ============================End Modal============================ -->