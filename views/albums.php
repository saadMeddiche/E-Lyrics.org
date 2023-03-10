<?php

if (!isset($_SESSION["IdOfArtist"])) {
    Redirect::to('home');
}

if (isset($_POST["idDelete"])) {
    $order = new AlbumsController();
    $order->deleteAlbum();
}

if (isset($_POST["GoToSongs"])) {

    $_SESSION["IdOfAlbum"] = $_POST["IdOfAlbum"];
    $_SESSION["NameOfAlbum"] = $_POST["NameOfAlbum"];
    Redirect::to('songs');
}

if (isset($_POST["Update"])) {
    $order = new AlbumsController();
    $order->updateAlbum();
}

if (isset($_POST["find"])) {
    $data = new AlbumsController();
    $Albums = $data->findAlbums();
} else {
    $data = new AlbumsController();
    $Albums = $data->getArtistAlbums();
}


// die(print_r($_SESSION["IdOfArtist"]));

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header text-center big-title">Albums Of <?php echo $_SESSION["NameOfArtist"] ?></div>

                <div class="container d-flex flex-wrap justify-content-md-between justify-content-center align-items-center p-2 gap-2">
                    <div>
                        <a href="./add?album=758" class="btn btn-sm btn-success mr-2 Add-Button">
                            <i class="fas fa-plus">
                            </i>
                        </a>
                        <a href="" class="btn btn-sm btn-success mary mr-2 Home-Button">
                            <i class="fas fa-repeat">
                            </i>
                        </a>
                        <a href="./artists" class="btn btn-sm btn-success mary mr-2 " style="border:3px solid #1C82AD;">
                            <i class="fas fa-arrow-left">
                            </i>
                        </a>

                    </div>
                    <div>
                        <form method="post" class="d-flex flex-row justify-content-md-end justify-content-center">
                            <input class="input-search rounded-start input-search-artists" type="text" name="search" placeholder="Search...">
                            <button class="btn btn-info btn-sm icon-search rounded-end" name="find" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                </div>

                <div class="card-body bg-light d-flex justify-content-center  flex-wrap gap-3">
                    <?php foreach ($Albums as $Album) : ?>
                        <div class="card w-20 media-query-cards justify-content-between" style="width: 18rem;">

                            <div class="d-flex justify-content-between">
                                <form method="post">
                                    <input type="hidden" name="idDelete" value="<?php echo $Album->ID_Album ?>">
                                    <button class="btn btn-sm btn-primary trash-button-of-card" onclick="var test='Are You Sure !' ; return confirm(test);" style="border-radius:1px 1px 5px 1px;"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>


                            <form method="post">

                                <div role='button' class="card-body text-center" ondblclick="document.getElementById('viewAlbums<?php echo $Album->ID_Album ?>').click()">

                                    <input type="hidden" name="IdOfAlbum" value="<?php echo $Album->ID_Album ?>">
                                    <h2 id="FrontValue<?php echo $Album->ID_Album ?>"><?php echo $Album->Name_Album ?></h2>
                                    <div class="d-flex justify-content-center w-full" id="InputValueAndButtonOk<?php echo $Album->ID_Album ?>" style="display:none">

                                        <input class="text-center fs-5 font-weight-bold h-100 rounded-start input-update" id="InputValue<?php echo $Album->ID_Album ?>" name="NameOfAlbum" value="<?php echo $Album->Name_Album ?>">
                                        <button class="rounded-end button-update" id="ButtonOk<?php echo $Album->ID_Album ?>" type="submit" name="Update"><i class="fas fa-check"></i></button>

                                    </div>
                                </div>
                                <button type="submit" name="GoToSongs" id="viewAlbums<?php echo $Album->ID_Album ?>" hidden><i class="fa fa-eye"></i></button>

                            </form>

                            <div id="ButtonUpdate<?php echo $Album->ID_Album ?>" class="w-100">
                                <button onclick="updateAnimation(<?php echo $Album->ID_Album ?>,0)" class="btn btn-sm btn-success  w-100 update-button-od-card"><i class="fa fa-edit"></i></button>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>



            </div>
        </div>

    </div>
</div>