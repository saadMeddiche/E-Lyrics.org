<?php
if (isset($_POST["idDelete"])) {
    $order = new ArtistsController();
    $order->deleteArtist();
}

if (isset($_POST["GoToAlbums"])) {
    // die(print_r($_POST["IdOfArtist"]));

    $_SESSION["IdOfArtist"] = $_POST["IdOfArtist"];
    $_SESSION["NameOfArtist"] = $_POST["NameOfArtist"];
    //     echo "<script>
    // window.location = './albums'
    // </script>";
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
                <div class="card-header text-center big-title">Artists</div>

                <div class="container d-flex flex-wrap justify-content-center justify-content-md-between align-items-center p-2 gap-2">

                    <div>
                        <a href="./add?artist=758" class="btn btn-sm btn-success mr-2 Add-Button">
                            <i class="fas fa-plus Add-Button-icon">
                            </i>
                        </a>
                        <a href="" class="btn btn-sm btn-success mary mr-2 Home-Button">
                            <i class="fas fa-repeat ">
                            </i>
                        </a>
                        <a href="./home" class="btn btn-sm btn-success mary mr-2 " style="border:3px solid #1C82AD;">
                            <i class="fas fa-arrow-left">
                            </i>
                        </a>
                    </div>

                    <div class="">
                        <form method="post" class="d-flex flex-row justify-content-md-end justify-content-center ">
                            <input class="rounded-start input-search input-search-artists" type="text" name="search" placeholder="Search...">
                            <button class="btn btn-success btn-sm rounded-end icon-search" name="find" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                </div>

                <div class="card-body bg-light d-flex flex-wrap justify-content-center  gap-3">
                    <?php foreach ($artists as $artist) : ?>
                        <div class="card w-20 media-query-cards" style="width: 18rem;">
                            <div class="d-flex justify-content-between">
                                <form method="post">
                                    <input type="hidden" name="idDelete" value="<?php echo $artist->ID_Artist ?>">
                                    <button class="btn btn-sm btn-primary trash-button-of-card" style="border-radius:1px 1px 5px 1px;" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-trash"></i></button>
                                </form>

                            </div>

                            <div>
                                <form method="post">

                                    <div role='button' class="card-body text-center h-100" ondblclick="document.getElementById('viewAlbums<?php echo $artist->ID_Artist ?>').click()">
                                        <input type="hidden" name="IdOfArtist" value="<?php echo $artist->ID_Artist ?>">

                                        <h2 id="FrontValue<?php echo $artist->ID_Artist ?>"><?php echo $artist->Name_Artist ?></h2>

                                        <div class="d-flex justify-content-center mt-2" id="InputValueAndButtonOk<?php echo $artist->ID_Artist ?>" style="display:none;">

                                            <input name="NameOfArtist" id="InputValue<?php echo $artist->ID_Artist ?>" class="text-center fs-5 font-weight-bold rounded-start input-update" value="<?php echo $artist->Name_Artist ?>">

                                            <button class="rounded-end button-update" id="ButtonOk<?php echo $artist->ID_Artist ?>" type="submit" name="Update"><i class="fas fa-check"></i></button>

                                        </div>

                                    </div>

                                    <button type="submit" name="GoToAlbums" id="viewAlbums<?php echo $artist->ID_Artist ?>" hidden><i class="fa fa-eye"></i></button>
                                </form>
                            </div>


                            <div id="ButtonUpdate<?php echo $artist->ID_Artist ?>" class="w-100">
                                <button onclick="updateAnimation(<?php echo $artist->ID_Artist ?>,0)" class="btn btn-sm btn-success w-100 update-button-od-card"><i class="fa fa-edit"></i></button>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>



            </div>
        </div>

    </div>
</div>