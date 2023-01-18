<?php
if (isset($_POST["idDelete"])) {
    $order = new SongsController();
    $order->deleteSong();
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
                                    <h5 class="card-title"><?php echo $Song->Name_Song ?></h5>
                                </div>
                            </div>
                    <?php endforeach; ?>
                </div>



            </div>
        </div>

    </div>
</div>