<?php $datas = new CountController();
$statistics = $datas->statistics(); ?>

<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>E-Music</title>
</head>

<style>
    .link {
        text-decoration: none;
        color: #1C82AD;
    }

    .card {
        border: 5px solid #1C82AD;
    }

    .Links {
        background-color: #00337C;
    }

    .Add-Button {
        background-color: #03C988;
        border: 3px solid #1C82AD;
    }

    .Add-Button-icon {}

    .Home-Button {
        background-color: #03C988;
        border: 3px solid #1C82AD;
    }

    .Home-Button-icon {}

    .titles {
        color: #03C988;
        font-size: 20px;
        border-bottom: 4px solid #03C988 !important;
    }

    .Rows {
        border-bottom: 4px solid #03C988 !important;

    }

    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
        background: #00337C;
    }

    ::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background: #03C988;

    }

    @media (max-width:770px) {
        .HolderOfLinks {
            width: 100%;
            flex-wrap: wrap;
        }

        .Links {
            width: 100% !important;
        }
    }
</style>

<body style="background-image: url('./views/includes/bg-login.png'); background-position: center; background-size: cover;        background-repeat: no-repeat; height:100%; background-color:#13005A;">
    <div class="container d-flex justify-content-between text-center gap-5 mt-5 HolderOfLinks">
        <div class="card Links" style="width: 18rem;">
            <div class="card-body">
                <a class="link" href="./artists">
                    <h5 class="card-title"><b>Les Artistes</b></h5>
                    <p class="card-text"><b><?php echo $statistics[0]->Num_Artist ?></b></p>
                </a>

            </div>
        </div>
        <div class="card Links" style="width: 18rem;">
            <div class="card-body">
                <a class="link" href="./home">

                    <h5 class="card-title"><b>Les Titres</b></h5>
                    <p class="card-text"><b><?php echo $statistics[0]->Num_Song  ?></b></p>
                </a>

            </div>
        </div>
        <div class="card Links" style="width: 18rem;">
            <div class="card-body">
                <a class="link" href="./home">

                    <h5 class="card-title"><b>Les Utilisateurs</b></h5>
                    <p class="card-text"><b><?php echo $statistics[0]->Num_User ?></b></p>
                </a>

            </div>
        </div>
    </div>