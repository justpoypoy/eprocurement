<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?= base_url(); ?>assets/dist/img/logotrans.png">

        <title>Signin Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= base_url(); ?>assets/dist/css/signin.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">

            <form class="form-signin" action="<?= site_url('form-register'); ?>" method="POST">
                <h5 class="form-signin-heading">Please register as supplier before continue</h5>
                <label>Nama Supplier</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Supplier" required autofocus>
                <label>No Telepon / Handphone</label>
                    <input type="text" class="form-control" name="phone" placeholder="No Telepon / Handphone" required >
                <label>Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
                <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                <button class="btn btn-sm btn-primary pull-left" type="submit" name="submit">Submit</button>
                <a href="<?= site_url('menu-login'); ?>" class="btn btn-sm btn-danger pull-right">Cancel</a>
            </form>

        </div> <!-- /container -->
    </body>
</html>
