<?php $datas = new CountController();
$statistics = $datas->statistics(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>E-Music</title>
</head>

<body>
    <div class="container d-flex  justify-content-between text-center gap-5 mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="./artists">
                    <h5 class="card-title">Les Artistes</h5>
                    <p class="card-text"><?php echo $statistics[0]->Num_Artist ?></p>
                </a>

            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="./home">

                    <h5 class="card-title">Les Titres</h5>
                    <p class="card-text"><?php echo $statistics[0]->Num_Song  ?></p>
                </a>

            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Les Utilisateurs</h5>
                <p class="card-text"><?php echo $statistics[0]->Num_User ?></p>
            </div>
        </div>
    </div>