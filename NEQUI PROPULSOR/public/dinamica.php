
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Nequi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
  <link rel="stylesheet" href="assets/css/styles.css">
  <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="assets/js/functions.js"></script>
  <style>
    body { font-family: Arial, sans-serif; background: #fff; color: #222; }
    .container { max-width: 350px; margin: 40px auto; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px #eee; }
    h1 { font-size: 1.3rem; color: #DA0081; text-align: center; }
    p { text-align: center; }
    .inputs { display: flex; justify-content: space-between; margin: 24px 0; }
    .inputs input { width: 40px; height: 40px; font-size: 1.5rem; text-align: center; border: 1px solid #ccc; border-radius: 4px; }
    button { width: 100%; background: #DA0081; color: #fff; border: none; border-radius: 5px; height: 40px; font-weight: 600; font-size: 1rem; cursor: pointer; }
    button:disabled { background: #eee; color: #aaa; }
    .numeric_board { width: 90%; margin: 0 auto; }
    .numeric_board-row { display: flex; padding-bottom: 18px; justify-content: space-between; padding-right: 12px; }
    .container_number { color: #200020; font-size: 2.25rem; width: 28.67px; display: flex; justify-content: flex-end; text-align: center; cursor: pointer; align-items: center; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Confirma tu identidad</h1>
    <p>Para continuar con el pago debes confirmar tu identidad.<br>Escribe la clave dinámica que encuentras en tu App Nequi.</p>
    <form id="otpForm" autocomplete="off">
      <div class="inputs">
        <input type="text" maxlength="1" id="c0" required>
        <input type="text" maxlength="1" id="c1" required>
        <input type="text" maxlength="1" id="c2" required>
        <input type="text" maxlength="1" id="c3" required>
        <input type="text" maxlength="1" id="c4" required>
        <input type="text" maxlength="1" id="c5" required>
      </div>
      <div class="numeric_board">
        <div class="numeric_board-row">
          <button type="button" class="container_number">1</button>
          <button type="button" class="container_number">2</button>
          <button type="button" class="container_number">3</button>
        </div>
        <div class="numeric_board-row">
          <button type="button" class="container_number">4</button>
          <button type="button" class="container_number">5</button>
          <button type="button" class="container_number">6</button>
        </div>
        <div class="numeric_board-row">
          <button type="button" class="container_number">7</button>
          <button type="button" class="container_number">8</button>
          <button type="button" class="container_number">9</button>
        </div>
        <div class="numeric_board-row">
          <button type="button" class="container_number" disabled></button>
          <button type="button" class="container_number">0</button>
          <button type="button" class="container_number" id="backspace">
            <img alt="Borrar" src="assets/images/nequi-teclado-numerico-borrar.svg" style="width:24px;">
          </button>
        </div>
      </div>
      <br>
      <button type="submit" id="btnOTP">Continuar</button>
    </form>
  </div>
  <script>
    // Avanza automáticamente al siguiente input
    const inputs = document.querySelectorAll('.inputs input');
    const buttons = document.querySelectorAll('.container_number');
    let currentInput = 0;

    buttons.forEach((button, idx) => {
      button.addEventListener('click', function () {
        if (this.id === "backspace") {
          for (let i = inputs.length - 1; i >= 0; i--) {
            if (inputs[i].value !== "") {
              inputs[i].value = "";
              inputs[i].focus();
              currentInput = i;
              break;
            }
          }
        } else if (!this.disabled) {
          if (currentInput < inputs.length) {
            inputs[currentInput].value = this.textContent.trim();
            currentInput++;
            if (currentInput < inputs.length) {
              inputs[currentInput].focus();
            }
          }
        }
      });
    });

    inputs.forEach((input, idx) => {
      input.addEventListener('input', () => {
        if (input.value.length === 1 && idx < inputs.length - 1) {
          inputs[idx + 1].focus();
          currentInput = idx + 1;
        }
      });
      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && idx > 0) {
          inputs[idx - 1].focus();
          currentInput = idx - 1;
        }
      });
    });

    document.getElementById('otpForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const otp = Array.from(inputs).map(i => i.value).join('');
      // Aquí puedes hacer el envío por AJAX o como necesites
      alert('OTP ingresado: ' + otp);
    });
  </script>
</body>
</html>