<?php
if (isset($_POST["idDelete"])) {
    $order = new AlbumsController();
    $order->deleteAlbum();
}

$data = new AlbumsController();
$Albums = $data->getArtistAlbums();

// die(print_r($_SESSION["IdOfArtist"]));

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header text-center">Artists</div>

                <div class="container d-flex justify-content-between align-items-center p-2">
                    <div>
                        <a href="./add?album=758" class="btn btn-sm btn-primary mr-2 ">
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
                    <?php foreach ($Albums as $Album) : ?>
                        <a href="./albums">
                            <div class="card w-20" style="width: 18rem;">
                                <div class="card-body text-center">

                                    <form method="post">
                                        <input type="hidden" name="idDelete" value="<?php echo $Album->ID_Album ?>">
                                        <button class="btn btn-sm btn-danger" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-trash"></i></button>
                                    </form>

                                    <h5 class="card-title"><?php echo $Album->Name_Album ?></h5>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>

                </div>



            </div>
        </div>

    </div>
</div>