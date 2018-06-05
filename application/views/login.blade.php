<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>KELOMPOK TANI DAN IKM AGRIBISNIS KOTA SOLOK</title>
        <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/js/jquery-ui/jquery-ui.css">
        <script type="text/javascript" src="{{ base_url() }}assets/js/jquery.js"></script>
        <script type="text/javascript" src="{{ base_url() }}assets/js/jquery.js"></script>
        <script type="text/javascript" src="{{ base_url() }}assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="{{ base_url() }}assets/js/jquery-ui/jquery-ui.js"></script>
        <style>
            body {
            background: url({{ base_url() }}assets/images/nature.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            }
            .login-form {
            margin-top: 60px;
            }
            form[role=login] {
            color: #5d5d5d;
            background: #f2f2f2;
            padding: 26px;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            }
            form[role=login] img {
            display: block;
            margin: 0 auto;
            margin-bottom: 35px;
            }
            form[role=login] input,
            form[role=login] button {
            font-size: 18px;
            margin: 16px 0;
            }
            form[role=login] > div {
            text-align: center;
            }
            .form-links {
            text-align: center;
            margin-top: 1em;
            margin-bottom: 50px;
            }
            .form-links a {
            color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row" id="pwd-container">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <section class="login-form">
                        <form method="post" action="" role="login">
                            <h3> SILAHKAN LOGIN </h3> 
                            <input type="text" name="username" placeholder="Username" required class="form-control input-lg" />
                            <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                            <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Login</button>
                        </form>
                    </section>
                </div>
                <div class="col-md-4"></div>
            </div>
            <p>
            </p>
        </div>
    </body>
</html>
