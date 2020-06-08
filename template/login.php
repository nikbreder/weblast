<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Личный кабинет</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font: 16px 'Segoe UI', Arial, Helvetica, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: auto;
            padding: 50px;
            border-radius: 4px;
            background: white;
            color: gray;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1),
                        0 2px 2px rgba(0, 0, 0, 0.1),
                        0 4px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-weight: 500;
            color: rgb(72, 71, 70);
            opacity: 0.7;
        }

        form {
            min-width: 320px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid rgb(210, 214, 222);
        }
        
        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group [class^="fa"] {
            position: absolute;
            top: 50%;
            right: 10px;
            width: 16px;
            height: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: translateY(-50%);
        }

        .form-group:focus-within [class^="fa"] {
            color: #3c8dbc;
        }

        .btn {
            padding: 5px 25px;
        }

        .login-box-msg {
            text-align: center;
        }

        [data-art] {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            pointer-events: none;
            z-index: -1;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <canvas  data-art></canvas>
    <h1>Расписание занятий</h1>
    <div class="login-box">
        <?php if (isset($message)) { ?>
            <p class="login-box-msg"<?= $message; ?></p>
        <?php } ?>

        <form action="auth.php" method="post">
            <div class="form-group has-feedback">
                <input name="login" type="text" class="form-control" placeholder="Логин">
                <span class="fas fa-envelope" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Пароль">
                <span class="fas fa-lock" aria-hidden="true"></span>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info btn-flat">Войти</button>
            </div>
            <!--                <div class="col-xs-8">-->
                    <!--                    <div class="checkbox icheck">-->
                    <!--                        <label>-->
                    <!--                            <input type="checkbox"> Remember Me-->
                    <!--                        </label>-->
                    <!--                    </div>-->
                    <!--                </div>-->
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="template/js/art.js"></script>
</body>
</html>