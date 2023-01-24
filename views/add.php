<?php
$artists;
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if ($url == "http://localhost/E-Lyrics.org/add?artist=758") {
    $titleOfAdd = "Artist";
    if (isset($_POST["Ajouter"])) {
        $order = new ArtistsController();
        $order->addArtists();
    }
} else if ($url == "http://localhost/E-Lyrics.org/add?album=758") {
    $titleOfAdd = "Album";

    if (isset($_POST["Ajouter"])) {
        $order = new AlbumsController();
        $order->addAlbums();
    }
} else if ($url == "http://localhost/E-Lyrics.org/add?songs=758") {
    $titleOfAdd = "Song";

    if (isset($_POST["Ajouter"])) {
        $order = new SongsController();
        $order->addSongs();
        Redirect::to('songs');
    }
} else {
    $titleOfAdd = "Song";

    if (isset($_POST["Ajouter"])) {
        $order = new SongsController();
        $order->addSongs();
        Redirect::to('home');
    }
}

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header text-center" style="border-bottom:4px solid #1C82AD; color:#1C82AD; font-size:20px; font-weight:bold; background-color:#03C988;">Add a New <?php echo $titleOfAdd ?></div>

                <div class="card-body bg-light">
                    <div class="container d-flex flex-wrap justify-content-md-between justify-content-center align-items-center p-2 gap-2">

                        <div class="media-query d-flex justify-content-center gap-2">

                            <a href="" class="btn btn-sm btn-success mr-2 Home-Button">
                                <i class="fas fa-repeat">
                                </i>
                            </a>

                            <!-- Go back to the previous page -->
                            <!-- https://www.computerhope.com/issues/ch000317.htm#:~:text=You%20can%20use%20the%20history,to%20the%20user's%20previous%20page. -->
                            <a class="btn btn-sm btn-success mr-2 Home-Button" onclick="history.back()">
                                <i class="fas fa-arrow-left">
                                </i>
                            </a>
                        </div>

                        <div class="d-flex flex-row justify-content-md-end justify-content-center">
                            <input class="input-search rounded-start input-search-artists" type="number" name="Multiple" id="Multiple" min="1" placeholder="Multiple ..." style="border:4px solid #03C988;">
                            <button class="btn btn-sm btn-primary rounded-end " name="duplicate" onclick="duplication(document.getElementById('Multiple').value)" type="submit" style="background-color:#03C988; border-radius:0; border:2px solid #03C988;"><i class="fas fa-x"></i></button>
                        </div>

                    </div>
                    <form method="post">
                        <input type="hidden" id="Train" name="Train">

                        <div class="Cards" id="Cards">

                        </div>

                        <!-- here -->
                </div>


                <div class="p-2" style="border-top:4px solid #1C82AD; background-color:#03C988;">
                    <button type="submit" name="Ajouter" class="btn btn-primary" style="background-color:#1C82AD; font-weight:bold; border:2px solid #1C82AD;">Ajouter</button>
                </div>
                </form>


            </div>
        </div>
    </div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>