<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="lib/bootstrap.min.css" rel="stylesheet">
    <style>
        .col-md-6 {
            border-radius: 6px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }
        .row {
            margin:0 20px;
         }
    </style>
</head>

<body>

    <div class="container-sm" style="margin-top: 130px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3 p-5">
                <div class="display-5 text-center mb-4">login</div>

                <!-- SUCCESS MESSAGE -->
                <?php if (isset($_SESSION['suc'])) { ?>
                    <div class="text-center mb-2 mt-2 text-success"><?php echo $_SESSION['suc']; ?></div>
                <?php
                    unset($_SESSION['suc']);
                } ?>
                <!-- ERROR MESSAGE -->
                <?php if (isset($_SESSION['err'])) { ?>
                    <div class="text-center mb-2 mt-2 text-danger"><?php echo $_SESSION['err']; ?></div>
                <?php
                    unset($_SESSION['err']);
                } ?>

                <form action="model/login.php" method="POST">
                    <div class=" mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="example@support.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="******">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">login</button>
                </form>
                <div class="text-center">You don't have account! <a href="view/register.php">SignUp Here</a></div>
            </div>
        </div>
    </div>

</body>

</html>
