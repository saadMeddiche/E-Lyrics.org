<?php
if (isset($_POST['login'])) {
    $loginUser = new UsersController();
    $loginUser->authentification();
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
    .container {}
</style>

<title>E-Music</title>

<div class="h-100 w-100 d-flex justify-content-center align-items-center" style="background-image: url('./views/includes/bg-login.png'); background-position: center; background-size: cover;        background-repeat: no-repeat;">
    <div class=" row w-100 ">
        <div class=" col-md-8 mx-auto">
            <div class="card" style="border:4px solid #03C988;">
                <div class="card-header" style="border-bottom:4px solid #03C988;">
                    <h3 class="text-center" style="color:#03C988;"><b>Welcome To E-Music</b></h3>
                </div>
                <div class="card-body bg-light text-center">
                    <?php if (isset($_SESSION["messageOfLogin"])) {
                        echo $_SESSION["messageOfLogin"];
                        unset($_SESSION["messageOfLogin"]);
                    } ?>
                    <form method="post">

                        <div class="form-group p-2">
                            <input type="text" name="username" placeholder="Name ..." class="form-control" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                        </div>

                        <div class="form-group p-2">
                            <input type="password" name="password" placeholder="Password ..." class="form-control" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                        </div>

                        <button class="btn btn-sm btn-primary p-2 " type="submit" name="login" style="background-color:#03C988; border:3px solid #1C82AD; "><b>LogIn</b></button>
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>