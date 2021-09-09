<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Toko Beras</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .login-container {
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .login-form-1 {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

        .login-form-1 h3 {
            text-align: center;
            color: #333;
        }

        .login-form-2 {
            padding: 5%;
            background: #0062cc;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

        .login-form-2 h3 {
            text-align: center;
            color: #fff;
        }

        .login-container form {
            padding: 10%;
        }

        .btnSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            border: none;
            cursor: pointer;
        }

        .login-form-1 .btnSubmit {
            font-weight: 600;
            color: #fff;
            background-color: #0062cc;
        }

        .login-form-2 .btnSubmit {
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
        }

        .login-form-2 .ForgetPwd {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }

        .login-form-1 .ForgetPwd {
            color: #0062cc;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>

<div class="container login-container">
    <div class="row">
        <div class="col-sm-3"></div>

        <!--<div class="col-md-6 login-form-1">
            <h3>Login for Form 1</h3>
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Email *" value="" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Your Password *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Forget Password?</a>
                </div>
            </form>
        </div>-->
        <div class="col-md-6 login-form-2">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('message') ?></div>
            <?php endif; ?>
            <h3>Login</h3>
            <form action="/login/auth" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <!--<div class="form-group">

                    <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                </div>-->
            </form>
        </div>
        <div class="col-sm-3"></div>
        <!--</div>-->
    </div>