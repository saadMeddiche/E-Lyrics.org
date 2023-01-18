<?php
if (isset($_POST["Ajouter"])) {
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if ($url == "http://localhost/E-Lyrics.org/add?artist=758") {
        $order = new ArtistsController();
        $order->addArtists();
    } else {
        $order = new SongsController();
        $order->addSongs();
    }
}
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Ajouter</div>

                <div class="card-body bg-light">
                    <div class="d-flex flex-row justify-content-between">

                        <a href="./home" class="btn btn-sm btn-primary mr-2 mb-2">
                            <i class="fas fa-home">

                            </i>
                        </a>
                        <div class="d-flex">
                            <input type="number" name="Multiple" id="Multiple" min="1" placeholder="Multiple ...">
                            <button class="btn btn-sm btn-primary" name="duplicate" onclick="duplication(document.getElementById('Multiple').value)" type="submit"><i class="fas fa-x"></i></button>
                        </div>

                    </div>
                    <form method="post">
                        <input type="hidden" id="Train" name="Train">

                        <div class="Cards" id="Cards">

                        </div>

                        <!-- here -->
                </div>


                <div class="form-group p-2">
                    <button type="submit" name="Ajouter" class="btn btn-primary">Ajouter</button>
                </div>
                </form>


            </div>
        </div>
    </div>

</div>
</div>