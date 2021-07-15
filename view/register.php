<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="../lib/bootstrap.min.css" rel="stylesheet">
    <style>
        .col-md-6 {
            border-radius: 6px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }
    </style>
</head>

<body>

    <div class="container-sm" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3 p-5">
                <div class="display-5 text-center mb-4">Register</div>

                <!-- ERROR MESSAGE -->
                <?php if (isset($_SESSION['err'])) { ?>
                    <div class="text-center mb-2 mt-2 text-danger"><?php echo $_SESSION['err']; ?></div>
                <?php
                    unset($_SESSION['err']);
                } ?>

                <form action="../model/register.php" method="POST">
                    <div class=" mb-3">
                        <label class="form-label">Name</label>

                        <?php if (isset($_GET['username'])) {
                            $username = $_GET['username'];

                            echo " <input type='text' class='form-control' name='username' placeholder='steve smith' value='$username'>";
                        } else {
                            echo " <input type='text' class='form-control' name='username' placeholder='steve smith' required>";
                        }

                        ?>
                        <!-- <input type="text" class="form-control" name="name" placeholder="steve smith" required> -->

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>


                        <?php if (isset($_GET['email'])) {
                            $email = $_GET['email'];

                            echo " <input type='email' class='form-control' name='email' placeholder='example@support.com' value='$email'>";
                        } else {
                            echo "<input type='email' class='form-control' name='email' placeholder='example@support.com' required>";
                        }

                        ?>
                        <!-- <input type="email" class="form-control" name="email" placeholder="example@support.com" required> -->


                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="******" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="******" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Submit</button>
                </form>
                <div class="text-center">You have account! <a href="../index.php">Login Here</a></div>
            </div>
        </div>
    </div>




</body>

</html>