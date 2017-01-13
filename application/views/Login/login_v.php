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
            
            <form class="form-signin" action="<?= site_url('sign-in'); ?>" method="POST">
                <?php echo $this -> session -> flashdata('pesan'); ?>
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <button class="btn btn-sm btn-primary pull-left" type="submit" name="submit">Sign in</button>
                <a href="<?= site_url('register-supplier'); ?>" class=" pull-right">Register For Supplier</a>
            </form>

        </div> <!-- /container -->
    </body>
</html>
