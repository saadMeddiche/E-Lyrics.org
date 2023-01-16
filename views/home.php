<?php
if (isset($_POST["idDelete"])) {
    $order = new SongsController();
    $order->deleteSong();
}

if (isset($_POST['find'])) {
    $data = new SongsController();
    $songs = $data->findSongs();
} else {
    $data = new SongsController();
    $songs = $data->getAllSongs();
}

?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <a href="./add" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-plus">
                        </i>
                    </a>
                    <a href="./home" class="btn btn-sm btn-secondary mary mr-2 mb-2">
                        <i class="fas fa-home">
                        </i>
                    </a>
                    <a href="./logout" class="btn btn-sm btn-secondary mary mr-2 mb-2">
                        <i class="fas fa-user mr-2">UserName</i>
                    </a>
                    <form method="post" class="d-flex flex-row justify-content-end" action="">
                        <input type="text" name="search" placeholder="Recherche">
                        <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Song</th>
                                <th scope="col">Artist</th>
                                <th scope="col">Album</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($songs as $song) : ?>
                                <tr>
                                    <th scope="row"><?php echo $song->Name_Song ?></th>
                                    <td><?php echo $song->Name_Artist ?></td>
                                    <td><?php echo $song->Name_Album ?></td>

                                    <td class="d-flex flex-row gap-2">
                                        <form action="update" method="post">
                                            <input type="hidden" name="idUpdate" value="<?php echo $song->ID_Song ?>">
                                            <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                        </form>
                                        <form method="post">
                                            <input type="hidden" name="idDelete" value="<?php echo $song->ID_Song ?>">
                                            <button class="btn btn-sm btn-danger" onclick="var test='Are You Sure !' ; return confirm(test);"><i class="fa fa-trash"></i></button>
                                        </form>
                                        <form action="view" method="post">
                                            <input type="hidden" name="idView" value="<?php echo $song->ID_Song ?>">
                                            <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button>
                                        </form>
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