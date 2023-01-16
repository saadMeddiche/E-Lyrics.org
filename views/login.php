<?php
if (isset($_POST['login'])) {
    $loginUser = new UsersController();
    $loginUser->authentification();
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Connexion</h3>
                </div>
                <div class="card-body bg-light text-center">

                    <form method="post" >

                        <div class="form-group p-2">
                            <input type="text" name="username" placeholder="Name ..." class="form-control">
                        </div>
                        
                        <div class="form-group p-2">
                            <input type="password" name="password" placeholder="Password ..." class="form-control">
                        </div>

                        <button class="btn btn-sm btn-primary p-2 " type="submit" name="login">Connexion</button>
                    </form>

                </div>
                
            </div>
        </div>

    </div>
</div>