<?php
if (isset($_POST["idDelete"])) {
    $order = new ArtistsController();
    $order->deleteArtist();
}

if (isset($_POST["GoToAlbums"])) {
    // die(print_r($_POST["IdOfArtist"]));

    $_SESSION["IdOfArtist"] = $_POST["IdOfArtist"];
    Redirect::to('albums');
}

if (isset($_POST["Update"])) {
    $order = new ArtistsController();
    $order->updateArtist();
}

if (isset($_POST["find"])) {
    $data = new ArtistsController();
    $artists = $data->findArtists();
} else {
    $data = new ArtistsController();
    $artists = $data->getAllArtists();
}

// die(print_r($artists));
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header text-center">Artists</div>

                <div class="container d-flex justify-content-between align-items-center p-2">
                    <div>
                        <a href="./add?artist=758" class="btn btn-sm btn-primary mr-2 ">
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
                    <?php foreach ($artists as $artist) : ?>
                        <div class="card w-20" style="width: 18rem;">
                            <div class="d-flex justify-content-between">
                                <form method="post">
                                    <input type="hidden" name="idDelete" value="<?php echo $artist->ID_Artist ?>">
                                    <button class="btn btn-sm btn-danger" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-x"></i></button>
                                </form>

                            </div>


                            <form method="post">

                                <div role='button' class="card-body text-center h-100" ondblclick="document.getElementById('viewAlbums<?php echo $artist->ID_Artist ?>').click()">
                                    <input type="hidden" name="IdOfArtist" value="<?php echo $artist->ID_Artist ?>">

                                    <h2 id="FrontValue<?php echo $artist->ID_Artist ?>"><?php echo $artist->Name_Artist ?></h2>

                                    <div class="d-flex" id="InputValueAndButtonOk<?php echo $artist->ID_Artist ?>" style="display:none">

                                        <input name="NameOfArtist" id="InputValue<?php echo $artist->ID_Artist ?>" class="text-center fs-5 font-weight-bold" value="<?php echo $artist->Name_Artist ?>" style="display:none">

                                        <button id="ButtonOk<?php echo $artist->ID_Artist ?>" type="submit" name="Update" style="display:none"><i class="fas fa-check"></i></button>

                                    </div>

                                </div>

                                <button type="submit" name="GoToAlbums" id="viewAlbums<?php echo $artist->ID_Artist ?>" hidden><i class="fa fa-eye"></i></button>
                            </form>

                            <div id="ButtonUpdate<?php echo $artist->ID_Artist ?>">
                                <button onclick="updateAnimation(<?php echo $artist->ID_Artist ?>,0)" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>



            </div>
        </div>

    </div>
</div>