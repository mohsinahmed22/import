<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 5/31/2018
 * Time: 6:18 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login | <?php echo STORE_NAME?></title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">

<!-- Custom Theme Style -->
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
<!--    <a class="hiddenanchor" id="signin"></a>-->

    <div class="login_wrapper">
        <?php echo $msg;?>
        <div class="animate form login_form">

            <section class="login_content">

                <form action="login.php" method="post">
                    <h1 style="margin-top:50px;">Admin Login </h1>
                    <div>
                        <input type="text" class="form-control" name='username' placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control"  name="password" placeholder="Password" required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit" name="login">Log in</button>
                        <f
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">


                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><?php echo STORE_NAME ?></h1>
                            <p>©2018 All Rights Reserved. Developed by <a href="http://www.mohsin-ahmed.com/contact">Mohsin Ahmed</a> </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <!--<div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Submit</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><?php /*echo STORE_NAME*/?></h1>
                            <p>©2018 All Rights Reserved. Developed by <a href="http://www.mohsin-ahmed.com/contact">Mohsin Ahmed</a> </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>-->
    </div>
</div>

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.bootstrap.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/dataTables.fixedHeader.min.js"></script>
<script src="assets/js/dataTables.keyTable.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/responsive.bootstrap.js"></script>
<script src="assets/js/dataTables.scroller.min.js"></script>
<script src="assets/js/jquery.inputmask.bundle.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="assets/js/custom.js"></script>
</body>
</html>
