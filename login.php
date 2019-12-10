<?php
    require_once realpath(dirname(__FILE__).'/src/models/LoginModel.php');
   //Faz o encaminhamento do POST ou GET
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Sparrow Admin | Login</title>
    <?php require_once("dist/css/css.php"); ?>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Sparrow</b>Admin</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Gerenciador web do Sparrow Events</p>

                <form id="formLogin" method="post">
                    <input type="hidden" name="acao" value="logar">
                    <div class="input-group mb-3">
                        <input name="inputEmail" id="inputEmail" type="email" class="form-control" placeholder="Email"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="inputSenha" id="inputSenha" type="password" class="form-control"
                            placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 ">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Lembre me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-5 text-right col-sm-12">
                            <button id="btnLogin" name="btnLogin" type="submit" class="btn btn-success logar" value="logar">Entrar</button>
                        </div>
                    </div>
                </form>

            </div>
            <p id="mensagem"></p>
            <!-- /.login-card-body -->
        </div>        
    </div>
    <!-- /.login-box -->

    <?php require_once("dist/js/javascript.php");?>
    <script src="dist/js/services/loginService.js"></script>

</body>

</html>