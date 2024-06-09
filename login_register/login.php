<!DOCTYPE html>
<?php
require_once '../session.php';

if(isset($_SESSION['authenticated'])){
  header('Location: ./~ptaw-2024-gr2/dashboard.php');
}

$email = '';
if (isset($_COOKIE['remembered_email'])) {
    $email = $_COOKIE['remembered_email'];
}

?>

<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/styles/sitecss.css">
  <title>FoodDashBoas</title>
</head>

<body>
  <!-- Imagem no canto superior esquerdo -->
  <img src="/~ptaw-2024-gr2/assets/stock_imgs/fooddash%20logo%20image.png" alt="FoodDash Logo" id="logo_fooddash" style="position: absolute; top: 8%; left: 4%; width: 15%; height: auto; cursor: pointer;">

  <!-- Formulário de login -->
  <div class="container d-flex align-items-center justify-content-center" style="margin-top: 25vh;">
    <form action="loginValidation.php" method="POST" style="width: 30%;">
      <h1 class="h1 mb-3" style="text-align: center;">Login</h1><br>
      <div class="form-floating mb-1">
        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="name@example.com" value="<?php echo htmlspecialchars($email); ?>" required>
        <label for="inputEmail" style="cursor: pointer;">Email</label>
      </div>
      <div class="form-floating mb-1">
        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
        <label for="inputPassword">Password</label>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="mostrarPasswordCheckbox">
          <label class="form-check-label" for="flexCheckDefault">
            Mostrar password
          </label>
        </div>
      </div>
      <div class="checkbox mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="Guardar email" id="remember_email" name="remember_email" <?php echo isset($_COOKIE['remembered_email']) ? 'checked' : ''; ?>>
          <label class="form-check-label" for="remember_email">
            Guardar email
          </label>
        </div>
      </div>
      <button id="btnLogin" class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      <br><br>
      <p style="text-align: center;">Ainda não tem conta?<a type="button" class="btn btn-link" href="register.php">Registe-se</a>
      </p>

      <?php
      if (isset($_SESSION['error_message'])) {
        echo "<div class='toast-container position-fixed bottom-0 end-0 p-3'>
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true' data-autohide='false' id='error-message-login'>
                  <div class='toast-header'>
                    <strong class='mr-auto'>Erro</strong>
                    <button type='button' class='btn-close' data-dismiss='toast' aria-label='Close'>
                    </button>
                  </div>
                  <div class='toast-body' style='color: red; text-align: center;'>
                  ". $_SESSION['error_message'] ."
                  </div>
                </div>
              </div>";
        unset($_SESSION['error_message']);
      }

      if (empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
      } else {
        echo "<div class='form-floating mb-1'>";
        echo "<a id='btnLogout' class='w-100 btn btn-lg btn-primary' type='submit' href='logout.php'>Logout</a>";
        echo "</div>";
      }
      ?>

    </form>

  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    document.querySelector("input#mostrarPasswordCheckbox").addEventListener("click", mostrarPassword)

    function mostrarPassword() {
      let passwordInput = document.getElementById("inputPassword");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }

    document.querySelector("button#btnLogin").addEventListener("click", validarlogin)

    function validarlogin() {
      let nome = document.querySelector("input#inputName").value;
      let email = document.querySelector("input#inputEmail").value;
      let password = document.querySelector("input#inputPassword").value;
      let repetirPassword = document.querySelector("input#inputRepetirPassword").value;

      console.log(`Email: ${email} | Password: ${password}`);

      if (!validateEmail(email)) {
        document.querySelector("input#inputEmail").classList.add("form-control is-invalid");
        alert("Por favor, insira um email válido.");
        return;
      } else if (password.length < 6) {
        document.querySelector("input#inputPassword").classList.add("form-control is-invalid");
        alert("A palavra-passe deve ter pelo menos 6 caracteres.");
        return;
      }

      //document.querySelector("input#inputEmail").classList.add("form-control is-valid");
      //document.querySelector("input#inputPassword").classList.add("form-control is-invalid");
    }

    function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    document.getElementById('logo_fooddash').addEventListener('click', function() {
      window.location.href = '/~ptaw-2024-gr2/index.php';
    });

    $('#error-message-login').toast('show');
    const toastTrigger = document.getElementById('btnLogin');
    const toastLiveExample = document.getElementById('error-message-login');

    if (toastTrigger) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
      toastTrigger.addEventListener('click', () => {
      toastBootstrap.show();
      });
    };
  </script>

</body>

</html>