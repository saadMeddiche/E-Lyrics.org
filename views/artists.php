<?php
if (isset($_POST["idDelete"])) {
    $order = new ArtistsController();
    $order->deleteArtist();
}

if (isset($_POST["IdOfArtist"])) {
    // die(print_r($_POST["IdOfArtist"]));

    $_SESSION["IdOfArtist"] = $_POST["IdOfArtist"];
    Redirect::to('albums');
}

$data = new ArtistsController();
$artists = $data->getAllArtists();
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

                            <form method="post">
                                <input type="hidden" name="idDelete" value="<?php echo $artist->ID_Artist ?>">
                                <button class="btn btn-sm btn-danger" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-x"></i></button>
                            </form>

                            <form method="post">
                                <div role='button' class="card-body text-center" onclick="document.getElementById('viewAlbums<?php echo $artist->ID_Artist ?>').click()">
                                    <input type="hidden" name="IdOfArtist" value="<?php echo $artist->ID_Artist ?>">
                                    <h5 class="card-title"><?php echo $artist->Name_Artist ?></h5>
                                </div>
                                <button id="viewAlbums<?php echo $artist->ID_Artist ?>" hidden><i class="fa fa-eye"></i></button>
                            </form>

                        </div>
                    <?php endforeach; ?>

                </div>



            </div>
        </div>

    </div>
</div>